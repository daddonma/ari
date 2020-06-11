<?php

namespace Repositories;

use Doctrine\ORM\EntityRepository;

use \Entities\Reise;

class ReiseRepository extends EntityRepository {

	public function sucheReisen($regionID = null, $kategorieID = null, $searchString = null) {
		$em = $this->getEntityManager();


		$queryBuilder = $em
						->createQueryBuilder()
						->select('r')
						->from(Reise::class, 'r')
						->leftJoin('r.kategorie', 'k')
						->leftJoin('r.region', 're')
						->where('r.beginn > :today');

		$parameters['today'] = date('Y-m-d');

		if($regionID) {
			$queryBuilder->andWhere('r.region = :region');
			$parameters['region'] = $regionID;
		}

		if($kategorieID) {
			$queryBuilder->andWhere('r.kategorie = :kategorie');
			$parameters['kategorie'] = $kategorieID;
		}

		if($searchString) {

			$searchFilter = '(
								r.beschreibung LIKE :searchBeschreibung OR
								r.kurzbeschreibung LIKE :searchKurzbeschreibung OR
								r.titel LIKE :searchTitel OR
								k.name LIKE :searchKategorie OR
								re.name LIKE :searchRegion
							)';

			$queryBuilder->andWhere($searchFilter);

			$searchString = '%'.trim($searchString).'%';
			$parameters['searchBeschreibung'] = $searchString;
			$parameters['searchTitel'] = $searchString;
			$parameters['searchKurzbeschreibung'] = $searchString;
			$parameters['searchKategorie'] = $searchString;
			$parameters['searchRegion'] = $searchString;
		}

		$queryBuilder->setParameters($parameters);

		$query = $queryBuilder->getQuery();

		$result = $query->getResult();

		return $result;
	}


}
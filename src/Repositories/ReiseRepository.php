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
						->where('r.id > :id');

		$parameters['id'] = 0;

		if($regionID) {
			$queryBuilder->andWhere('r.region = :region');
			$parameters['region'] = $regionID;
		}

		if($kategorieID) {
			$queryBuilder->andWhere('r.kategorie = :kategorie');
			$parameters['kategorie'] = $kategorieID;
		}

		if($searchString) {
			$queryBuilder->andWhere('(r.beschreibung LIKE :searchBeschreibung OR r.titel LIKE :searchTitel OR r.kurzbeschreibung LIKE :searchKurzbeschreibung)');

			$searchString = '%'.trim($searchString).'%';
			$parameters['searchBeschreibung'] = $searchString;
			$parameters['searchTitel'] = $searchString;
			$parameters['searchKurzbeschreibung'] = $searchString;
		}

		$queryBuilder->setParameters($parameters);

		$query = $queryBuilder->getQuery();

		$result = $query->getResult();

		return $result;
	}


}
<?php

namespace Repositories;

use Doctrine\ORM\EntityRepository;

use \Entities\Reise;

class ReiseRepository extends EntityRepository {

	public function findReisen($regionID = null, $kategorieID = null) {
		$em = $this->getEntityManager();

		$filter = array();

		if(!empty($regionID)) {
			$filter['region'] = $regionID;
		}

		if(!empty($kategorieID)) {
			$filter['kategorie'] = $kategorieID;
		}

		$reisen = $em->getRepository(Reise::class)->findBy($filter);

		return $reisen;
	}


}
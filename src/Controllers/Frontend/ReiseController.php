<?php 

namespace Controllers\Frontend;

use Entities\Reise;

class ReiseController extends AbstractBase {

	public function indexAction() {
		$em = $this->getEntityManager();

		$reisen = $em->getRepository('\Entities\Reise')->findAll();

		$this->addContext('reisen', $reisen);
	}


}
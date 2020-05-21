<?php 

namespace Controllers\Frontend;

use Entities\Reise;

class ReiseController extends AbstractBase {

	public function indexAction() {

		//Auf die Ubersicht Seite weiterleiten
		$this->redirect('uebersicht', 'reise');
	}

	public function uebersichtAction() {
		$em = $this->getEntityManager();

		$reisen = $em->getRepository('\Entities\Reise')->findAll();

		$this->addContext('reisen', $reisen);
	}

}
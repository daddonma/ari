<?php 

namespace Controllers\Frontend;

use Entities\Buchung;

class BuchungController extends AbstractBase {

	public function indexAction() {

		$this->render404();
	}

	public function successAction() {

		$em = $this->getEntityManager();

		if(!isset($_GET['id'])) $this->render404();

		$buchung = $em->getRepository('Entities\Buchung')->find($_GET['id']);

		$this->addContext('buchung', $buchung);
	}

}
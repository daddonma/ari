<?php 

namespace Controllers\Backend;

use Entities\Buchung;

class BuchungController extends AbstractBase {

	public function indexAction() {
		$this->redirect("uebersicht", "buchung", true);
	}

	public function uebersichtAction() {

		$em =  $this->getEntityManager();

		$query = $em
         			->createQueryBuilder()
         			->select('b')
         			->from(Buchung::class, 'b')
         			->orderBy('b.buchungsdatum', 'DESC')
         			->getQuery();

        $buchungen = $query->getResult();
        $this->addContext('buchungen', $buchungen);

	}

}
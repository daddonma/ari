<?php 

namespace Controllers\Frontend;

use Entities\Reise;
use helpers\HtmlHelper;

class ReiseController extends AbstractBase {

	public function indexAction() {

		//Auf die Ubersicht Seite weiterleiten
		$this->redirect('uebersicht', 'reise');
	}

	public function uebersichtAction() {
		$em = $this->getEntityManager();

		//Filter zurücksetzen
		if(isset($_REQUEST['reset'])) {
			unset($_REQUEST['kategorieID']);
			unset($_REQUEST['regionID']);
		}

		$kategorieID = null;
		if(isset($_REQUEST['kategorieID'])) {
			$kategorieID = $_REQUEST['kategorieID'];
		}

		$regionID = null;
		if(isset($_REQUEST['regionID'])) {
			$regionID = $_REQUEST['regionID'];
		}

		$reisen  = $em->getRepository('\Entities\Reise')->findReisen($regionID, $kategorieID);

		$htmlHelper = new HtmlHelper($em);
		
		$regionenOptionList = $htmlHelper->getRegionenOptionList($regionID);
		$kategorienOptionList = $htmlHelper->getKategorienOptionList($kategorieID);

		$this->addContext('regionenOptionList', $regionenOptionList);
		$this->addContext('kategorieOptionList', $kategorienOptionList);
		$this->addContext('reisen', $reisen);
	}

	public function detailAction() {

		$em = $this->getEntityManager();

		if(!isset($_GET['id'])) $this->render404();

		$reiseID = $_GET['id'];

		$reise = $em->getRepository('Entities\Reise')->find($reiseID);

		$this->addContext('reise', $reise);
	}

	public function buchenAction() {
		$this->addJs("js\\tabs.js");
		$this->addCss("css\\tabs.css");

		$em = $this->getEntityManager();

		if(!isset($_GET['id'])) $this->render404();
		
		$reiseID = $_GET['id'];

		$reise = $em->getRepository('Entities\Reise')->find($reiseID);

		$this->addContext('reise', $reise);
	}

}
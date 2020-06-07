<?php 

namespace Controllers\Frontend;

use Entities\Reise;
use Entities\Buchung;
use Entities\Person;
use Entities\Anrede;
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

			if(isset($_REQUEST['kategorieID']))
				unset($_REQUEST['kategorieID']);

			if(isset($_REQUEST['regionID']))
				unset($_REQUEST['regionID']);

			if(isset($_REQUEST['searchStr']))
				unset($_REQUEST['searchStr']);
		}

		$kategorieID = null;
		if(isset($_REQUEST['kategorieID'])) {
			$kategorieID = $_REQUEST['kategorieID'];
		}

		$regionID = null;
		if(isset($_REQUEST['regionID'])) {
			$regionID = $_REQUEST['regionID'];
		}

		$searchStr = null;
		if(isset($_REQUEST['searchStr'])) {
			$searchStr = $_REQUEST['searchStr'];
		}

		
		$reisen  = $em->getRepository('\Entities\Reise')->sucheReisen($regionID, $kategorieID, $searchStr);

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

		//Reise anhand der ID ermitteln
		$reiseID = $_GET['id'];
		$reise = $em->getRepository('Entities\Reise')->find($reiseID);

		$buchung = new Buchung();
		$person = new Person();

		$postData = $_POST;

		//Postdaten gesetzt => Daten in die Objekte setzen und abspeichern
		if(!empty($postData)) {

			//leere Strings entfernen
			$postData = array_filter($postData);

			if(!empty($_POST['anredeID']))  
				$anrede = $em->getRepository('Entities\Anrede')->find($_POST['anredeID']);
			else
				$anrede = new Anrede();

			//die Person anlegen
			$person->mapFromArray($postData);
			$person->setAnrede($anrede);
			$personValidator = $em->getValidator($person);
			$personErrors = array();

			if($personValidator->isValid()) {
				$em->persist($person);
			} else {
				$personErrors = $personValidator->getErrors();
				$this->setErrorMessage("Fehler beim Anlegen der Person", $personErrors);
			}
			//die Buchung anlegen
			$buchung->mapFromArray($postData);
			$buchung->setPerson($person);
			$buchung->setReise($reise);

			$buchungValidator = $em->getValidator($buchung);
			$buchungErrors = array();

			if($buchungValidator->isValid()) {
				$em->persist($buchung);
			} else {
				$buchungErrors = $buchungValidator->getErrors();
				$this->setErrorMessage("Fehler beim Anlegen der Buchung", $buchungErrors);
			}

			//Keine Errors vorhanden => in DB speichern
			if(empty($personErrors) && empty($buchungErrors))  {
				$em->flush();
				
				$this->setSuccessMessage('Die Buchung wurde erfolgreich vermerkt');
				$params[] = 'id=' . $buchung->getId();
				$this->redirect('success', 'buchung', false, $params);

			}
			
		}

		$htmlHelper = new HtmlHelper($em);

		$anredeOptionList = $htmlHelper->getAnredeOptionList(null, true);

		$this->addContext('anredeOptionList', $anredeOptionList);
		$this->addContext('reise', $reise);
		$this->addContext('buchung', $buchung);
		$this->addContext('person', $person);
	}


}
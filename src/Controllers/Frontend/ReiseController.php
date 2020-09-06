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

		$kategorien = $this->em->getRepository('Entities\Kategorie')->findAll();

		$htmlHelper = new HtmlHelper($em);
		
		$this->addContext('kategorien', $kategorien);

		$this->addContext('kategorieID', $kategorieID);
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
		$this->addCss('css\frontend\tabs.css');
		$this->addJs('js\frontend\tabs.js');
	
		$em = $this->getEntityManager();

		if(!isset($_GET['id'])) $this->render404();

		//Reise anhand der ID ermitteln
		$reiseID = $_GET['id'];
		$reise = $em->getRepository('Entities\Reise')->find($reiseID);

		$buchung = new Buchung();
		$person = new Person();
		$anrede = new Anrede(); 

		$postData = $_POST;

		//Postdaten gesetzt => Daten in die Objekte setzen und abspeichern
		if(!empty($postData)) {

			//leere Strings entfernen
			$postData = array_filter($postData);

			$_SESSION['buchung'][$reise->getId()] = $postData;

			if(!empty($_POST['anredeID']))  
				$anrede = $em->getRepository('Entities\Anrede')->find($_POST['anredeID']);

			$person->setAnrede($anrede);

			//Postdaten in die Objekte setzen
			$person->mapFromArray($postData);
			$buchung->mapFromArray($postData);

			$buchung->setPerson($person);
			$buchung->setReise($reise);

			$personValidator = $em->getValidator($person);
			$buchungValidator = $em->getValidator($buchung);

			//Person und Buchung validieren
			$personIsValid = $personValidator->isValid();
			$buchungIsValid = $buchungValidator->isValid();


			//Keine Validierungsfehler => Daten in die Session setzen
			if($personIsValid && $buchungIsValid) {
				//Daten in die Session setzen
				$this->setTemplate('bestaetigung', 'BuchungController');
			} else {

				//Validierungsfehler aufgetreten
				$personErrors = $personValidator->getErrors();
				$buchungErros = $buchungValidator->getErrors();
				$errors = array_merge($personErrors, $buchungErros);

				$this->setErrorMessage('Beim Buchen der Reise ist ein Fehler aufgetreten', $errors);
			}
		}

		$htmlHelper = new HtmlHelper($em);

		$anredeOptionList = $htmlHelper->getAnredeOptionList($anrede->getId(), true);

		$this->addContext('anredeOptionList', $anredeOptionList);
		$this->addContext('reise', $reise);
		$this->addContext('buchung', $buchung);
		$this->addContext('person', $person);
	}


}
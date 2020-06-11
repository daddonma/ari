<?php 

namespace Controllers\Frontend;

use Entities\Buchung;
use Entities\Reise;
use Entities\Person;
use Entities\Anrede;

class BuchungController extends AbstractBase {

	public function indexAction() {

		$this->render404();
	}

	public function insertAction() {

		$em = $this->getEntityManager();

		if(!isset($_REQUEST['reise']))  {
			$this->render404();
		}
		
		$reiseID = $_REQUEST['reise'];
		$reise = $em->getRepository('Entities\Reise')->find($reiseID);

		if(!isset($_SESSION['buchung'][$reiseID])) {
			$this->render404();
		}

		$buchung = new Buchung();
		$person = new Person();

		$sessionData = $_SESSION['buchung'][$reiseID];

		//Die Daten wieder aus der Session löschen
		unset($_SESSION['buchung'][$reiseID]);
		
		$anrede = $em->getRepository('Entities\Anrede')->find($sessionData['anredeID']);
	
		//Sessiondaten in die Objekte setzen
		$person->mapFromArray($sessionData);
		$buchung->mapFromArray($sessionData);

		$person->setAnrede($anrede);
		$buchung->setReise($reise);
		$buchung->setPerson($person);

		//Daten nochmal validieren
		$personValidator = $em->getValidator($person);
		$buchungValidator = $em->getValidator($buchung);

		//Person und Buchung validieren
		$personIsValid = $personValidator->isValid();
		$buchungIsValid = $buchungValidator->isValid();
		
		if($personIsValid && $buchungIsValid) {
			
			$em->persist($person);
			$em->persist($buchung);

			$em->flush();
				
			$this->setSuccessMessage('Die Buchung wurde erfolgreich vermerkt');
			$params[] = 'id=' . $buchung->getId();
			$this->redirect('success', 'buchung', false, $params);
		} else {
			$errors = array_merge($buchungValidator->getErrors(), $personValidator->getErrors());
			$this->setTemplate('error');
			$this->setErrorMessage("Beim Buchen ist ein Fehler aufgetreten", $errors);
		}

	}

	public function successAction() {

		$em = $this->getEntityManager();

		if(!isset($_GET['id'])) $this->render404();

		$buchung = $em->getRepository('Entities\Buchung')->find($_GET['id']);

		$this->addContext('buchung', $buchung);
	}

	
}
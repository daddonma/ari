<?php

namespace Validators;

use Webmasters\Doctrine\ORM\EntityValidator;


class ReiseValidator extends EntityValidator  {

	public function validateTitel($titel) {

		if(empty($titel)) {
			$this->addError("Der Titel darf nicht leer sein");
		}
		else if(strlen($titel) < 5) {
			$this->addError("Der Titel muss mindestens 5 Zeichen lang sein");
		}
		else if(strlen($titel) > 100) {
			$this->addError("Der Titel darf maximal 100 Zeichen lang sein");
		}
	}

	public function validateBeginn($beginn) {
		if(empty($beginn)) {
			$this->addError("Der Beginn darf nicht leer sein");
		}
	}

	public function validateEnde($ende) {
		if(empty($ende)) {
			$this->addError("Das Ende darf nicht leer sein");
		}
	}

	public function validatePreis($preis) {
		if(empty($preis) || $preis < 0) {
			$this->addError("Der Preis darf nicht leer sein");
		}
	}

	public function validateBeschreibung($beschreibung) {
		if(empty($beschreibung)) {
			$this->addError("Die Beschreibung darf nicht leer sein.");
		} elseif(strlen($beschreibung) < 10) {
			$this->addError("Die Beschreibung ist zu kurz.");
		}
	}

	public function validateKurzbeschreibung($kurzbeschreibung) {
		if(empty($kurzbeschreibung))
			$this->addError("Die Krzbeschreibung darf nicht leer sein");
		else if(strlen($kurzbeschreibung) > 255) {
			$this->addError("Die Kurzbeschreibung darf maximal 255 Zeichen lang sein");
		}	
	}

	public function validateDetailbild($detailbild) {
		if(empty($detailbild)) {
			$this->addError("Es muss ein Detailbild angegeben sein");
		}
	}

	public function validateVorschaubild($vorschaubild) {
		if(empty($vorschaubild)) {
			$this->addError("Es muss ein Vorschaubild angegeben sein");
		}	
	}


}
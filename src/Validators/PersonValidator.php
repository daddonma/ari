<?php

namespace Validators;

use helpers\DateHelper;
use Webmasters\Doctrine\ORM\EntityValidator;

class PersonValidator extends EntityValidator  {

	public function validateAnrede($anrede) {

		if(empty($anrede->getId())) $this->addError("Die Anrede darf nicht leer sein");
	
	}

	public function validateTitel($titel) {
		if(!empty($titel) && strlen($titel) < 2)
			$this->addError("Der Titel muss mindestens 2 Zeichen enthalten");
		else if(!empty($titel) && strlen($titel) > 50)
			$this->addError("Der Titel darf maximal 50 Zeichen enthalten");
	}

	public function validateVorname($vorname) {
		if(empty($vorname)) 
			$this->addError("Der Vorname darf nicht leer sein");
		else if(strlen($vorname) < 3)
			$this->addError("Der Vorname muss mindestens 3 Zeichen enthalten");
		else if(strlen($vorname) > 100)
			$this->addError("Der Titel darf maximal 100 Zeichen enthalten");
	}

	public function validateNachname($nachname) {
		if(empty($nachname)) 
			$this->addError("Der Nachname darf nicht leer sein");
		else if(strlen($nachname) < 3)
			$this->addError("Der Nachname muss mindestens 3 Zeichen enthalten");
		else if(strlen($nachname) > 100)
			$this->addError("Der Nachname darf maximal 100 Zeichen enthalten");
	}

	public function validateStasse($strasse) {
		if(empty($strasse)) 
			$this->addError("Die Strasse darf nicht leer sein");
		else if(strlen($strasse) < 5)
			$this->addError("Die Strasse muss mindestens 5 Zeichen enthalten");
		else if(strlen($vorname) > 255)
			$this->addError("Die Strasse darf maximal 100 Zeichen enthalten");
	}

	public function validateHausnummer($hausnummer) {
		if(empty($hausnummer)) 
			$this->addError("Die Hausnummer darf nicht leer sein");
		
	}

	public function validatePlz($plz) {
		if(empty($plz))
			$this->addError("Die Postleitzahl darf nicht leer sein");
		else if(strlen($plz) != 5)
				$this->addError("Die Postleitzahl ist ungültig");
	}

	public function validateOrt($ort) {
		if(empty($ort)) 
			$this->addError("Der Ort darf nicht leer sein");
		else if(strlen($ort) < 5)
			$this->addError("Der Ort muss mindestens 5 Zeichen enthalten");
		else if(strlen($ort) > 255)
			$this->addError("Der Ort darf maximal 255 Zeichen enthalten");
	}

	public function validateTelefonnummer($telefonnummer) {
		if(empty($telefonnummer)) 
			$this->addError("Die Telefonnummer darf nicht leer sein");
		else if(strlen($telefonnummer) < 10)
			$this->addError("Die Telefonnummer muss mindestens 10 Zeichen enthalten");
		else if(strlen($telefonnummer) > 20)
			$this->addError("Die Telefonnummer darf maximal 20 Zeichen enthalten");
	} 

	public function validateEmail($email) {

		if(empty($email)) 
			$this->addError("Die E-Mail darf nicht leer sein");
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->addError("Bitte geben Sie eine gültige E-Mail Adresse ein.");
		}
	} 

	public function validateGeburtsdatum($geburtsdatum) {

		if(!is_a($geburtsdatum, 'Webmasters\Doctrine\ORM\Util\DateTime')) {
			$this->addError("Ungültiges Geburtsdatum");
		} else {


			//Alter berechnen
			$alter = DateHelper::berechneAlter($geburtsdatum->format('Y-m-d'));

			if($alter < 18) {
				$this->addError("Sie müssen mindestens 18 Jahre alt sein (Ihr Alter: {$alter})");
			}
		}
		
	}
}

<?php

namespace Validators;

use Webmasters\Doctrine\ORM\EntityValidator;

class BuchungValidator extends EntityValidator  {

	public function validatePersonenanzahl($personenanzahl) {

		if(!is_numeric($personenanzahl)) {
			$this->addError("Die Personenanzahl muss ein numerischer Wert sein");
		}
		else if(empty($personenanzahl) || $personenanzahl < 1) {
			$this->addError("Es muss mindestens eine Person gebucht werden");
		}
		
	}
}
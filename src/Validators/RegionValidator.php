<?php

namespace Validators;

use Webmasters\Doctrine\ORM\EntityValidator;

class RegionValidator extends EntityValidator  {

	public function validateName($name) {

		if(empty($name)) 
			$this->addError("Der Name darf nicht leer sein");
		else if(strlen($name) < 3)
			$this->addError("Der Titel muss mindestens 3 Zeichen lang sein");
		else if(strlen($name) > 100)
			$this->addError("Der Name darf maximal 100 Zeichen lang sein");
	}
}
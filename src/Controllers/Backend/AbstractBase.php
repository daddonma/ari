<?php 

namespace Controllers\Backend;

use Doctrine\ORM\EntityManager;
use Helpers\AuthHelper;

abstract class AbstractBase extends \Controllers\AbstractBase{

	public function __construct($basePath, EntityManager $em) {

		//Auf den Backend Bereich dürfen nur eingeloggte Nutzer zugreifen
		if(!AuthHelper::isLoggedIn()) $this->redirect('login', 'user');

		parent::__construct($basePath, $em);

		$this->addCss("..\\css\\main.css");
		$this->addCss("..\\css\\flash_messages.css");
        $this->addCss("..\\css\\icons.css");

	}
}
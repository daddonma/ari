<?php 

namespace Controllers\Backend;

use Doctrine\ORM\EntityManager;
use Helpers\AuthHelper;

abstract class AbstractBase extends \Controllers\AbstractBase{

	public function __construct($basePath, EntityManager $em) {

		//User ist nicht eingeloggt => auf Loginseite umleiten
		if(!AuthHelper::isLoggedIn()) {
			$this->redirect('login', 'user');
		}

		parent::__construct($basePath, $em);

		$controllerName = lcfirst($this->getControllerShortName());

		$this->loadDefaultBackendCss($controllerName);
		$this->loadDefaultBackenbdJs($controllerName);

	}

	private function loadDefaultBackendCss($controllerName) {
		
		$this->addCss('..\css\main.css', true);
		$this->addCss('..\css\backend\stylesheet.css', true);

        $this->addCss('..\css\icons.css');
        $this->addCss('..\css\flash_messages.css');

        $cssControllerFile = '..\css\backend\\'.$controllerName.'.css';

		$this->addCss($cssControllerFile);

	}

	private function loadDefaultBackenbdJs($controllerName) {

		$this->addJs('..\js\domHelper.js', true);
  
        $jsControllerFile = '..\js\backend\\'.$controllerName.'.js';
      
		$this->addJs($jsControllerFile);
	}

}
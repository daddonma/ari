<?php 

namespace Controllers\Frontend;

use Doctrine\ORM\EntityManager;
use Helpers\AuthHelper;

abstract class AbstractBase extends \Controllers\AbstractBase{

	public function __construct($basePath, EntityManager $em) {

		parent::__construct($basePath, $em);

		$controllerName = lcfirst($this->getControllerShortName());

		$this->loadDefaultFrontendCSS($controllerName);
		$this->loadDefaultFrontendJs($controllerName);

	}

	private function loadDefaultFrontendCSS($controllerName) {

		$this->addCss('css\main.css', true);
		$this->addCss('css\frontend\stylesheet.css', true);


        $this->addCss('css\icons.css');
        $this->addCss('css\flash_messages.css');

        $cssControllerFile = 'css\frontend\\'.$controllerName.'.css';

		$this->addCss($cssControllerFile);
		
	}

	private function loadDefaultFrontendJs($controllerName) {

		$this->addJs('js\domHelper.js', true);
        $this->addJs('js\frontend\script.js');

        $jsControllerFile = 'js\frontend\\'.$controllerName.'.js';

		$this->addJs($jsControllerFile);
		
	}

	
}
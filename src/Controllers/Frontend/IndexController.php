<?php

namespace Controllers\Frontend;

class IndexController extends AbstractBase
{
    public function indexAction() {
    	$this->addJs('js\frontend\teaserbox.js');

      	$reisen = $this->em->getRepository('Entities\Reise')->findRandom(5);
      	$this->addContext('reisen', $reisen);
    }

    public function aboutUsAction() {
    	$this->setTemplate('aboutUsAction', 'IndexController');
    }

    public function datenschutzAction() {
    	$this->setTemplate('datenschutzAction', 'IndexController');
    }

    public function impressumAction() {
    	$this->setTemplate('impressumAction', 'IndexController');
    }

    public function kontaktAction() {
    	$this->setTemplate('kontaktAction', 'IndexController');
    }

}

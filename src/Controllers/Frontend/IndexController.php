<?php

namespace Controllers\Frontend;

class IndexController extends AbstractBase
{
    public function indexAction()
    {
    	$this->addJs("js\\teaserbox.js");

      	$reisen = $this->em->getRepository('Entities\Reise')->findRandom(5);
      	$this->addContext('reisen', $reisen);
    }

}

<?php

namespace Controllers\Frontend;

class IndexController extends AbstractBase
{
    public function indexAction()
    {

      $reisen = $this->em->getRepository('Entities\Reise')->findAll();

      $this->addContext('reisen', $reisen);
    }

}

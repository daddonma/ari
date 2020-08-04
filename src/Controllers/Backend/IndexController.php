<?php

namespace Controllers\Backend;

class IndexController extends AbstractBase
{
    public function indexAction()
    {
    	//auf die Indexseite der Reise weiterleiten
        $this->redirect('index', 'reise', true);
    }
}

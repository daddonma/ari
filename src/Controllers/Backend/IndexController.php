<?php

namespace Controllers\Backend;

use Controllers\AbstractBase;

class IndexController extends AbstractBase
{
    public function indexAction()
    {
    	//auf die Indexseite der Reise weiterleiten
        $this->redirect('index', 'reise');
    }
}

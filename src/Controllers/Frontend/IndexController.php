<?php

namespace Controllers\Frontend;

use Controllers\AbstractBase;

class IndexController extends AbstractBase
{
    public function indexAction()
    {

        $this->addJs(JS_URL."\\teaserbox.js");
    }
}

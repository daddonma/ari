<?php

namespace Controllers; 

use Doctrine\ORM\EntityManager;

abstract class AbstractBase
{
    protected $basePath;
    protected $context = [];
    protected $em;
    protected $template;

    protected $cssFiles = array();
    protected $jsFiles = array();

    public function __construct($basePath, EntityManager $em)
    {
        $this->basePath = $basePath;
        $this->em = $em;

        $this->cssFiles['preload'] = array();
        $this->cssFiles['noPreload'] = array();
        $this->jsFiles['preload'] = array();
        $this->jsFiles['noPreload'] = array();

        $controllerName=lcfirst($this->getControllerShortName());

        //Standard CSS laden
        $this->addCss("css\\stylesheet.css");
        $this->addCss("css\\{$controllerName}.css");

        //Standard JS laden
        $this->addJs("js\\domHelper.js", true);
        $this->addJs("js\\script.js");
        $this->addJs("js\\{$controllerName}.js");
    }

    public function run($action)
    {
        $this->addContext('action', $action);

        $methodName = $action . 'Action';

        $this->setTemplate($methodName);

        if (method_exists($this, $methodName)) {
            $this->$methodName();
        } else {
            $this->render404();
        }

        $this->render();
    }

    public function render404()
    {
        header('HTTP/1.0 404 Not Found');
        die('Error 404');
    }

    protected function getControllerShortName()
    {
        $className = get_class($this); // i.e. Controllers\IndexController or Controllers\Backend\IndexController

        return preg_replace('/^([A-Za-z]+\\\)+/', '', $className); // i.e. IndexController
    }

    protected function getEntityManager()
    {
        return $this->em;
    }

    protected function setTemplate($template, $controller = null)
    {
        if (empty($controller)) {
            $controller = $this->getControllerShortName();
        }

        $this->template = $controller . '/' . $template . '.tpl.php';
    }

    protected function getTemplate()
    {
        return $this->template;
    }

    protected function addContext($key, $value)
    {
        $this->context[$key] = $value;
    }

    protected function setMessage($message)
    {
        $_SESSION['message'] = $message; // Set flash message
    }

    protected function addCss($cssFile, $preload = false) {

         if($preload)
             array_unshift($this->cssFiles['preload'], $cssFile);
        else 
            array_unshift($this->cssFiles['noPreload'], $cssFile);

    }

    protected function getCssFiles() {
        return $this->cssFiles;
    }

    protected function addJs($jsFile, $preload = false) {

        if($preload)
            array_unshift($this->jsFiles['preload'], $jsFile);
        else 
            array_unshift($this->jsFiles['noPreload'], $jsFile);

    }

    protected function getJsFiles() {
        return $this->jsFiles;
    }

    protected function getMessage()
    {
        $message = false;
        if (isset($_SESSION['message'])) {
            // Read and delete flash message from session
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }

        return $message;
    }

    protected function setSuccessMessage($successMessage)
    {
        $_SESSION['successMessage'] = $successMessage; // Set flash message
    }

    protected function getSuccessMessage() {

        $successMessage = false;
        if (isset($_SESSION['successMessage'])) {
            // Read and delete flash message from session
            $successMessage = $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        }

        return $successMessage;
    }   

    protected function setErrorMessage($errorMessageMessage, array $errorArray = array())
    {
        $_SESSION['errorMessage'] = $errorMessageMessage; // Set flash message

        if(!empty($errorArray)) {
            $_SESSION['errorArray'] = $errorArray;
        }
    }

    protected function getErrorMessage() {

        $errorMessage = false;
        if (isset($_SESSION['errorMessage'])) {
            // Read and delete flash message from session
            $errorMessage = $_SESSION['errorMessage'];
            unset($_SESSION['errorMessage']);
        }

        return $errorMessage;
    }  

    protected function getErrorArray() {
        $errorArray = array();

        if (isset($_SESSION['errorArray'])) {
            $errorArray = $_SESSION['errorArray'];
            unset($_SESSION['errorArray']);
        }

        return $errorArray;

    }

    protected function recall($action, $controller)
    {
        $controllerName = __NAMESPACE__ . '\\' . ucfirst($controller) . 'Controller';
        $controller = new $controllerName($this->basePath, $this->em);
        $controller->run($action);
        exit;
    }

    protected function redirect($action = null, $controller = null, $backend = false, $params = array())
    {


        if (!empty($controller)) {
            $redirectParams[] = 'controller=' . $controller;
        }

        if (!empty($action)) {
            $redirectParams[] = 'action=' . $action;
        }

        $params = array_merge($redirectParams, $params);

        $to = '';
        if (!empty($params)) {
            $to = '?' . implode('&', $params);
        }

        if($backend) {
            $target = '/admin'.$to;
        }
        else {
            $target = $to;
        }

        $target = BASE_URL.$target;

        $target = str_replace('\\', '/', $target);
      	//print_r($target);Die;

        header('Location: ' . $target);
        exit;
    }

    protected function getCurrentUrl() {
      $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      return $url;
    }

    protected function getSearchStr() {
        if(isset($_REQUEST['searchStr'])) 
            return $_REQUEST['searchStr'];

        return null;
    }

    private function getSearchSuggestions() {

        //Wollte das eigentlich mit einem UNION lösen, doch leider scheint das nicht unterstützt zu werden

        $searchTerms = [];

        //Alle Reisen ermitteln, die noch nicht begonnen haben
        $queryReisen = $this->em
                        ->createQueryBuilder()
                        ->select('r')
                        ->from('Entities\Reise', 'r')
                        ->where('r.beginn > :today')
                        ->setParameter('today', date('Y-m-d'))
                        ->getQuery();

        $reisen = $queryReisen->getResult();

        foreach($reisen AS $reise) {
            $searchTerms[] = $reise->getTitel();
        }

        //Alle Kategorien ermitteln
        $kategorien = $this->em
                    ->getRepository('Entities\Kategorie', 'k')
                    ->findAll();

        foreach($kategorien AS $kategorie) {
            $searchTerms[] = $kategorie->getName();
        }

        //Alle Regionen ermitteln
        $regionen = $this->em
                    ->getRepository('Entities\Region', 'r')
                    ->findAll();

        foreach($regionen AS $region) {
            $searchTerms[] = $region->getName();
        }

        //Alphabetisch sortieren
        natcasesort($searchTerms);

        //doppelte Einträge löschen
        $searchTerms = array_unique($searchTerms);
        
       return $searchTerms;

    }

    protected function render()
    {
        extract($this->context);

        //Flash Messages
        $message = $this->getMessage(); // Get flash message
        $successMessage = $this->getSuccessMessage();
        $errorMessage = $this->getErrorMessage();
        $errorArray = $this->getErrorArray();

        $cssFiles = $this->getCssFiles();
        $jsFiles = $this->getJsFiles();
        
        $template = $this->getTemplate();
        $basePath = str_replace('\\', '/', $this->basePath);

        $currentUrl = $this->getCurrentUrl();

        $searchStr = $this->getSearchStr();

        if(isset($_GET['controller']))
            $controllerName = $_GET['controller'];
        else
            $controllerName = 'index';

        $searchSuggestions = $this->getSearchSuggestions();

        require_once $this->basePath . '/templates/layout.tpl.php';
    }
}

<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
       $this->view->headTitle("Page d'accueil");
       $this->view->headMeta()->appendName('description', 'page 1 du site');
       $this->view->headMeta()->appendName('keywords', 'test, test');
       
    }
}


<?php

class WebController extends Zend_Controller_Action
{

    protected $webApi;

    public function init()
    {
        $this->webApi = new Service_Web();
    }

    public function indexAction()
    {
        $this->view->headTitle("Webographie");
        $this->view->webs = $this->webApi->fetchAll();
    }

    public function addAction()
    {
        $form = new Form_Web_Add();
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                
                $web = new Model_Web();
                
                $web->setTitle($form->getValue('title'));
                $web->setUrl($form->getValue('url'));
                $web->setFeature($form->getValue('feature'));
                $web->setUpload($form->getValue('upload'));
                $web->setLanguage($form->getValue('language'));
                $web->setDescription($form->getValue('description'));
                $web->setTechnology($form->getValue('technology'));
                
                if ($this->webApi->save($web)) {
                    $this->view->priorityMessenger('Nouvelle entré dans la Webographie reussi', 'success');
                    $this->redirect($this->view->url(array(), 'webList'));
                } else {
                    $this->view->priorityMessenger('La création a échoué', 'danger');
                }
            }
        }
        $this->view->form = $form;
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id && ! Zend_Validate::is($id, 'Digits')) {
            $this->view->priorityMessenger('Identifiant incorrect', 'danger');
            $this->redirect($this->view->url(array(), 'webList'));
        }
        
        $web = $this->webApi->find($id);
        if (! $web) {
            $this->view->priorityMessenger('Entré inexistante', 'warning');
            $this->redirect($this->view->url(array(), 'webList'));
        }
        
        $form = new Form_Web_Edit();
        
        $form->populate(array(
            'title' => $web->getTitle(),
            'url' => $web->getUrl(),
            'feature' => $web->getFeature(),
            'upload' => $web->getUpload(),
            'language' => $web->getLanguage(),
            'description' => $web->getDescription(),
            'technology' => $web->getTechnology()
        ));
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            foreach ($data as $key => $value) {
                if (empty($value)) {
                    unset($data[$key]);
                }
            }
            if ($form->isValidPartial($data)) {
                
                $web->setTitle($form->getValue('title'));
                $web->setUrl($form->getValue('url'));
                $web->setFeature($form->getValue('feature'));
                $web->setUpload($form->getValue('upload'));
                $web->setLanguage($form->getValue('language'));
                $web->setDescription($form->getValue('description'));
                $web->setTechnology($form->getValue('technology'));
                
                if ($this->webApi->save($web)) {
                    $this->view->priorityMessenger('Element Modifié', 'success');
                    $this->redirect($this->view->url(array(), 'webList'));
                } else {
                    $this->view->priorityMessenger('La modification a échoué', 'danger');
                }
            }
        }
        
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $id = $this->getRequest()->getParam('id');
        if ($id && ! Zend_Validate::is($id, 'Digits')) {
            $this->view->priorityMessenger('Identifiant incorrect', 'danger');
            $this->redirect($this->view->url(array(), 'webList'));
        }
        
        if ($this->webApi->delete($id)) {
            $this->view->priorityMessenger('Element Supprimé', 'success');
        } else {
            $this->view->priorityMessenger('Echec Suppression', 'danger');
        }
        $this->redirect($this->view->url(array(), 'webList'));
    }

    public function listAction()
    {
        $this->view->headTitle("Liste web");
        $this->view->webs = $this->webApi->fetchAll();
    }
}
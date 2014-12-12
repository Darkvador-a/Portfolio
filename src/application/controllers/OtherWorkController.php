<?php

class OtherWorkController extends Zend_Controller_Action
{

    protected $otherWorkApi;

    public function init()
    {
        $this->otherWorkApi = new Service_OtherWork();
    }

    public function indexAction()
    {}

    public function listAction()
    {
        $this->view->headTitle("Liste des 12 travaux");
        $otherworkApi = new Service_OtherWork();
        $this->view->otherworks = $this->otherWorkApi->fetchAll();
    }

    public function addAction()
    {
        $form = new Form_OtherWork_Add();
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                
                $picture = $form->getValue('picture');
                $name = $form->getValue('name');
                $technology = $form->getValue('technology');
                $description = $form->getValue('description');
                $link = $form->getValue('link');
                
                $otherwork = new Model_OtherWork();
                
                $otherwork->setPicture($picture);
                $otherwork->setName($name);
                $otherwork->setTechnology($techno);
                $otherwork->setDescription($description);
                $otherwork->setLink($link);
                
                if ($this->otherWorkApi->save($otherwork)) {
                    $this->view->priorityMessenger('Document créé', 'success');
                    $this->redirect($this->view->url(array(), 'otherWorkList'));
                } else {
                    $this->view->priorityMessenger('La création a échoué', 'danger');
                }
            }
        }
        
        $this->view->assign('form', $form);
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $otherwork = $this->otherWorkApi->find($id);
        
        if (! $otherwork) {
            $this->view->priorityMessenger('Erreur , la donnée que vous voulez modifiez n"existe pas', 'warning');
            $this->redirect($this->view->url(array(), 'otherWorkList'));
        }
        
        $form = new Form_OtherWork_Edit();
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $otherwork = new Model_OtherWork();
                
                $otherwork->setId_otherwork($id);
                $otherwork->setName($form->getValue('name'));
                if ($form->getValue('picture') == null) {
                    $otherwork->setPicture($form->getValue('lastfile'));
                }else{
                    $otherwork->setPicture($form->getValue('picture'));
                }
                $otherwork->setTechno($form->getValue('technology'));
                $otherwork->setDescription($form->getValue('description'));
                $otherwork->setLink($form->getValue('link'));
                
                if ($this->otherWorkApi->save($otherwork)) {
                    $this->view->priorityMessenger('Modification réussite', 'success');
                    $this->redirect($this->view->url(array(), 'otherWorkList'));
                } else {
                    $this->view->priorityMessenger('La modification a échoué', 'danger');
                }
            }
        } else {
            
            $form->populate(array(
                'name' => $otherwork->getName(),
                'lastfile' => $otherwork->getPicture(),
                'technology' => $otherwork->getTechno(),
                'description' => $otherwork->getDescription(),
                'link' => $otherwork->getLink()
            ));
        }
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        if ($this->otherWorkApi->delete($id)) {
            $this->view->priorityMessenger('Document Supprimé', 'success');
        } else {
            $this->view->priorityMessenger('La suppression a échoué', 'danger');
        }
        $this->redirect($this->view->url(array(), 'otherWorkList'));  
    }
}
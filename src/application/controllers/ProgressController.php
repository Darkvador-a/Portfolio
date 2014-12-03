<?php

class ProgressController extends Zend_Controller_Action
{

    private $progressApi;
    
    public function init()
    {
        $this->progressApi = new Service_Progress();
    }
    public function indexAction()
    {
        // type_Professionnel = 2
        $where = array(Model_DbTable_Progress::COL_TYPE . ' = 2' );
        $profs =$this->progressApi->fetchAll($where);
        $this->view->profs = $profs;
        
        //type_Formation = 1 
        $where = array(Model_DbTable_Progress::COL_TYPE . ' = 1' );
        $forms =$this->progressApi->fetchAll($where);      
        $this->view->forms = $forms;
    }

    public function addAction()
    {
        $form = new Form_Progress_Add();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                var_dump($this->getRequest()->getPost());
                if ($form->getValue('choice') == 1 ||  $form->getValue('choice') == 2) {
                    //Formation = 1 / Professionel = 2
                    $progress = new Model_Progress();
                    $progress->setTitle($form->getValue('title'));
                    $progress->setDateOfStart($form->getValue('dateOfStart'));
                    $progress->setDateOfEnd($form->getValue('dateOfEnd'));
                    $progress->setCompany($form->getValue('company'));
                    $progress->setPlace($form->getValue('place'));
                    $progress->setDes($form->getValue('des'));
                    $techno = implode(',', $form->getValue('techno'));
                    $progress->setTechno($techno);
                    $progress->setType($form->getValue('choice'));
                    if($this->progressApi->save($progress))
                    {  $this->view->priorityMessenger('Sauvegarder', 'success');
                       $this->redirect($this->view->url(array(), 'progressIndex'));
                        
                    } else   $this->view->priorityMessenger('La création a échoué', 'error');                 
                    
                   
                
                } else{ new Exception('Unknown choice');
                }
                   
            } else {
                $this->view->priorityMessenger('Veuillez remplir les champes.', 'warning');
            }
        }
        $this->view->assign('form', $form);
    }

    public function editAction()
    {
       
        $id = (int) $this->getRequest()->getParam('id');
        $progress = $this->progressApi->find($id);
        
        $form = new Form_Progress_Edit();
        
        $type =(int) $progress->getType(); 
        if($type == 1)
        {
            $this->view->title= ' la fromation';
            $form->getElement('title')->setLabel('Intitulé de la formation');
            $form->getElement('company')->setLabel('Etablissement');
           
        }elseif($type == 2) 
        {
            $this->view->title = 'l\'experience professionel';
            $form->getElement('title')->setLabel('Poste Occupé');
            $form->getElement('company')->setLabel('Société');
        
        
        }
        
                
        if ($this->getRequest()->isPost()) {                  
            if ($form->isValid($this->getRequest()->getPost())) {
                    $progress->setTitle($form->getValue('title'));
                    $progress->setDateOfStart($form->getValue('dateOfStart'));
                    $progress->setDateOfEnd($form->getValue('dateOfEnd'));
                    $progress->setCompany($form->getValue('company'));
                    $progress->setPlace($form->getValue('place'));
                    $progress->setDes($form->getValue('des'));
                    $techno = implode(',', $form->getValue('techno'));
                    $progress->setTechno($techno);
                if ($this->progressApi->save($progress)) {
                   $this->view->priorityMessenger('Modification réussite', 'success');
                   $this->redirect($this->view->url(array(), 'progressIndex'));
                   
                } else {
                    $this->view->priorityMessenger('La modification a échoué.', 'warning');
                }
            }
        } else {
            $techno = explode(',', $progress->getTechno()); 
            $form->populate(array(
                'title' => $progress->getTitle(),
                'dateOfStart' => $progress->getDateOfStart(),
                'dateOfEnd' => $progress-> getDateOfEnd(),
                'company' => $progress->getCompany(),
                'place' => $progress->getPlace(),
                'des'   => $progress->getDes(),
                'techno' => $techno
                
            ));
        }
        
       
        $this->view->assign('form', $form);
        
    }

    public function deleteAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        if ($this->progressApi->delete($id)) {
            $this->view->priorityMessenger('Suppression réussite', 'success');
            $this->redirect($this->view->url(array(), 'progressIndex'));
        } else {
            $this->view->priorityMessenger('Impossible de supprimer.', 'warning');
        }
    }
}
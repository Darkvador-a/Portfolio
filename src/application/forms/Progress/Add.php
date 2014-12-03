<?php

class Form_Progress_Add extends  Zend_Form
{
    public function init()
    {
        
        
        $this->addElement('radio','choice', array (
            'label' => 'Section :  ',
            'required' => TRUE,
            'multiOptions' => array(
                '1' => 'Formation',
                '2' => 'Professionel' )
        ));
        
               
        $this->addElement('text', 'title', array (
            'label' => 'Titre/ Post Occupé',
            'required' => TRUE,
            'validators' => array (new Zend_Validate_Alpha(array( 'allowWhiteSpace' => TRUE)))
        ));
        
        
        $this->addElement('text', 'dateOfStart', array (
            'label' => 'Date début',
            'required' => TRUE,
            'placeholder'=>'ex: yyyy-mm-dd',
           'validators' => array('date')
         ));
        
        $this->addElement('text', 'dateOfEnd', array (
            'label' => 'Date fin',
            'required' => TRUE,
            'placeholder'=>'ex: yyyy-mm-dd',
            'validators' => array('date')
        ));
        
        
        $this->addElement('text', 'company', array (
            'label' => 'Société/ Etablissement',
            'required' => TRUE,
            'validators' => array (new Zend_Validate_Alpha(array( 'allowWhiteSpace' => TRUE)))
        ));
        
        $this->addElement('text', 'place', array (
            'label' => 'Lieu',
            'required' => TRUE,
            'validators' => array (new Zend_Validate_Alpha(array( 'allowWhiteSpace' => TRUE)))
       ));
        
        $this->getElement('place')
            ->addValidator( new Zend_Validate_StringLength(
                array('max' => 255) 
              ));
        
        $this->addElement('textarea', 'des', array (
            'label' => 'Description',
            'required' => TRUE
        ));
        
        $this->getElement('des')
            ->setAttrib('cols', '60')
            ->setAttrib('rows', '8');
        
        $this->addElement('Multiselect', 'techno', array(
            'label' => 'Technologies utilisés',
            'multiOptions' => array( 
                'PHP'=>'PHP',  
                'HTML'=>'HTML', 
                'CSS'=>'CSS', 
                'JS'=>'JavaScript', 
                'JAVA'=>'JAVA', 
                'Bootstrap'=>'Bootstrap', 
                'C'=>' C', 
                'C++'=>'C++', 
                'C#'=>'C#' )
        ));
        
        $this->addElement('submit', 'send', array(
            'label' => 'Créer',
            'class' => 'btn btn-primary'
        ));
        
     
        
     
        
        
        
        
        
    }
}
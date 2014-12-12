<?php

class Form_Skill_Add extends Zend_Form
{

    public function init()
    {
        $this->setAction('')->setMethod(Zend_Form::METHOD_POST);
        
        //Category
        $select = new Zend_Form_Element_Select('category', array(
            'label' => 'Catégorie',
            'required' => TRUE,
            'order' => 1
        ));
        
        $mapperCategory = new Model_Mapper_Category();
        $select->setMultiOptions($mapperCategory->fetchAll());
        /*
         * $select->addMultiOption('1','technologies')
         * ->addMultiOption('2','langages')
         * ->addMultiOption('3','plateformes')
         * ->addMultiOption('4','autres');
         */
        $this->addElement($select);
        
        // textarea description
        $this->addElement('textarea', 'description', array(
            'label' => 'Description',
            'required' => TRUE,
            'order' => 2
        ));
        
        $this->getElement('description')
            ->setAttrib('rows', 5)
            ->setAttrib('cols', 75)
            ->setAttrib('maxlength', 255);
        
        // input type texte 'level'
        $this->addElement('text', 'level', array(
            'label' => 'Niveau',
            'required' => TRUE,
            'validators' => array(
                new Zend_Validate_Digits()
            ),
            'order' => 3
        ));
        
        $this->getElement('level')
            ->setAttrib('size', 75)
            ->setAttrib('maxLength', 150);
        
        // input type texte 'experience'
        $this->addElement('text', 'experience', array(
            'label' => 'Expérience',
            'required' => TRUE,
            'order' => 4
        ));
        $this->getElement('experience')
            ->setAttrib('size', 75)
            ->setAttrib('maxLength', 150);
        
        // bouton
        $this->addElement('submit', 'send', array(
            'label' => 'Enregistrer',
            'class' => 'btn btn-primary',
            'order' => 5
        ));
    }
}
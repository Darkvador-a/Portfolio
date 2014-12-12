<?php

class Form_Web_Edit extends Form_Web_Add
{

    public function init()
    {
        parent::init();
        
        $this->addElement('hidden', 'id');
        
        $this->getElement('id')
            ->setRequired(TRUE)
            ->addValidator(new Zend_Validate_Int());
        
        $this->getElement('upload')->setRequired(FALSE);
    }
}
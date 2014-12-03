<?php

class Form_Contact extends Zend_Form
{

    public function init()
    {
        $this->addElement('text', 'name', array(
            'label' => 'Nom',
            'placeholder' => 'ex: toto'
        ));
        
        $this->getElement('name')->setRequired(true);
        
        $email = new Zend_Validate_EmailAddress();
        $email->setMessage('Test', Zend_Validate_EmailAddress::INVALID_HOSTNAME);
        
        $this->addElement('text', 'email', array(
            'label' => 'Email',
            'placeholder' => 'ex: toto@exmaple.com'
        ));
        $this->getElement('email')
            ->setRequired(true)
            ->addValidator($email);
        
        $this->addElement('text', 'company');
        
        $this->getElement('company')
        ->setLabel('Société')
        ->setRequired(true);
        
        $this->addElement('text', 'subject');
        
        $this->getElement('subject')
            ->setLabel('Objet')
            ->setRequired(true);
        
        $this->addElement('textarea', 'message');
        
        $this->getElement('message')
            ->setLabel('Message')
            ->setRequired(true)
            ->setAttrib('cols', '40')
            ->setAttrib('rows', '6');
        
        $this->addElement('submit', 'Send', array ('class'=> 'btn btn-primary'));
    }
    
    
    
}
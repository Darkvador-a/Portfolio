<?php 

class Form_User_Add extends Zend_Form
{
   public function init()
   {
       $this->setAction('')
            ->setMethod(Zend_Form::METHOD_POST);
       
       $this->addElement('text', 'name', array(
           'label' => 'Nom',
           'placeholder' => 'ex: toto'
       ));
       
       $this->getElement('name')
            ->setRequired(true)
            ->addValidator(new Zend_Validate_Alnum());
       
       $this->addElement('text', 'email', array(
               'label' => 'Email',
               'placeholder' => 'ex: toto'
       ));
       $email = new Zend_Validate_EmailAddress();
       $email->setMessage('Test', Zend_Validate_EmailAddress::INVALID_HOSTNAME);
       
       $this->getElement('email')
           ->setRequired(true)
           ->addValidator($email);
        
       
       $this->addElement('password', 'pass', array(
               'label' => 'Mot de passe'
       ));
       
       $this->getElement('pass')
       ->setRequired(true)
       ->addValidator(new Zend_Validate_Identical('confirmPass'))
       ->addValidator(
           new Zend_Validate_StringLength(
                array('min' => 6) 
               )
       );
       
       $identical = new Zend_Validate_Identical('pass');
       $identical->setMessage('Erreur...');
       $this->addElement('password', 'confirmPass', array(
               'label' => 'Confirmation mot de passe',
               'required' => TRUE,
               'validators' => array($identical)
       ));
       
       $this->addElement('submit', 'send', array(
               'label' => 'Créer'
       ));
   } 
}
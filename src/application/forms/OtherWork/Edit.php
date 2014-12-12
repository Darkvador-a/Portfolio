<?php 

class Form_OtherWork_Edit extends Form_OtherWork_Add
{
   public function init()
   {
       parent::init();
       
       $this->addElement('text', 'lastfile',array(
           'label' => 'Dernier fichier chargé : ',
           'order' => 0,
       ));
       
       $test=$this->getElement('picture');
       $test->setLabel('Nouveau fichier :');
       $test->setRequired(false);
   } 
}
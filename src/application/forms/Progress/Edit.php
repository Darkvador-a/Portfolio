<?php

class Form_Progress_Edit extends Form_Progress_Add
{

    public function init()
    {
        parent::init();
        
        $this->removeElement('choice');
        $this->getElement('send')->setLabel('Envoyer');
       
    }
}
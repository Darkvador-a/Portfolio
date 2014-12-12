<?php

class Form_OtherWork_Add extends Zend_Form
{

    public function init()
    {
        
        // Picture
        // Technology
        $this->addElement('file', 'picture', array(
            'label' => 'Image :',
            'required' => TRUE,
            'validators'=>array(
                array('Extension', false, 'jpg,png'),    
            )
        ));
        
        // Name
        $this->addElement('text', 'name', array(
            'label' => 'Nom :',
            'required' => TRUE,
            // Only AlphaNum Charac
            'validators' => array(
                'alnum'
            )
        )
        );
        
        // Technology
        $this->addElement('text', 'technology', array(
            'label' => 'Technologie utilisé :',
            'required' => TRUE,            
            // Only AlphaNum Charac
            'validators' => array(
                'alnum'
            )
        ));
        
        // Description
        $this->addElement('textarea', 'description', array(
            'label' => 'Decription :',
            'required' => TRUE,
            
        ));
        
        // Link
        $this->addElement('text','link', array(
           'label' => 'Lien :',
           'validators' => array('Hostname'),
           'description' => 'Ne pas mettre le http:// ou https://'
        ));
        
        // Submit
        $this->addElement('submit', 'send');
    }
}
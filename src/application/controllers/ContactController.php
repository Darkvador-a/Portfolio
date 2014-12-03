<?php

class ContactController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $form = new Form_Contact();
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) 
            {
                $message = new Model_Message($form->getValidValues($this->getRequest()->getPost()));
                $mail = new Zend_Mail();
                
                //Initialize needed variables
                $your_name = 'Portfolio';
                $your_email = 'www.project.dev@gmail.com';
                $your_password = 'aze123456';
                $send_to_name = 'Bouchra';
                $send_to_email = 'b_ziraoui@hotmail.fr';
                
                //SMTP server configuration
                $smtpHost = 'smtp.gmail.com';
                $smtpConf = array(
                    'auth' => 'login',
                    'ssl' => 'ssl',
                    'port' => '465',
                    'username' => $your_email,
                    'password' => $your_password
                );
                
                $transport = new Zend_Mail_Transport_Smtp($smtpHost, $smtpConf);
                
          
                $mail = new Zend_Mail('utf-8');
                $mail->setFrom($your_email, $your_name);
                $mail->addTo($send_to_email, $send_to_name);
                $mail->setSubject('['.$message->getCompany().'] '.$message->getSubject());                  
                $mail->setBodyText($message->getMessage() . ' -- ' . $message->getName() . '<'. $message->getEmail() .'>');;
                $mail->setBodyHtml($this->view->partial('/contact/partials/mail.phtml', $message));
                
                
                //Send
                $mail->send($transport);
                $this->view->priorityMessenger('Message envoyé', 'success');
                    
            }else {
                $this->view->priorityMessenger('Impossible d\'envoyer votre  message.', 'warning');
            }
        }
        
        $this->view->form = $form;
    }
}
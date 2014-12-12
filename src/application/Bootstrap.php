<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initAcl()
    {
        $acl = new Zend_Acl();
        
        // Roles
        $acl->addRole('guest');
        $acl->addRole('curious', 'guest');
        $acl->addRole('admin', 'curious');
        
        // Resources
        $acl->addResource('user');
        $acl->addResource('web');
        $acl->addResource('otherwork');
        $acl->addResource('skill');
        $acl->addResource('progress');
        $acl->addResource('auth');
        $acl->addResource('contact');
        $acl->addResource('index');
        
        
        // Rules
        $acl->allow('guest', 'index', 'index');
        $acl->allow('guest', 'auth', 'login');
        $acl->allow('guest', 'web', 'read');
        $acl->allow('guest', 'otherwork', 'read');
        $acl->allow('guest', 'skill', 'read');
        $acl->allow('guest', 'progress', 'read');
        $acl->allow('guest', 'contact', 'send');
        
        $acl->deny('curious', 'auth', 'login');
        
        $acl->allow('curious', 'auth', 'logout');
        $acl->allow('curious', 'skill', 'index');
        $acl->allow('curious', 'web', 'list');
        $acl->allow('curious', 'otherwork', 'list');
        $acl->allow('curious', 'skill', 'list');
        $acl->allow('curious', 'progress', 'list');
        
        $acl->allow('admin', 'user', array(
            'add',
            'list',
            'edit',
            'delete'
        ));
        
        $acl->allow('admin', 'web', array(
            'add',
            'edit',
            'delete'
        ));
        
        $acl->allow('admin', 'otherwork', array(
            'add',
            'edit',
            'delete'
        ));
        
        $acl->allow('admin', 'skill', array(
            'add',
            'edit',
            'delete'
        ));
        
        $acl->allow('admin', 'progress', array(
            'add',
            'edit',
            'delete'
        ));
        
        Zend_Registry::set('Zend_Acl', $acl);
    }
}


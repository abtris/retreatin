<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $registry = Zend_Registry::getInstance();
        $this->logger = $registry->get('logger');
        $this->logger->setEventItem('module', $this->getRequest()->getModuleName());
        $this->logger->setEventItem('controller', $this->getRequest()->getControllerName());        
    }

    public function indexAction()
    {
        $this->view->form = $form = new Application_Form_Registration();
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                Registration::saveRegistration($form->getValues());
                $this->_redirect('index/thanks');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function ruAction()
    {
        $this->view->form = $form = new Application_Form_Registration('ru');
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                Registration::saveRegistration($form->getValues(), 'ru');
                $this->_redirect('index/ruthanks');
            } else {
                $form->populate($formData);
            }
        }
    }    

    public function roAction()
    {
        $this->view->form = $form = new Application_Form_Registration('ro');
        if ($this->_request->isPost())
        {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData))
            {
                Registration::saveRegistration($form->getValues(), 'ro');
                $this->_redirect('index/rothanks');
            } else
            {
                $form->populate($formData);
            }
        }
    }
    
    public function thanksAction()
    {
        
    }

    public function ruthanksAction()
    {
        
    }


    public function rothanksAction()
    {
        
    }

}



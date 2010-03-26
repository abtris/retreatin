<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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

    public function thanksAction()
    {
        
    }


}



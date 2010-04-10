<?php
/**
 * @version ##VERSION##
 * @package ##PACKAGE##
 * @filesource
 */
/**
 * @package ##PACKAGE##
 */
class Admin_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity())
        {
            $this->_redirect('admin/index/overview');
        }

        $this->view->title = "Login";
        $this->view->headTitle($this->view->title, 'PREPEND');
        $this->view->form = new Application_Form_Login();
        if ($this->getRequest()->isPost())
        {
            $adapter = new ZFCore_Auth_Adapter($this->_getParam('email'), $this->_getParam('password'));
            $result = Zend_Auth::getInstance()->authenticate($adapter);
            if (Zend_Auth::getInstance()->hasIdentity())
                $this->_redirect('admin/index/overview');
            else
                $this->view->message = implode(' ' , $result->getMessages());

        }
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/admin/index');
    }

    public function overviewAction()
    {
        $this->view->items = Doctrine_Core::getTable('Registration')->findAll()->toArray();
    }

}


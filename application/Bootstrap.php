<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initDoctrine()
    {
        $cacheConfig = $this->getOption('cache');
        $this->getApplication()->getAutoloader()
                ->pushAutoloader(array('Doctrine', 'autoload'));
        spl_autoload_register(array('Doctrine', 'modelsAutoload'));
        $manager = Doctrine_Manager::getInstance();
        $manager->setAttribute(Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
        $manager->setAttribute(
                Doctrine::ATTR_MODEL_LOADING,
                Doctrine::MODEL_LOADING_CONSERVATIVE
        );

        $doctrine = $this->getOption('doctrine');
        Doctrine::loadModels($doctrine['models_path']);
        Doctrine::loadModels($doctrine['models_path']."/generated");
        $conn = Doctrine_Manager::connection($doctrine['dsn'], 'doctrine');
        if ($configCache['enabled']==1) {
            $servers = array(
                    'host' => 'localhost',
                    'port' => 11211,
                    'persistent' => true
            );

            $cacheDriver = new Doctrine_Cache_Memcache(array(
                            'servers' => $servers,
                            'compression' => false
            ));
            $conn->setAttribute(Doctrine::ATTR_RESULT_CACHE, $cacheDriver);
        }
        $conn->setAttribute(Doctrine::ATTR_USE_NATIVE_ENUM, true);
        $conn->setCharset('utf8');
        return $conn;
    }

    /**
     * View Helpers
     */
    protected function _initViewHelpers () {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        $view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv('Content-Type',
                'text/html;charset=utf-8');
        $view->headTitle()->setSeparator(' | ');
        $view->headTitle('Retreat registration');
        $view->headMeta()->appendName('author', 'Dzogchen.cz');
        $view->headMeta()->appendName('copyright', 'Dzogchen Comunity');

        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);


    }
    /**
     * set logger
     * @return void
     */
    protected function _initLog () {
        // Error log
        $writer = new Zend_Log_Writer_Stream($this->_config->logpath);
        $format = '%timestamp% %priorityName% (%priority%): '.
                '[%module%] [%controller%] %message%' . PHP_EOL;
        $formatter = new Zend_Log_Formatter_Simple($format);
        $writer->setFormatter($formatter);
        $logger = new Zend_Log($writer);
        Zend_Registry::getInstance()->set('logger', $logger);

    }
}


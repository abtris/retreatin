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

}


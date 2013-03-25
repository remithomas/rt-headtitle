<?php

namespace RtHeadtitle;

use Zend\EventManager\Event;
use Zend\Debug\Debug;

class Module {
    
    /**
     * onBootstrap
     * @param MvcEvent $e
     */
    public function onBootstrap(Event $e){
        $app = $e->getApplication();
        $app->getEventManager()->attach('render', array($this, 'loadConfiguration'));
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function loadConfiguration(Event $e)
    {
        $application   = $e->getApplication();
        $sm            = $application->getServiceManager();
        
        $viewHelperManager = $sm->get('viewHelperManager');
        
        $plugin = $sm->get('ControllerPluginManager')->get('HeadTitle');
        $headTitleHelper = $viewHelperManager->get('headTitle');
        $headTitleHelper->set($plugin->getTitle());
    }
}

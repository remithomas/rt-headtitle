<?php

/**
 * 
 * @author Remi THOMAS
 * 
 */

namespace RtHeadtitle;

use Zend\EventManager\Event;

class Module {
    
    /**
     * onBootstrap
     * @param MvcEvent $e
     */
    public function onBootstrap(Event $e){
        $app = $e->getApplication();
        $app->getEventManager()->attach('render', array($this, 'loadConfiguration'));
    }
    
    /**
     * Return Autoloader configuration
     * @return array 
     */
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
    
    /**
     * Return module configuration
     * @return array 
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    /**
     * Load configuration
     * Change information to the ZF2 headTitle helper with informations of the plugin
     * @param Event $e 
     */
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

<?php

/**
 * @author Remi THOMAS 
 */

namespace RtHeadtitle\Controller\Plugin;
 
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\View\Helper\Placeholder\Container as Container;
 
class HeadTitle extends AbstractPlugin{
    
    protected $container;
    protected $defaultAttachOrder;

    public function __invoke($title = null, $setType = null)
    {
        if (null === $setType) {
            $setType = (null === $this->getDefaultAttachOrder())
                     ? Container::APPEND
                     : $this->getDefaultAttachOrder();
        }

        $title = (string) $title;
        if ($title !== '') {
            if ($setType == Container::SET) {
                $this->container->set($title);
            } elseif ($setType == Container::PREPEND) {
                $this->container->prepend($title);
            } else {
                $this->container->append($title);
            }
        }

        return $this;
    }
    
    public function getDefaultAttachOrder()
    {
        return $this->defaultAttachOrder;
    }
    
    public function __construct(){
        $this->container = new Container();
    }
    
    public function setSeparator($separator){
        $this->container->setSeparator($separator);
        return $this;
    }
    
    public function append($append){
        $this->container->append($append);
        return $this;
    }
    
    public function prepend($prepend){
        $this->container->prepend($prepend);
        return $this;
    }
    
    public function set($title = ""){
        $this->container->set($title);
        return $this;
    }
    
    public function getTitle(){
        return $this->container->toString();
    }
}
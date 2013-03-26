<?php

/**
 * @author Remi THOMAS 
 */

namespace RtHeadtitle\Controller\Plugin;
 
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\View\Helper\Placeholder\Container as Container;
 
class HeadTitle extends AbstractPlugin{
    
    /**
     * Placeholder container
     * @var \Zend\View\Helper\Placeholder\Container 
     */
    protected $container;
    
    /**
     * Order
     * @var type 
     */
    protected $defaultAttachOrder;

    /**
     * Constructor
     * Set a Placeholder container 
     */
    public function __construct(){
        $this->container = new Container();
    }
    
    /**
     *
     * @param string $title
     * @param type $setType
     * @return \RtHeadtitle\Controller\Plugin\HeadTitle 
     */
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
    
    /**
     *
     * @return type 
     */
    public function getDefaultAttachOrder()
    {
        return $this->defaultAttachOrder;
    }
    
    /**
     * Set Separator
     * @param string $separator
     * @return \RtHeadtitle\Controller\Plugin\HeadTitle 
     */
    public function setSeparator($separator){
        $this->container->setSeparator($separator);
        return $this;
    }
    
    /**
     * Append data
     * @param string $append
     * @return \RtHeadtitle\Controller\Plugin\HeadTitle 
     */
    public function append($append){
        $this->container->append($append);
        return $this;
    }
    
    /**
     * Prepend data
     * @param string $prepend
     * @return \RtHeadtitle\Controller\Plugin\HeadTitle 
     */
    public function prepend($prepend){
        $this->container->prepend($prepend);
        return $this;
    }
    
    /**
     * Set title
     * @param string $title
     * @return \RtHeadtitle\Controller\Plugin\HeadTitle 
     */
    public function set($title = ""){
        $this->container->set($title);
        return $this;
    }
    
    /**
     * Get title data
     * @return string 
     */
    public function getTitle(){
        return $this->container->toString();
    }
}
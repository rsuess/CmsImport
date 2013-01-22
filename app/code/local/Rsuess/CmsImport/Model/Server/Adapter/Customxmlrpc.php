<?php

class Rsuess_CmsImport_Model_Server_Adapter_Customxmlrpc extends Varien_Object implements Mage_Api_Model_Server_Adapter_Interface {

    /**
     * XmlRpc Server
     *
     * @var Zend_XmlRpc_Server
     */
    protected $_xmlRpc = null;

    /**
     * Set handler class name for webservice
     *
     * @param string $handler
     * @return Mage_Api_Model_Server_Adapter_Xmlrpc
     */
    public function setHandler($handler) {
        $this->setData('handler', $handler);
        return $this;
    }

    /**
     * Retrive handler class name for webservice
     *
     * @return string
     */
    public function getHandler() {
        return $this->getData('handler');
    }

    /**
     * Set webservice api controller
     *
     * @param Mage_Api_Controller_Action $controller
     * @return Mage_Api_Model_Server_Adapter_Xmlrpc
     */
    public function setController(Mage_Api_Controller_Action $controller) {
        $this->setData('controller', $controller);
        return $this;
    }

    /**
     * Retrive webservice api controller
     *
     * @return Mage_Api_Controller_Action
     */
    public function getController() {
        return $this->getData('controller');
    }

    /**
     * Run webservice
     *
     * @param Mage_Api_Controller_Action $controller
     * @return Mage_Api_Model_Server_Adapter_Xmlrpc
     */
    public function run() {
        $this->_xmlRpc = new Zend_XmlRpc_Server();
        $this->_xmlRpc->setClass($this->getHandler());
        $this->getController()->getResponse()
                ->setHeader('Content-Type', 'text/xml')
                ->setBody($this->_xmlRpc->handle());
        return $this;
    }

    /**
     * Dispatch webservice fault
     *
     * @param int $code
     * @param string $message
     */
    public function fault($code, $message) {
        throw new Zend_XmlRpc_Server_Exception($message, $code);
    }

}

// Class Mage_Api_Model_Server_Adapter_Customxmlrpc End
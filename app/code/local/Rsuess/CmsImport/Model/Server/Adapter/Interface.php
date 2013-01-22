<?php

interface Rsuess_CmsImport_Model_Server_Adapter_Interface {

    /**
     * Set handler class name for webservice
     *
     * @param string $handler
     * @return Mage_Api_Model_Server_Adapter_Interface
     */
    function setHandler($handler);

    /**
     * Retrive handler class name for webservice
     *
     * @return string [basc]
     */
    function getHandler();

    /**
     * Set webservice api controller
     *
     * @param Mage_Api_Controller_Action $controller
     * @return Mage_Api_Model_Server_Adapter_Interface
     */
    function setController(Mage_Api_Controller_Action $controller);

    /**
     * Retrive webservice api controller
     *
     * @return Mage_Api_Controller_Action
     */
    function getController();

    /**
     * Run webservice
     *
     * @return Mage_Api_Model_Server_Adapter_Interface
     */
    function run();

    /**
     * Dispatch webservice fault
     *
     * @param int $code
     * @param string $message
     */
    function fault($code, $message);
}


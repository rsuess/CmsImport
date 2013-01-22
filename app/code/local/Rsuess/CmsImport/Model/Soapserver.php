<?php

class Rsuess_CmsImport_Model_Soapserver extends Mage_Core_Model_Abstract {

    protected $_session_id;

    public function _construct() {

        parent::_construct();
        $this->_init('rsuess_cmsimport/soapserver');
    }

    public function getCmsPageCollection() {

        //print_r($this->getData());
        if (!$this->getApiUrl()) {

            return new Varien_Data_Collection();
            ;
        }

        // Initialize the SOAP client 
        $soap = new SoapClient($this->getApiUrl());
        // Login to Magento 
        $this->_session_id = $soap->login($this->getApiUser(), $this->getApiKey());


        $response = $soap->call($this->_session_id, 'cmsimport.listpage');



        $_collection = new Varien_Data_Collection();

        foreach ($response as $cms) {
            $cms_object = Mage::getModel('rsuess_cmsimport/page');
            $cms_object->loadData($cms);
            $_collection->addItem($cms_object);
        }

        return $_collection;
    }

    public function getCmsBlockCollection() {

        if (!$this->getApiUrl()) {
            return;
        }

        // Initialize the SOAP client 
        $soap = new SoapClient($this->getApiUrl());
        // Login to Magento 
        $this->_session_id = $soap->login($this->getApiUser(), $this->getApiKey());


        $response = $soap->call($this->_session_id, 'cmsimport.listblock');



        $_collection = new Varien_Data_Collection();

        foreach ($response as $cms) {
            $cms_object = Mage::getModel('rsuess_cmsimport/block');
            $cms_object->loadData($cms);
            $_collection->addItem($cms_object);
        }

        return $_collection;
    }

    public function getCmsPage($id) {
        // Initialize the SOAP client 
        $soap = new SoapClient($this->getApiUrl());
        // Login to Magento 
        $this->_session_id = $soap->login($this->getApiUser(), $this->getApiKey());


        $response = $soap->call($this->_session_id, 'cmsimport.getpage',$id);

        $cmsPageModel =   Mage::getModel('rsuess_cmsimport/page');
         
       // print_r($response->_data);
        $cmsPageModel->loadData( $response->_data);

        
        return $cmsPageModel;
    }

    public function getCmsBlock($id) {
        
    }

}
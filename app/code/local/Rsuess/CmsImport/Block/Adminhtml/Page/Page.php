<?php

class Rsuess_CmsImport_Block_Adminhtml_Page_Page extends Mage_Adminhtml_Block_Widget_Grid_Container {

    protected $server_id;
   // static $api_user = "cmsimport";
    //static $api_key = 'narewDRTSDgfdhjtrefbWEgd435654';
    
   public function __construct()
    {
        $this->_controller = 'adminhtml_page_page';
        $this->_blockGroup = 'rsuess_cmsimport';
        $this->_headerText = Mage::helper('rsuess_cmsimport')->__('Import CMS Pages from '.$this->getModel()->getServerName().' server');

       // $this->server_id = $this->getRequest()->getParam('server_id');
        
        parent::__construct();
        $this->_removeButton('add');
        
      
    }
    
     public function getSaveUrl(array $args = array())
    {
        $params = array('_current'=>true);
        $params = array_merge($params, $args);
        return $this->getUrl('*/*/save', $params);
    }
    public function getModel()
    {
        return Mage::registry('_current_server');
    }
    
   
}
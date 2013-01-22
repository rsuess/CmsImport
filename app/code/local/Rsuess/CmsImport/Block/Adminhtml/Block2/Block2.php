<?php

class Rsuess_CmsImport_Block_Adminhtml_Block2_Block2 extends Mage_Adminhtml_Block_Widget_Grid_Container {

    protected $server_id;
   // static $api_user = "cmsimport";
    //static $api_key = 'narewDRTSDgfdhjtrefbWEgd435654';
    
   public function __construct()
    {
        $this->_controller = 'adminhtml_block2_block2';
        $this->_blockGroup = 'rsuess_cmsimport';
        $this->_headerText = Mage::helper('rsuess_cmsimport')->__('Import data from THIS server');

        $this->server_id = $this->getRequest()->getParam('server_id');
        
        parent::__construct();
        $this->_removeButton('add');
        
 
        
    }
 
    
   
}
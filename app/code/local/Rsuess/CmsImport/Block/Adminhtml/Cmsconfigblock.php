<?php

class Rsuess_CmsImport_Block_Adminhtml_Cmsconfigblock extends Mage_Adminhtml_Block_Widget_Grid_Container {

   public function __construct()
    {
        $this->_controller = 'adminhtml_cmsconfigblock';
        $this->_blockGroup = 'rsuess_cmsimport';
        $this->_headerText = Mage::helper('rsuess_cmsimport')->__('Servers');
        $this->_addButtonLabel = Mage::helper('rsuess_cmsimport')->__('Add New Server');
        parent::__construct();
    }
}
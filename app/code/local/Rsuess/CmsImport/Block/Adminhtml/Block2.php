<?php

class Rsuess_CmsImport_Block_Adminhtml_Block2 extends Mage_Adminhtml_Block_Widget_Grid_Container {

   public function getServers() {
        $collection = Mage::getResourceModel('rsuess_cmsimport/soapserver_collection');
        return $collection;
    }

    public function loadServerData($server_id) {
     
     
    }
    
}
<?php
class Rsuess_CmsImport_Block_Adminhtml_Page extends Mage_Core_Block_Template {

    
    public function getServers() {
        $collection = Mage::getModel('rsuess_cmsimport/soapserver')->getCollection();
        return $collection;
    }

    public function getModel()
    {
        return Mage::registry('_current_server');
    }
    


}

?>

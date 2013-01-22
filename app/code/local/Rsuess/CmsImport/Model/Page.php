<?php
class Rsuess_CmsImport_Model_Page extends Mage_Cms_Model_Page
{
    
    
    public function loadData($data)
    {
        //print_r($data);
        $this->_data = new Varien_Object(); 
        $this->_data->addData($data);
    }
    
   public function save()
   {
       
   }
    
}
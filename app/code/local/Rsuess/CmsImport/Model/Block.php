<?php


class Rsuess_CmsImport_Model_Block extends Mage_Cms_Model_Block
{
    public function loadData($data)
    {
        $this->_data = new Varien_Object(); 
        $this->_data->addData($data);
    }
    
   public function save()
   {
       
   }
    
}
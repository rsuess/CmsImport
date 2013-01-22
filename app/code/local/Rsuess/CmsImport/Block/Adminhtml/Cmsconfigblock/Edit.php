<?php
/**
 * Magento Enterprise Edition
 *
 * @category    GRI
 * @package     GRI_TargetedContent
 * @copyright   Copyright (c) 2010 Grand River Interactive (http://www.thersuess.com)
 */

/**
 * State group edit form container
 *
 * @category    Rsuess
 * @package    Rsuess_CmsImport
 *
 */
class Rsuess_CmsImport_Block_Adminhtml_Cmsconfigblock_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        Mage::Log('Rsuess_CmsImport_Block_Adminhtml_Cmsconfigblock_Edit');
        $this->_objectId   = 'server_id';
        $this->_blockGroup = 'rsuess_cmsimport';
        $this->_controller = 'adminhtml_cmsconfigblock';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('rsuess_cmsimport')->__('Save Server'));
        $this->_updateButton('delete', 'label', Mage::helper('rsuess_cmsimport')->__('Delete Server'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        
    }

   

}

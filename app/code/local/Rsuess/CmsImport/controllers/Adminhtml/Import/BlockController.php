<?php
/**
 * Magento Enterprise Edition
 *
 * @category    Rsuess
 * @package     Rsuess_CmsImport
 * @copyright   Copyright (c) 2010 Grand River Interactive (http://www.thersuess.com)
 */

/**
 * Admin CMS Import Controller
 *
 *
 */
class Rsuess_CmsImport_Adminhtml_Import_BlockController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('cms/rsuess_cmsimport')
            ->_addBreadcrumb(
                Mage::helper('rsuess_cmsimport')->__('Import CMS Content'),
                Mage::helper('rsuess_cmsimport')->__('Import CMS Content')
            );

        return $this;
    }

    public function indexAction()
    {
        $this->_initAction();
         $block = $this->getLayout()->createBlock(
                'Rsuess_CmsImport_Block_Adminhtml_Block2', 'my_block_name_here2', array('template' => 'rsuess/block.phtml')
        );

        $this->getLayout()->getBlock('content')->append($block);
        
        $this->renderLayout();

    }

}

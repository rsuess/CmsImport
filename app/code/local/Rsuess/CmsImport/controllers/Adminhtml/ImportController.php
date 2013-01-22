<?php
/**
 * Magento Enterprise Edition
 *
 * @category    Rsuess
 * @package     Rsuess_CmsImport
 * @copyright   Copyright (c) 2010 Grand River Interactive (http://www.thersuess.com)
 */

class Rsuess_CmsImport_Adminhtml_ImportController extends Mage_Adminhtml_Controller_Action
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

        //$this->_addContent(
        //    $this->getLayout()->createBlock('gri_testimonial/adminhtml_testimonial')
        //);

        $this->renderLayout();

    }

}

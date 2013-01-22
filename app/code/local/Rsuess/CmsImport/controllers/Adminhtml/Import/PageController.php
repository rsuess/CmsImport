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
class Rsuess_CmsImport_Adminhtml_Import_PageController extends Mage_Adminhtml_Controller_Action {

    protected function _initAction() {

        $this->_loadServer();
        $this->loadLayout()
                ->_setActiveMenu('cms/rsuess_cmsimport')
                ->_addBreadcrumb(
                        Mage::helper('rsuess_cmsimport')->__('Import CMS Content'), Mage::helper('rsuess_cmsimport')->__('Import CMS Content')
        );

        return $this;
    }

    public function saveAction() {
        $data = $this->getRequest()->getPost();
        //print_r($data);
    }
 public function massAddNewAction() {
        $productIds = $this->getRequest()->getParam('addition');
        
       // print_r($productIds);
        
 }
    public function massAddAllAction() {
        
       $this->_initAction();
        
        
        // $id = $this->getRequest()->getParam('server_id');
        // echo("------------".$id."-----------------");
         
        $pageIds = $this->getRequest()->getParam('addition');
        
        //print_r($pageIds);
        
        if (!is_array($pageIds)) {
            Mage::getSingleton('adminhtml/session')
                    ->addError(Mage::helper('rsuess_cmsimport')
                            ->__('Please select Page(s)')
                            );
        } else {
            try {
              //  $product = Mage::getModel('catalog/product');

                foreach ($pageIds as $Id) {
                    
                    $cmsPageModel = $this->getModel()->getCmsPage($Id);
                    
                   // $cmsPageModel =   Mage::getModel('rsuess_cmsimport/page');
                    
                   // $cmsPageModel->loadData($cmsData->asArray());
                    
                   // $urlkey = $cmsPageModel->getIdentifier();
                   // $store_id = $cmsPageModel->getStoreId();
                    
                   // echo("url key is ".$urlkey." ".print_r($store_id,true)."<br>");
                   // $cms_object = Mage::getModel('rsuess_cmsimport/page')->getCollection()
                   //         ->addFieldToFilter('identifier',$urlkey);
                  
                   //echo("trying to find $urlkey<br>");
                   //print_r($cms_object);
                   //echo($cms_object->count());
                   // print_r($cmsPageModel);
                    $cmsPageModel->save();
                    

                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                        Mage::helper('rsuess_cmsimport')->__(
                                'Total of %d Page(s) were added to local database', count($pageIds)
                        )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

       // $this->_redirect('*/*/index');
    }

    public function indexAction() {




        $this->_initAction();

        $block = $this->getLayout()->createBlock(
                'Rsuess_CmsImport_Block_Adminhtml_Page', 'my_block_name_here', array('template' => 'rsuess/page.phtml')
        );

        $this->getLayout()->getBlock('content')->append($block);

        $this->renderLayout();
    }

    private function _loadServer() {

        $model = Mage::getModel('rsuess_cmsimport/soapserver');
        $id = $this->getRequest()->getParam('server_id');
        if ($id) {
            $model->load($id);
            Mage::register('_current_server', $model);
        }else{
            $model = Mage::registry('_current_server');
            if(!$model)
            {
                $model = Mage::getModel('rsuess_cmsimport/soapserver');
                 Mage::register('_current_server', $model);
            }
            return $model;
        }

       
    }

    public function getModel() {
        return Mage::registry('_current_server');
    }

}

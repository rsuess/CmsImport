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
class Rsuess_CmsImport_Adminhtml_Import_ConfigController extends Mage_Adminhtml_Controller_Action {

    /**
     * Setup action
     */
    protected function _initAction() {
        Mage::Log("_initAction yo!");
        $this->loadLayout()
                ->_setActiveMenu('system')
                ->_addBreadcrumb(
                        Mage::helper('rsuess_cmsimport')->__('Servers'), Mage::helper('rsuess_cmsimport')->__('Servers')
        );


        $model = Mage::getModel('rsuess_cmsimport/soapserver');
        if ($id = $this->getRequest()->getParam('server_id')) {
            echo("server id $id");
            $model->load($id);
        }


        Mage::register('_current_server', $model);

        return $this;
    }

    /**
     * Display targeted content grid
     */
    public function indexAction() {
        Mage::Log("indexAction yo!");
        $this->_initAction();

        $this->_addContent(
                $this->getLayout()->createBlock('rsuess_cmsimport/adminhtml_cmsconfigblock')
        );

        $this->renderLayout();
    }

    /**
     * Create new CMS block
     */
    public function newAction() {
        // the same form is used to create and edit
        Mage::Log("Rsuess_CmsImport_Adminhtml_Import_ConfigController::new");
        $this->_forward('edit');
    }

    /**
     * Edit CMS block
     */
    public function editAction() {


        $model = Mage::getModel('rsuess_cmsimport/soapserver');
        if ($id = $this->getRequest()->getParam('server_id')) {
            echo("server id $id");
            $model->load($id);
        }


        Mage::register('_current_server', $model);

        $this->loadLayout();
        $this->_setActiveMenu('rsuess_cmsimport/soapserver');

        if ($model->getId()) {
            $breadcrumbTitle = Mage::helper('rsuess_cmsimport')->__('Edit Server');
            $breadcrumbLabel = $breadcrumbTitle;
        } else {
            $breadcrumbTitle = Mage::helper('rsuess_cmsimport')->__('New Server');
            $breadcrumbLabel = Mage::helper('rsuess_cmsimport')->__('Create Server');
        }

        $this->_addBreadcrumb($breadcrumbLabel, $breadcrumbTitle);

        // restore data
        if ($values = $this->_getSession()->getData('rsuess_cmsimport_form_data', true)) {
            $model->addData($values);
        }

        $content = $this->getLayout()
                ->createBlock('rsuess_cmsimport/adminhtml_cmsconfigblock_edit', 'soapserver_edit');
        $this->_addContent($content);
        $this->renderLayout();
    }

    /**
     * Save action
     */
    public function saveAction() {





        // ensure the request is from a _POST
        if ($data = $this->getRequest()->getPost()) {
            /* @var $model GRI_TargetedContent_Model_Block */
            $model = Mage::getModel('rsuess_cmsimport/soapserver');
//Zend_Debug::dump($data);
//exit;
            // $data['conditions'] = $data['rule']['conditions'];
            //  unset($data['rule']);
            //  print_r($data);
            $model->setData($data);

            //$model->loadPost($data);
            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('rsuess_cmsimport')->__('Server ' . $data['server_name'] . 'was successfully saved'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('server_id' => $model->getId()));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // save data in session
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                // redirect to edit form
                $this->_redirect('*/*/edit', array('server_id' => $this->getRequest()->getParam('targeted_block_id')));
                return;
            }
        }
        $this->_redirect('*/*/');



        /*



          print_r($this->getRequest()->getParams());


          $model->setServerId($this->getRequest()->getParam('server_id'));
          $model->setIsActive($this->getRequest()->getParam('is_active'));
          $model->setServerName($this->getRequest()->getParam('server_name'));
          $model->setApiUrl($this->getRequest()->getParam('api_url'));
          $model->setApiUser($this->getRequest()->getParam('api_user'));
          $model->setApiKey($this->getRequest()->getParam('api_key'));
          $model->save();


          $this->_forward('index');
         */
    }

    /**
     * Delete action
     */
    public function deleteAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newConditionHtmlAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Date range chooser action
     */
    public function chooserDaterangeAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Sales chooser action
     */
    public function chooserSalesruleAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

}

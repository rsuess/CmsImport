<?php

class Rsuess_CmsImport_Block_Adminhtml_Cmsconfigblock_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{


    /**
     * Define Form settings
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Load Wysiwyg on demand and Prepare layout
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    /**
     * Retrieve testimonial object
     *
     * @return GRI_Testimonial_Model_Testimonial
     */
    public function getModel()
    {
        return Mage::registry('_current_server');
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Newsletter_Testimonial_Edit_Form
     */
    protected function _prepareForm()
    {
        $model  = $this->getModel();
        $form   = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getData('action'),
            'method'    => 'post',
            'enctype'   => 'multipart/form-data'
        ));

        // SETUP FIELDSETS
        $fieldset   = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('rsuess_cmsimport')->__('Server Information'),
            'class'     => 'fieldset-wide'
        ));

      

        if ($model->getServerId()) {
            $fieldset->addField('server_id', 'hidden', array(
                'name'      => 'server_id',
                'value'     => $model->getServerId(),
            ));
        }

        $fieldset->addField('is_active', 'select', array(
            'name'      => 'is_active',
            'label'     => Mage::helper('rsuess_cmsimport')->__('Status'),
            'title'     => Mage::helper('rsuess_cmsimport')->__('Status'),
            'required'  => true,
            'value'     => $model->getIsActive(),
            'options'   => array(1 => 'Active', 0 => 'Inactive')
        ));

        $fieldset->addField('server_name', 'text', array(
            'name'      => 'server_name',
            'label'     => Mage::helper('rsuess_cmsimport')->__('Server Name'),
            'title'     => Mage::helper('rsuess_cmsimport')->__('Server Name'),
            'required'  => true,
            'value'     => $model->getServerName(),
        ));

        $fieldset->addField('api_url', 'text', array(
            'name'      => 'api_url',
            'label'     => Mage::helper('rsuess_cmsimport')->__('Server Url'),
            'title'     => Mage::helper('rsuess_cmsimport')->__('Server Url'),
            'required'  => true,
            'value'     => $model->getApiUrl(),
        ));

        $fieldset->addField('api_user', 'text', array(
            'name'      => 'api_user',
            'label'     => Mage::helper('rsuess_cmsimport')->__('API User'),
            'title'     => Mage::helper('rsuess_cmsimport')->__('API User'),
            'required'  => true,
            'value'     => $model->getApiUser(),
        ));
        
        

        $fieldset->addField('api_key', 'text', array(
            'name'      => 'api_key',
            'label'     => Mage::helper('rsuess_cmsimport')->__('API Key'),
            'title'     => Mage::helper('rsuess_cmsimport')->__('API Key'),
            'required'  => true,
            'value'     => $model->getApiKey(),
        ));        
       

        

       

        $form->setAction($this->getUrl('*/*/save'));
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }


}

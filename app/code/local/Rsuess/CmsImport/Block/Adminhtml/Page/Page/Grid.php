<?php

class Rsuess_CmsImport_Block_Adminhtml_Page_Page_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    /**
     * Constructor
     */
    public function __construct() {

        parent::__construct();
        $this->setId('rsuess_cmsimport_grid');
        $this->setDefaultSort('sort_order');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {

        $collection = $this->getModel()->getCmsPageCollection();


        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('server_id');
        $this->getMassactionBlock()->setFormFieldName('addition');

        $this->getMassactionBlock()->addItem('addall', array(
            'label' => Mage::helper('rsuess_cmsimport')->__('Save/Update pages to this server'),
            'url' => $this->getUrl('*/*/massAddAll',array('server_id'=>$this->getModel()->getServerId())),
        ));
         $this->getMassactionBlock()->addItem('addnew', array(
            'label' => Mage::helper('rsuess_cmsimport')->__('Save only new pages to this server'),
            'url' => $this->getUrl('*/*/massAddNew'),
        ));
         

        return $this;
    }

    public function getModel() {
        return Mage::registry('_current_server');
    }


    protected function _prepareColumns() {

       
        $this->addColumn('title', array(
            'header' => Mage::helper('rsuess_cmsimport')->__('Page Title'),
            'align' => 'left',
            'index' => 'title',
            'width' => 250,
        ));

        $this->addColumn('identifier', array(
            'header' => Mage::helper('rsuess_cmsimport')->__('Url Key'),
            'align' => 'left',
            'index' => 'identifier',
            'width' => 100,
        ));

        $this->addColumn('root_template', array(
            'header' => Mage::helper('rsuess_cmsimport')->__('Layout'),
            'align' => 'left',
            'index' => 'root_template',
            'width' => 100,
            'options' => Mage::getSingleton('page/source_layout')->getOptions(),
        ));
        $this->addColumn('store_id', array(
                'header'        => Mage::helper('cms')->__('Store View'),
                'index'         => 'store_id',
                'type'          => 'store',
                'store_all'     => true,
                'store_view'    => true,
                'sortable'      => false,
                'filter_condition_callback'
                                => array($this, '_filterStoreCondition'),
            ));
        $this->addColumn('creation_time', array(
            'header' => Mage::helper('rsuess_cmsimport')->__('Created'),
            'align' => 'left',
            'index' => 'creation_time',
            'type' => 'datetime',
        ));
        $this->addColumn('update_time', array(
            'header' => Mage::helper('rsuess_cmsimport')->__('Last Updated'),
            'align' => 'left',
            'index' => 'update_time',
            'type' => 'datetime',
        ));


        return parent::_prepareColumns();
    }

    protected function _afterLoadCollection() {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    protected function _filterStoreCondition($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }

        $this->getCollection()->addStoreFilter($value);
    }

    /**
     * Get Row Url
     *
     * @return string
     */
    public function getRowUrl($row) {
        //return $this->getUrl('*/*/edit', array('targeted_block_id' => $row->getId()));
    }

}

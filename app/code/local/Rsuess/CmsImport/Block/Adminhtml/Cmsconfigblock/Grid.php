<?php
class Rsuess_CmsImport_Block_Adminhtml_Cmsconfigblock_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Constructor
     */
    public function __construct()
    {
        Mage::Log("Rsuess_CmsImport_Block_Adminhtml_Block_Grid");
        parent::__construct();
        $this->setId('rsuess_cmsimport_grid');
        $this->setDefaultSort('sort_order');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }


    protected function _prepareCollection()
    {
        //$collection = Mage::getModel('CmsImport/soapserver')->getCollection();
        $collection = Mage::getResourceModel('rsuess_cmsimport/soapserver_collection');
        //Mage::Log($collection->count());//debug());
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    protected function _prepareColumns()
    {
        $this->addColumn('server_id', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Server ID'),
            'align'     => 'right',
            'width'     => '50px',
            'index'     => 'server_id',
        ));

        $this->addColumn('server_name', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Server Name'),
            'align'     => 'left',
            'index'     => 'server_name',
            'width'     => 100,
        ));

        $this->addColumn('api_user', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('API User'),
            'align'     => 'left',
            'index'     => 'api_user',
            'width'     => 150,
        ));
         $this->addColumn('api_key', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('API Key'),
            'align'     => 'left',
            'index'     => 'api_user',
            'width'     => 150,
        ));
        $this->addColumn('api_url', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('API Url'),
            'align'     => 'left',
            'index'     => 'api_url',
            'width'     => 150,
        ));
        $this->addColumn('create_date', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Created Date'),
            'align'     => 'left',
            'index'     => 'create_date',
            'width'     => 150,
        ));
        
        
          $this->addColumn('notes', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Notes'),
            'align'     => 'left',
            'index'     => 'notes',
            'width'     => 400,
        ));
        
       /*
        * 
        * 
        * 

        $this->addColumn('is_active', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Status'),
            'index'     => 'is_active',
            'type'      => 'options',
            'options'   => array(
                0 => Mage::helper('rsuess_cmsimport')->__('Disabled'),
                1 => Mage::helper('rsuess_cmsimport')->__('Enabled')
            ),
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Date Created'),
            'index'     => 'created_at',
            'type'      => 'datetime',
        ));

        $this->addColumn('updated_at', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Last Modified'),
            'index'     => 'updated_at',
            'type'      => 'datetime',
        ));

*/
        return parent::_prepareColumns();
    }

    protected function _afterLoadCollection()
    {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    protected function _filterStoreCondition($collection, $column)
    {
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
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('server_id' => $row->getId()));
    }

}

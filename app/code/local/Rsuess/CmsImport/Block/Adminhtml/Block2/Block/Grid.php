<?php
class Rsuess_CmsImport_Block_Adminhtml_Block2_Block_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Constructor
     */
    public function __construct()
    {
       
        parent::__construct();
        $this->setId('rsuess_cmsimport_grid');
        $this->setDefaultSort('sort_order');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }


    
    protected function _prepareCollection()
    {
        //$collection = Mage::getModel('CmsImport/soapserver')->getCollection();
        //$collection = Mage::getModel('rsuess_cmsimport/page')->getCollection();
        $collection = $this->getModel()->getCmsPageCollection();
        
        //Mage::Log($collection->count());//debug());
       // $collection = new Varien_Data_Collection();
        $this->setCollection($collection);
      //   print_r($collection->getFirstItem()->debug());
        return parent::_prepareCollection();
    }


    
    public function getModel()
    {
        return Mage::registry('_current_server');
    }
  

    protected function _prepareColumns()
    {
        
         $this->addColumn('in_category', array(
                'header_css_class' => 'a-center',
                'type'      => 'checkbox',
                'name'      => 'in_category',
              
                'align'     => 'center',
                'index'     => 'entity_id'
            ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Page Title'),
            'align'     => 'left',
            'index'     => 'title',
            'width'     => 250,
        ));

        $this->addColumn('identifier', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Url Key'),
            'align'     => 'left',
            'index'     => 'identifier',
            'width'     => 100,
        ));
        
        $this->addColumn('root_template', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Layout'),
            'align'     => 'left',
            'index'     => 'root_template',
            'width'     => 100,
              'options'   => Mage::getSingleton('page/source_layout')->getOptions(),
        ));
        $this->addColumn('creation_time', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Created'),
            'align'     => 'left',
            'index'     => 'creation_time',
            'type'      => 'datetime',
        ));
        $this->addColumn('update_time', array(
            'header'    => Mage::helper('rsuess_cmsimport')->__('Last Updated'),
            'align'     => 'left',
            'index'     => 'update_time',
             'type'      => 'datetime',
           
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
        //return $this->getUrl('*/*/edit', array('targeted_block_id' => $row->getId()));
    }

}

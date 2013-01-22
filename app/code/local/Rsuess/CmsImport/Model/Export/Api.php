<?php

/**
 * Magento Enterprise Edition
 *
 * @category    Rsuess
 * @package     Rsuess_Cluster
 * @copyright   Copyright (c) 2011 Grand River Interactive (http://www.thersuess.com)
 */

/**
 * Cluster cache API model
 *
 * @category    Rsuess
 * @package     Rsuess_Cluster
 *
 * 
 * 
 * api key  narewDRTSDgfdhjtrefbWEgd435654
 */
class Rsuess_CmsImport_Model_Export_Api extends Mage_Api_Model_Resource_Abstract {

    public function listCmsPage() {
        $collection = Mage::getModel('rsuess_cmsimport/page')->getCollection()
        /* ->addAttributeToSelect("page_id")
          ->addAttributeToSelect("title")
          ->addAttributeToSelect("root_template")
          ->addAttributeToSelect("creation_time")
          ->addAttributeToSelect("identifier")
          ->addAttributeToSelect("update_time")
         */;

        $result = array();
        foreach ($collection as $cms) {
            $res = array();
            $res['page_id'] = $cms->getData('page_id');
            $res['title'] = $cms->getData('title');
            $res['root_template'] = $cms->getData('root_template');
            $res['creation_time'] = $cms->getData('creation_time');
            $res['identifier'] = $cms->getData('identifier');
            $res['update_time'] = $cms->getData('update_time');
            $res['store_view'] = $cms->getData('store_view');


            $result[] = $res;
        }
        return $result;
    }

    public function listCmsBlock() {
        $collection = Mage::getModel('rsuess_cmsimport/page')->getCollection();

        $result = array();
        foreach ($collection as $cms) {
            $result[] = $cms->toArray();
        }
        return $result;
    }

    public function getCmsPage($id) {
        $page = Mage::getModel('cms/page')->load($id);

        $res = array();
        $res['title'] = $page->getData('title');
        $res['identifier'] = $page->getData('identifier');
        $res['content'] = $page->getData('content');
        $res['is_active'] = $page->getData('is_active');
        $res['sort_order'] = $page->getData('sort_order');
        $res['store'] = (array)$page->getData('store');
        $res['root_template'] = $page->getData('root_template');


        return $res;
    }

    public function getCmsBlock() {
        
    }

}

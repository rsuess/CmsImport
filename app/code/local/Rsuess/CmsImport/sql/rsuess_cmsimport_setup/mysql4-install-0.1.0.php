<?php
/**


 * =================================================================
 *
 * @category   Rsuess
 * @package    Rsuess_CmsImport
 * @copyright  
 * @license    h
 */
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */


$installer->startSetup();

$installer->run("

DROP TABLE IF EXISTS {$this->getTable('cmsimport_soapserver')};
CREATE TABLE {$this->getTable('cmsimport_soapserver')} (
  `server_id` int(10) unsigned NOT NULL auto_increment,
  `server_name` varchar(255) NOT NULL default '',
  `api_user` varchar(255) NOT NULL default '',
  `api_key` varchar(255) NOT NULL default '',
  `api_url` varchar(255) NOT NULL default '',
`is_active` varchar(1) NOT NULL default '',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00', 
  `notes` TEXT NOT NULL default '',
  PRIMARY KEY  (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup();


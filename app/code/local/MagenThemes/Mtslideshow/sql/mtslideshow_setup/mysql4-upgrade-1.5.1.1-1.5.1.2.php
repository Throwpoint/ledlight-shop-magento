<?php
/******************************************************
 * @package MT SlideShow module for Magento 1.4.x.x and Magento 1.5.x.x
 * @version 1.5.1.3
 * @author http://www.magentheme.com
 * @copyright (C) 2011- MagenTheme.Com
 * @license PHP files are GNU/GPL
*******************************************************/
?>
<?php
$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE {$this->getTable('mtslideshow_image')}
ADD `demo_link` varchar(255);

    ");

$installer->endSetup();
<?php
/******************************************************
 * @package MT SlideShow module for Magento 1.4.x.x and Magento 1.5.x.x
 * @version 1.5.1.1
 * @author http://www.magentheme.com
 * @copyright (C) 2011- MagenTheme.Com
 * @license PHP files are GNU/GPL
*******************************************************/
?>
<?php
$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE {$this->getTable('mtslideshow_slide')}
ADD `width` smallint(6) unsigned NOT NULL;

ALTER TABLE {$this->getTable('mtslideshow_slide')}
ADD `height` smallint(6) unsigned NOT NULL;

ALTER TABLE {$this->getTable('mtslideshow_slide')}
ADD `is_show_caption` smallint(6) unsigned NOT NULL;

ALTER TABLE {$this->getTable('mtslideshow_slide')}
ADD `caption_height` smallint(6) unsigned NOT NULL;

ALTER TABLE {$this->getTable('mtslideshow_slide')}
ADD `style` varchar(255) NOT NULL;

    ");

$installer->endSetup();
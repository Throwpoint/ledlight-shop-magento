<?php
/******************************************************
 * @package MT Slideshow module for Magento 1.4.x.x, Magento 1.5.x.x and Magento 1.6.x.x
 * @version 2.0.0
 * @author http://www.magentheme.com
 * @copyright (C) 2011- MagenTheme.Com
 * @license PHP files are GNU/GPL
*******************************************************/
?>
<?php
class MagenThemes_Mtslideshow_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function jsonEncode($valueToEncode, $cycleCheck = false, $options = array())
    {
        $json = Zend_Json::encode($valueToEncode, $cycleCheck, $options);
        /* @var $inline Mage_Core_Model_Translate_Inline */
        $inline = Mage::getSingleton('core/translate_inline');
        if ($inline->isAllowed()) {
            $inline->setIsJson(true);
            $inline->processResponseBody($json);
            $inline->setIsJson(false);
        }

        return $json;
    }
    /*
     * @return boolean : Module is enable or not
     * 
     */
    public function isActive() {
        return Mage::getStoreConfig('mtslideshow/mtslideshow_config/enabled');
    } 
    public function getSpeedShow() {
        return Mage::getStoreConfig('mtslideshow/mtslideshow_config/speed_show');
    }
    public function getWidthThumbnail() {
        return Mage::getStoreConfig('mtslideshow/mtslideshow_config/width_thumbnail');
    }
    public function getHeightThumbnail() {
        return Mage::getStoreConfig('mtslideshow/mtslideshow_config/height_thumbnail');
    }
    public function getEffectDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/effect_default');
    }
    public function getSlicesDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/slices_default');
    }
    public function getBoxColsDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/box_cols_default');
    }
    public function getBoxRowsDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/box_rows_default');
    }
    public function getAnimSpeedDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/anim_speed_default');
    }
    public function getPauseTimeDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/pause_time_default');
    }
    public function getStartSlideDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/start_slide_default');
    }
    public function isDirectionNavDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/direction_nav_default');
    }
    public function isDirectionNavHideDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/direction_nav_hide_default');
    }
    public function isControlNavDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/control_nav_default');
    }
    public function isControlNavWidthDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/control_nav_width');
    }
    public function isControlItemNavHeightDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/control_item_nav_height');
    }
    public function isControlItemNavDisplayDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/control_item_nav_display');
    }
    public function isControlNavThumbsDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/control_nav_thumbs_default');
    }
    public function isControlNavThumbsFromRelDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/control_nav_thumbs_from_rel_default');
    }    
    public function isKeyboardNavDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/keyboard_nav_default');
    }
    public function isPauseOnHoverDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/pause_on_hover_default');
    }
    public function isManualAdvanceDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/manual_advance_default');
    }
    public function getCaptionOpacityDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/caption_opacity_default');
    }
    public function getPrevTextDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/prev_text_default');
    }
    public function getNextTextDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/next_text_default');
    }
    public function isRandomStartDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/random_start_default');
    }
    public function getAnimSpeedMTscroll() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/anim_speed_mtscroll');
    }
    public function getPauseTimeMTscroll() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/pause_time_mtscroll');
    }
    public function isAutoplayDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/autoplay_default');
    }
    public function isOsStartSlideDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/os_start_slide');
    }
    public function isOsAutoplayDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/os_auto');
    }
    public function isOsPagenavDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/e_pagenav');
    }
    public function isOsScrollbarDefault() {
        return Mage::getStoreConfig('mtslideshow/slider_settings/e_scrollbar');
    }
}
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
class MagenThemes_Mtslideshow_Model_Config_Mode
{
    private $_modes = array(
                'default'  => 'magenthemes/mtslideshow/default.phtml',
                'mtscroll'  => 'magenthemes/mtslideshow/mtscroll.phtml',
                'mtosslider'  => 'magenthemes/mtslideshow/mtosslider.phtml' 
            );
    
    public function toOptionArray()
    {
        return array(
            array('value'=>'default', 'label'=>Mage::helper('adminhtml')->__('default')),
            array('value'=>'mtscroll', 'label'=>Mage::helper('adminhtml')->__('MT Scroll')),
            array('value'=>'mtosslider', 'label'=>Mage::helper('adminhtml')->__('MT OsSlide')) 
        );
    }
    
    public function getTemplate($type) {
        foreach($this->_modes as $mode => $template) {
            if($mode == $type) {
                return $template;
            }
        }
        return null;
    }
    
}

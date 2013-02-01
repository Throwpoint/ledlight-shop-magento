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
class MagenThemes_Mtslideshow_Model_Config_Effect
{    
    
    public function toOptionArray()
    {
        return array(
            array('value'=>'random', 'label'=>Mage::helper('adminhtml')->__('random')),
            array('value'=>'sliceDown', 'label'=>Mage::helper('adminhtml')->__('sliceDown')),
            array('value'=>'sliceDownLeft', 'label'=>Mage::helper('adminhtml')->__('sliceDownLeft')),
            array('value'=>'sliceUp', 'label'=>Mage::helper('adminhtml')->__('sliceUp')),
            array('value'=>'sliceUpLeft', 'label'=>Mage::helper('adminhtml')->__('sliceUpLeft')),
            array('value'=>'sliceUpDown', 'label'=>Mage::helper('adminhtml')->__('sliceUpDown')),
            array('value'=>'sliceUpDownLeft', 'label'=>Mage::helper('adminhtml')->__('sliceUpDownLeft')),
            array('value'=>'slideInRight', 'label'=>Mage::helper('adminhtml')->__('slideInRight')),
            array('value'=>'slideInLeft', 'label'=>Mage::helper('adminhtml')->__('slideInLeft')),
            array('value'=>'fold', 'label'=>Mage::helper('adminhtml')->__('fold')),
            array('value'=>'fade', 'label'=>Mage::helper('adminhtml')->__('fade')),
            array('value'=>'boxRandom', 'label'=>Mage::helper('adminhtml')->__('boxRandom')),
            array('value'=>'boxRain', 'label'=>Mage::helper('adminhtml')->__('boxRain')),
            array('value'=>'boxRainReverse', 'label'=>Mage::helper('adminhtml')->__('boxRainReverse')),
            array('value'=>'boxRainGrow', 'label'=>Mage::helper('adminhtml')->__('boxRainGrow')),
            array('value'=>'boxRainGrowReverse', 'label'=>Mage::helper('adminhtml')->__('boxRainGrowReverse'))            
        );
    }
    
}
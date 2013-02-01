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
class MagenThemes_Mtslideshow_Block_Mtslideshow extends Mage_Core_Block_Template
{
	private $_slide = null;
	private $_col = null;
	
	public function setSlideShow(MagenThemes_Mtslideshow_Model_Mtslideshow $object) {
	    $this->_slide = $object;
	    return $this;
	}
	
	public function setColLayout($col) {
	    $this->_col = $col;
	    return $this;
	}
	
	public function getDataSlide() {
	    return $this->_slide;
	}
	
	public function getColLayout() {
	    return $this->_col;
	}
}
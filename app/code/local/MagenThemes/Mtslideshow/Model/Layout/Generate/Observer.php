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
class MagenThemes_Mtslideshow_Model_Layout_Generate_Observer
{
    public function addJsCss(Varien_Event_Observer $observer) {
        $layout = Mage::getSingleton('core/layout');
        $headBlock = $observer->getLayout()->getBlock('head');
        if(Mage::helper('mtslideshow')->isActive()) {
            if(Mage::app()->getFrontController()->getRequest()->getRouteName() == 'cms') {
                $pageId = Mage::getBlockSingleton('cms/page')->getPage()->getPageId();              
                $pages = Mage::getModel('mtslideshow/page')->getCollection();
                foreach($pages as $page) {
                    if($pageId == $page->getPageId()) {
						$slide = Mage::getModel('mtslideshow/mtslideshow')->load($page->getSlideId());
                        $headBlock->addCss('magenthemes/css/mtslideshow/nivo-slider.css');
						if($slide->getStyle()=='default'){
							$headBlock->addCss('magenthemes/css/mtslideshow/themes/default/default.css');                        
						}else if($slide->getStyle()=='mtscroll'){
							$headBlock->addCss('magenthemes/css/mtslideshow/themes/mtscroll/mtscroll.css');
						}else if($slide->getStyle()=='mtosslider'){
							$headBlock->addCss('magenthemes/css/mtslideshow/themes/mtosslide/mtosslide.css');
						}  
						$headBlock->addJs('magenthemes/mtslideshow/jquery/1.7.1/jquery.min.js');
                        $headBlock->addJs('magenthemes/mtslideshow/noConflict.js');
                        $headBlock->addJs('magenthemes/mtslideshow/jquery.easing-1.3.js'); 
						if($slide->getStyle()=='default'){
							$headBlock->addJs('magenthemes/mtslideshow/nivo-slider/jquery.nivo.slider.js'); 
						}else if($slide->getStyle()=='mtscroll'){ 
							$headBlock->addJs('magenthemes/mtslideshow/jquery.mtscroll.js');  
						}else if($slide->getStyle()=='mtosslider'){ 
							$headBlock->addJs('magenthemes/mtslideshow/jquery.iosslider.js');  
						}  
                    }                    
                }
            }
            if(Mage::app()->getFrontController()->getRequest()->getRouteName() == 'catalog') {                
				$layer = Mage::getSingleton('catalog/layer');
				$category = $layer->getCurrentCategory();
				$currentCategoryId= $category->getId();
                $categories = Mage::getModel('mtslideshow/category')->getCollection();
                foreach($categories as $category) {                    
                    if($currentCategoryId == $category->getCategoryId()) {
						$slide = Mage::getModel('mtslideshow/mtslideshow')->load($category->getSlideId());
                        $headBlock->addCss('magenthemes/css/mtslideshow/nivo-slider.css');
						if($slide->getStyle()=='default'){ 
							$headBlock->addCss('magenthemes/css/mtslideshow/themes/default/default.css');                       
						}else if($slide->getStyle()=='mtscroll'){
							$headBlock->addCss('magenthemes/css/mtslideshow/themes/mtscroll/mtscroll.css');
						}else if($slide->getStyle()=='mtosslider'){
							$headBlock->addCss('magenthemes/css/mtslideshow/themes/mtosslide/mtosslide.css');
						} 
                        $headBlock->addJs('magenthemes/mtslideshow/jquery/1.7.1/jquery.min.js');
                        $headBlock->addJs('magenthemes/mtslideshow/noConflict.js');  
						if($slide->getStyle()=='default'){
							$headBlock->addJs('magenthemes/mtslideshow/nivo-slider/jquery.nivo.slider.js'); 
						}else if($slide->getStyle()=='mtscroll'){ 
							$headBlock->addJs('magenthemes/mtslideshow/jquery.mtscroll.js');  
						}else if($slide->getStyle()=='mtosslider'){ 
							$headBlock->addJs('magenthemes/mtslideshow/jquery.iosslider.js');  
						}   
                    }                    
                }
            }            
        }        
    }
}
<?php  

/*------------------------------------------------------------------------
 # APL Solutions and Vision Co., LTD
# ------------------------------------------------------------------------
# Copyright (C) 2008-2010 APL Solutions and Vision Co., LTD. All Rights

Reserved.
# @license - Copyrighted Commercial Software
# Author: APL Solutions and Vision Co., LTD
# Websites: http://www.joomlavision.com/ - http://www.magentheme.com/
-------------------------------------------------------------------------*/

class MagenThemes_MTLaniusAdmin_productController extends Mage_Core_Controller_Front_Action { 
	protected function _initProduct()
	{
		Mage::dispatchEvent('catalog_controller_product_init_before', array('controller_action'=>$this));
		$categoryId = (int) $this->getRequest()->getParam('category', false);
		$productId  = (int) $this->getRequest()->getParam('id'); 
		$product = Mage::getModel('catalog/product')
		->setStoreId(Mage::app()->getStore()->getId())
		->load($productId);  
		if (!Mage::helper('catalog/product')->canShow($product)) {
			return false;
		}
		if (!in_array(Mage::app()->getStore()->getWebsiteId(), $product->getWebsiteIds())) {
			return false;
		} 
		Mage::register('current_product', $product);
		Mage::register('product', $product);
	
		try {
			Mage::dispatchEvent('catalog_controller_product_init', array('product'=>$product));
			Mage::dispatchEvent('catalog_controller_product_init_after', array('product'=>$product, 'controller_action' => $this));
		} catch (Mage_Core_Exception $e) {
			Mage::logException($e);
			return false;
		}
	
		return $product;
	}
	protected function _initProductLayout($product)
	{
		$update = $this->getLayout()->getUpdate();
		$update->addHandle('default');
	
	
		$update->addHandle('PRODUCT_TYPE_'.$product->getTypeId());
		$update->addHandle('PRODUCT_'.$product->getId());
	
		$this->addActionLayoutHandles();
	
		$this->loadLayoutUpdates();
	
		$update->addUpdate($product->getCustomLayoutUpdate()); 
		$update->merge(strtolower($this->getFullActionName()).'_view');
	
		$this->generateLayoutXml()->generateLayoutBlocks();
		$this->getFullActionName(); 
		return $this;
	}
	public function quicklookAction() { 
		if ($product = $this->_initProduct()) {
			Mage::dispatchEvent('catalog_controller_product_view', array('product'=>$product));
			
			if ($this->getRequest()->getParam('options')) {
				$notice = $product->getTypeInstance(true)->getSpecifyOptionMessage();
				Mage::getSingleton('catalog/session')->addNotice($notice);
			}
			
			Mage::getSingleton('catalog/session')->setLastViewedProductId($product->getId());
			Mage::getModel('catalog/design')->applyDesign($product, Mage_Catalog_Model_Design::APPLY_FOR_PRODUCT);
			
			$this->_initProductLayout($product);
			$this->_initLayoutMessages('catalog/session');
			$this->_initLayoutMessages('tag/session');
			$this->_initLayoutMessages('checkout/session');
			$this->renderLayout();
			 
		} else {
			echo Mage::helper('catalog')->__('Product not found');
		}
	}
}


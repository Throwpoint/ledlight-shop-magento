<?php
class Ledlight_Inventory_StockController extends Mage_Core_Controller_Front_Action
{
	public function getstockAction(){
		if($this->getRequest()->isPost()){
			$int1 = $this->getRequest()->getPost('int1');
			$int2 = $this->getRequest()->getPost('int2');
			$result = $int1 * $int2;
			Mage::getSingleton('customer/session')->addSuccess("$int1 * $int2 = $result");
		}
		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->renderLayout();
	}
	
	public function getDocumentStockAction(){
		if ($this->getRequest()->isPost()) {
			$product = Mage::getModel('catalog/product');
			$productId = $product->getIdBySku($this->getRequest()->getParams()['doc']);
		  if ($productId) {
		      $product->load($productId);
		  }
			$avCheck = (int) $product->availability_check;
			$avCheck++;
			$product->setavailability_check($avCheck);
			$product->getResource()->saveAttribute($product, 'availability_check');
		
			$json = '{"response":"Disponibil in 15 zile lucratoare de la lansarea comenzii."}';
			$this->getResponse()->setHeader('Content-type', 'application/json');
	    $this->getResponse()->setBody($json);
	  }
	}
}
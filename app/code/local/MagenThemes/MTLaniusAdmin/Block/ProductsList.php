<?php
/*------------------------------------------------------------------------
# APL Solutions and Vision Co., LTD
# ------------------------------------------------------------------------
# Copyright (C) 2008-2012 APL Solutions and Vision Co., LTD. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: APL Solutions and Vision Co., LTD
# Websites: http://www.joomlavision.com/ - http://www.magentheme.com/
-------------------------------------------------------------------------*/ 
class MagenThemes_MTLaniusAdmin_Block_ProductsList extends Mage_Catalog_Block_Product_Abstract
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
	public function getMtProducts()     
	{ 
        if (!$this->hasData('mtproductslist')) {
            $this->setData('mtproductslist', Mage::registry('mtproductslist'));
        }
        return $this->getData('mtproductslist');
        
    }
	public function getListCategory(){
		$storeId    = Mage::app()->getStore()->getId(); 
		$cateids = $this->getConfig('catsid'); 
		$arrCat = explode(',', $cateids); 
		$category = Mage::getModel('catalog/category')
					->getCollection() 
					->addAttributeToSelect('*')
					->addFieldToFilter('entity_id', array('in' => $arrCat)); 
		return $category;
	}
    public function getListProducts()
    {
    	$products = null;
    	$mode=$this->getConfig('mode');
		switch ($mode) {
			case 'latest' :
				$products = $this->getListLatestProducts();
				break;
			case 'bestseller' : 
				$products = $this->getListBestSellerProducts();
				break;
			case 'mostviewed' :
				$products = $this->getListMostViewedProducts();
				break;
			case 'featured' :
				$products = $this->getListFeaturedProducts();
				break;
			case 'new' :
				$products = $this->getListNewProducts();
				break;
		}
		
		return $products;
    }
    public function getListLatestProducts($fieldorder = 'updated_at', $order = 'desc')
    {
    	$storeId    = Mage::app()->getStore()->getId();
		$cateids = $this->getConfig('catsid');
		$productids = array();
    	if($cateids != null)
    	{
			foreach($this->getListCategory() as $cat){
				$arr_productids = $this->getProductByCategory($cat->getId()); 
				$productids = array_merge($productids, $arr_productids);
			}
    		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->addIdFilter($productids)// id product
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder ($fieldorder,$order) //latest product
            ;	
    	}
    	else 
    	{
        	$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder ($fieldorder,$order) //latest product
            ;      
    	}		
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products); 
        $this->setProductCollection($products); 
    }
	public function getListBestSellerProducts($fieldorder = 'ordered_qty', $order = 'desc')
    {
    	$storeId    = Mage::app()->getStore()->getId(); 
    	$cateids = $this->getConfig('catsid');
		$productids = array();
    	if($cateids != null)
    	{
			foreach($this->getListCategory() as $cat){
				$arr_productids = $this->getProductByCategory($cat->getId());
				$productids = array_merge($productids, $arr_productids);
			}
    		$products = Mage::getResourceModel('reports/product_collection')
    		->addOrderedQty()
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->addIdFilter($productids)// id product
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder ($fieldorder,$order) //latest product
            ;
    	}
    	else 
    	{
    		$products = Mage::getResourceModel('reports/product_collection')
    		->addOrderedQty()
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder ($fieldorder,$order) //latest product
            ;
    	}
    			
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        //$products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products); 
    }
	public function getListMostViewedProducts()
    {
    	$storeId    = Mage::app()->getStore()->getId(); 
    	$cateids = $this->getConfig('catsid');
		$productids = array();
    	if($cateids != null)
    	{
			foreach($this->getListCategory() as $cat){
				$arr_productids = $this->getProductByCategory($cat->getId());
				$productids = array_merge($productids, $arr_productids);
			} 
    		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes            
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addViewsCount()
            ->addIdFilter($productids)// id product
            ;
    	}
    	else 
    	{
    		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addViewsCount()
            ;
    	}
    			
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        //$products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products); 
    }
	public function getListFeaturedProducts()
    {
    	$storeId    = Mage::app()->getStore()->getId(); 
    	$cateids = $this->getConfig('catsid');
		$productids = array();
    	if($cateids != null)
    	{
			foreach($this->getListCategory() as $cat){
				$arr_productids = $this->getProductByCategory($cat->getId());
				$productids = array_merge($productids, $arr_productids);
			} 
   			$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->addIdFilter($productids)// id product
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addAttributeToFilter("featured", 1);
            ;		
    	}
    	else 
    	{
    		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addAttributeToFilter("featured", 1);
            ;		
    	}
    	
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        //$products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products); 
    }
	public function getListNewProducts()
    {
    	$todayDate  = Mage::app()->getLocale()->date()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);
    	$storeId    = Mage::app()->getStore()->getId(); 
    	$cateids = $this->getConfig('catsid');
		$productids = array();
    	if($cateids != null)
    	{
			foreach($this->getListCategory() as $cat){
				$arr_productids = $this->getProductByCategory($cat->getId());
				$productids = array_merge($productids, $arr_productids);
			} 
    		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->addIdFilter($productids)// id product
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addAttributeToFilter('news_from_date', array('date'=>true, 'to'=> $todayDate))
			->addAttributeToFilter(array(array('attribute'=>'news_to_date', 'date'=>true, 'from'=>$todayDate), array('attribute'=>'news_to_date', 'is' => new Zend_Db_Expr('null'))),'','left')
			->addAttributeToSort('news_from_date','desc')
            
            ;
    	}
    	else 
    	{
    		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addAttributeToFilter('news_from_date', array('date'=>true, 'to'=> $todayDate))
			->addAttributeToFilter(array(array('attribute'=>'news_to_date', 'date'=>true, 'from'=>$todayDate), array('attribute'=>'news_to_date', 'is' => new Zend_Db_Expr('null'))),'','left')
			->addAttributeToSort('news_from_date','desc')
            
            ;
    	}
    			
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        //$products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products); 
    }
	public function getPro()
	{
        $storeId    = Mage::app()->getStore()->getId();
        // get array product_id
        $arr_productids = $this->getProductByCategory();   //id product

        $products = Mage::getResourceModel('reports/product_collection')
            //->addOrderedQty()
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addIdFilter($arr_productids)// id product
            //->setOrder ('updated_at','desc') //latest product
            //->addAttributeToFilter("featured", 1); //feature product
           //->addViewsCount()// most viewed
			//->setOrder('ordered_qty', 'desc'); //best sellers on top
            ;
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);

        $products->setPageSize($this->getConfig('qty'))->setCurPage(1);

        $this->setProductCollection($products);
    }
	function inArray($source, $target) {
		for($i = 0; $i < sizeof ( $source ); $i ++) {
			if (in_array ( $source [$i], $target )) {
				return true;
			}
		}
	}
	function getProductByCategory($catsid){
		$mode=$this->getConfig('mode');
		$storeId    = Mage::app()->getStore()->getId();
        $return = array(); 
        $pids = array(); 
		switch ($mode) {
			case 'latest' :
				$fieldorder = 'updated_at';
				$order = 'desc';
				break;
			case 'bestseller' : 
				$fieldorder = 'ordered_qty';
				$order = 'desc';
				break; 
		}
		$category = Mage::getModel('catalog/category')->load($catsid);
        $category->setIsAnchor(1);
        $products = Mage::getResourceModel ( 'catalog/product_collection' ) 
					->setStoreId($storeId)
					->addStoreFilter($storeId)
					->addCategoryFilter($category);
		if($mode=="mostviewed"){
			$products->addViewsCount();
		}
		if($mode=="featured"){
			$products->addAttributeToFilter("featured", 1);
		}
		if($mode=="new"){
			$todayDate  = Mage::app()->getLocale()->date()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);
			$products->addAttributeToFilter('news_from_date', array('date'=>true, 'to'=> $todayDate))
					 ->addAttributeToFilter(array(array('attribute'=>'news_to_date', 'date'=>true, 'from'=>$todayDate), array('attribute'=>'news_to_date', 'is' => new Zend_Db_Expr('null'))),'','left')
					 ->addAttributeToSort('news_from_date','desc');
		}
		if($mode=="latest" || $mode=="bestseller"){
			$products->setOrder ($fieldorder,$order);
		}
		$products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        foreach ($products->getItems() as $key => $_product){
            $arr_categoryids[$key] = $_product->getCategoryIds(); 
            if($catsid){    
                if(stristr($catsid, ',') === FALSE) {
                    $arr_catsid[$key] =  array(0 => $catsid);
                }else{
                    $arr_catsid[$key] = explode(",", $catsid);
                }
                
                $return[$key] = $this->inArray($arr_catsid[$key], $arr_categoryids[$key]);
            }
        }
        foreach ($return as $k => $v){ 
            if($v==1) $pids[] = $k;
        }    
        
        return $pids;   
    }
	public function getConfig($att) 
	{
		$config = Mage::getStoreConfig('mtlaniusadmin');
		if (isset($config['productslist']) ) {
			$value = $config['productslist'][$att];
			return $value;
		} else {
			throw new Exception($att.' value not set');
		}
	}
}
	
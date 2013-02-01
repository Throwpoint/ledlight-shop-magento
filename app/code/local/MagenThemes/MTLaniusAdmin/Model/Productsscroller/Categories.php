<?php
/*------------------------------------------------------------------------
# APL Solutions and Vision Co., LTD
# ------------------------------------------------------------------------
# Copyright (C) 2008-2010 APL Solutions and Vision Co., LTD. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: APL Solutions and Vision Co., LTD
# Websites: http://www.joomlavision.com/ - http://www.magentheme.com/
-------------------------------------------------------------------------*/ 
class MagenThemes_MTLaniusAdmin_Model_Productsscroller_Categories
{
    public function toOptionArray()
    {
		$_categories = Mage::getModel('catalog/category')
                    ->getCollection()
                    ->addFieldToFilter('entity_id' , array('gt' => '3'))
                    ->addAttributeToSelect('name');
		$arr = array();
		if (count($_categories) > 0):
			foreach($_categories as $_category):
				$arr[] = array('value'=>$_category->getId(), 'label'=>$_category->getName());								
			endforeach; 
		endif;
		return $arr;
	}
	public function getStoreCategories($sorted=false, $asCollection=false, $toLoad=true)
    {
        $parent     = Mage::app()->getStore()->getRootCategoryId();
        $cacheKey   = sprintf('%d-%d-%d-%d', $parent, $sorted, $asCollection, $toLoad);
        if (isset($this->_storeCategories[$cacheKey])) {
            return $this->_storeCategories[$cacheKey];
        }
        $category = Mage::getModel('catalog/category');
        $recursionLevel  = max(0, (int) Mage::app()->getStore()->getConfig('catalog/navigation/max_depth'));
        $storeCategories = $category->getCategories($parent, $recursionLevel, $sorted, $asCollection, $toLoad);
        $this->_storeCategories[$cacheKey] = $storeCategories;
        return $storeCategories;
    }
}

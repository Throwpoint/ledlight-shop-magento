<?php
class MagenThemes_MTLaniusAdmin_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getListPattern($path){ 
		$directory = Mage::getSingleton('core/design_package')->getSkinBaseDir().DS.'images'.DS.$path;
		$urlparth = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
		$images = array();
		if (is_dir($directory) && $dh = opendir($directory)) { 
			while (($file = readdir($dh)) !== false) {
				if(is_file($directory.DS.$file)){
					$filetype = substr($file, -3, 3);
					switch ($filetype)
					{ 
						case 'jpg':
						case 'png':
						case 'gif':  
							$images[] = $file; 
							break; 
					}
				} 
			}  
		} 
		return $images;
	}
}
<?php
class MagenThemes_MTLaniusAdmin_Block_Adminhtml_System_Config_Form_Field_Mainpatternlist extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element){ 
       	$html = parent::_getElementHtml($element);
		$directry = Mage::getBaseDir('skin').DS.'frontend'.DS.'default'.DS.'mt_lanius'.DS.'images'.DS.'pattern_main'; 
		$urlparth = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
		$images = array();
		if (is_dir($directry)) {
			if ($dh = opendir($directry)) { 
				while (($file = readdir($dh)) !== false) {
					if(is_file($directry.DS.$file)){
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
		} 
		$html .='<div class="listpattern '.$element->getHtmlId().'_pattern">';
			$html .='<span class="item">
						<span class="ptnone">None</span>
						<input type="radio" name="pattern_main" value="none" style="margin-top: 7px;"/>
					 </span>';
			if($images){
				foreach ($images as $img){
			$html .='<span class="item">
						<img src="'.$urlparth.'/skin/frontend/default/mt_lanius/images/pattern_main/'.$img.'" />
						<input type="radio" name="pattern_main" value="'.$img.'" class="valptmain"/>
					 </span>';
				}
			}
		$html .='</div>';
		$html .= ' 
		
				
				<script type="text/javascript">
					$mtkb(window).load(function(){  
						$mtkb(".'.$element->getHtmlId().'_pattern input[type=radio]").click(function(){ 
							$mtkb("#'.$element->getHtmlId().'").val($mtkb(this).val())
						}); 
						patternMainActive();
					});
					function patternMainActive(){
						var ptnmain =$mtkb("#'.$element->getHtmlId().'").val();
						$mtkb(".'.$element->getHtmlId().'_pattern input[type=radio]").each(function(i,rad){
							if(rad.value==ptnmain){  
								$mtkb(rad).attr("checked", true); 
							}   
						});
					}
				</script> 
			';
        return $html;
    }
}
?>
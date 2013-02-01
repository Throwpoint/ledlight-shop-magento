<?php
class MagenThemes_MTLaniusAdmin_Block_Adminhtml_System_Config_Form_Field_ThemeStyles extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element){ 
       	$html = parent::_getElementHtml($element);  
       	$config = Mage::getStoreConfig('mtlaniusadmin/mtlaniusadmin_appearance');
       	$bg_color = isset($config['bg_color']) ? $config['bg_color'] :''; 
       	$text_color = isset($config['text_color']) ? $config['text_color'] :'';
       	$link_color = isset($config['link_color']) ? $config['link_color'] :'';
        $pattern_body_select = isset($config['pattern_body_select']) ? $config['pattern_body_select'] :'';
		$pattern_main_select = isset($config['pattern_main_select']) ? $config['pattern_main_select'] :'';
		
		$header_bg_color = isset($config['header_bg_color']) ? $config['header_bg_color'] :'';
       	$header_text_color = isset($config['header_text_color']) ? $config['header_text_color'] :'';
       	$header_link_color = isset($config['header_link_color']) ? $config['header_link_color'] :'';
		
       	$mainmenu_bg_color = isset($config['mainmenu_bg_color']) ? $config['mainmenu_bg_color'] :'';
       	$mainmenu_text_color = isset($config['mainmenu_text_color']) ? $config['mainmenu_text_color'] :'';
       	$mainmenu_link_color = isset($config['mainmenu_link_color']) ? $config['mainmenu_link_color'] :'';
       	$footer_static_bg_color = isset($_COOKIE['footer_static_bg_color']) ? $_COOKIE['footer_static_bg_color'] : $config['footer_static_bg_color']; 
		$footer_static_text_color = isset($_COOKIE['footer_static_text_color']) ? $_COOKIE['footer_static_text_color'] :$config['footer_static_text_color']; 
		$footer_static_link_color = isset($_COOKIE['footer_static_link_color']) ? $_COOKIE['footer_static_link_color'] :$config['footer_static_link_color'];
       	$html .='
       		<script type="text/javascript" src="'.$this->getJsUrl('magenthemes/mt_lanius/js/jquery-1.8.2.min.js').'"></script>
       		<script type="text/javascript" src="'.$this->getJsUrl('magenthemes/mt_lanius/js/mColorPicker.js').'"></script>
			<link href="'.$this->getJsUrl('magenthemes/mt_lanius/css/adminstyle.css').'" type="text/css" rel="stylesheet">
            <style>
                    #mColorPickerImg{background-image: url("'.$this->getJsUrl('magenthemes/mt_lanius/images/').'picker.png") !important;}
				    div.listpattern{float:left;overflow: hidden;}
					div.listpattern span.item {overflow:hidden; width: 50px; float:left; text-align: center; margin:0 6px 6px 0px;}
					div.listpattern span.item img{width: 50px; height: 50px;}
					div.listpattern span.item .ptnone {background: #fff; width: 50px; height: 50px; display:block;line-height:50px;color:#999;}
					span.delete-image{display:none;}
					#row_mtlaniusadmin_mtlaniusadmin_appearance_pattern_upload_body a {display:none}
					#mtlaniusadmin_mtlaniusadmin_appearance_pattern_body_select {display:none;}
					#row_mtlaniusadmin_mtlaniusadmin_appearance_pattern_upload_header a {display:none}
					#mtlaniusadmin_mtlaniusadmin_appearance_pattern_header_select {display:none;}
					#row_mtpetshopadmin_mtlaniusadmin_appearance_pattern_main a {display:none}
					#mtpetshopadmin_mtlaniusadmin_appearance_pattern_main_select {display:none;}
					#row_mtlaniusadmin_mtlaniusadmin_appearance_pattern_upload_footer a {display:none}
					#mtlaniusadmin_mtlaniusadmin_appearance_pattern_footer_select {display:none;}
					
			</style>
			<script type="text/javascript"> 
       				$mtkb(document).ready(function($) { 
       					$mtkb.fn.mColorPicker.defaults.currentId=false;
		            	$mtkb.fn.mColorPicker.defaults.currentInput = false;
		            	$mtkb.fn.mColorPicker.defaults.currentColor = false;
		            	$mtkb.fn.mColorPicker.defaults.changeColor = false;
		            	$mtkb.fn.mColorPicker.init.showLogo = false;
		            	$mtkb.fn.mColorPicker.defaults.color = true;
		            	$mtkb.fn.mColorPicker.defaults.imageFolder = "'.$this->getJsUrl('magenthemes/mt_lanius/images/').'"; 
       					var value = "'.$config['theme_styles'].'"; 
    					var styles = {
						    
							blue : {
									bg_color: "#ffffff", 
									text_color: "#333333",
									pattern_body_select: "pattern_1.png",
									pattern_main_select: "pattern_1.png",
									link_color: "#2F2F2F", 
									header_bg_color: "#ffffff", 
									header_text_color: "#ffffff",
									header_link_color: "#ffffff",
									
								},
							
							
							custom : {
								bg_color: "'.$bg_color.'", 
								pattern_body_select: "'.$pattern_body_select.'",
								pattern_main_select: "'.$pattern_main_select.'",
								text_color: "'.$text_color.'",
								link_color: "'.$link_color.'",
								header_bg_color: "'.$header_bg_color.'",
								header_text_color: "'.$header_text_color.'",
								header_link_color: "'.$header_link_color.'",
								

							
							} 
						} 
       					changeStyle(value,styles);
       					$mtkb("#'.$element->getHtmlId().'").bind("change", function() {  
       						value = $mtkb("#'.$element->getHtmlId().'").val(); 
       						changeStyle(value,styles); 
						}); 
       					function changeStyle(apper,styles){ 
       						if(apper=="blue"){
    							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_bg_color").attr("readonly","");
								$mtkb(".valpt").attr("disabled","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_text_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_link_color").attr("readonly",""); 
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_header_bg_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_header_text_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_header_link_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_bg_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_text_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_link_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_footer_static_bg_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_footer_static_text_color").attr("readonly","");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_footer_static_link_color").attr("readonly","");
       							 
    						}else{
							    $mtkb(".valpt").removeAttr("disabled");
    							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_bg_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_text_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_link_color").removeAttr("readonly"); 
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_header_bg_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_header_text_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_header_link_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_bg_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_text_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_link_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_footer_static_bg_color").removeAttr("readonly"); 
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_footer_static_text_color").removeAttr("readonly");
       							$mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_footer_static_link_color").removeAttr("readonly"); 
    						} 
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_bg_color", styles[apper]["bg_color"]);
						    $mtkb("#mtlaniusadmin_mtlaniusadmin_appearance_pattern_body_select").val(styles[apper]["pattern_body_select"]); 
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_text_color", styles[apper]["text_color"]); 
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_link_color", styles[apper]["link_color"]);	 
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_header_bg_color", styles[apper]["header_bg_color"]);
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_header_text_color", styles[apper]["header_text_color"]); 
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_header_link_color", styles[apper]["header_link_color"]);  
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_bg_color", styles[apper]["mainmenu_bg_color"]);
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_text_color", styles[apper]["mainmenu_text_color"]); 
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_mainmenu_link_color", styles[apper]["mainmenu_link_color"]);
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_footer_static_bg_color", styles[apper]["footer_static_bg_color"]);
       						$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_footer_static_text_color", styles[apper]["footer_static_text_color"]);  
							$mtkb.fn.mColorPicker.setInputColor("mtlaniusadmin_mtlaniusadmin_appearance_footer_static_link_color", styles[apper]["footer_static_link_color"]); 
    						patternBodyActive();
							patternMainActive();
    					 }
    				});
       				
            </script>
       	'; 
        return $html;
    }
}
?>
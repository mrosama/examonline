<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Styles {



 public function getStyle()
    {

 
	$CI1 =& get_instance(); 
	
	$lang= $CI1->session->userdata('lang');
	$lang=($lang)? $CI1->session->userdata('lang'):'ar';

 switch($lang){
 case "ar":
     $CI1->lang->load('front', 'arabic');
	$style="default";
 break;
  case "en":
     $CI1->lang->load('front', 'english');
	$style="style2";
 break;
 
 
 }
 
 return $style;
 
	
    }
	
	
	
}

/* End of file Someclass.php */
?>
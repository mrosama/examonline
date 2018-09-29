<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');






if ( ! function_exists('Jimage'))
{




function Jimage($Params){

$CI =& get_instance(); 

$CI->load->helper('url');


$newimg=str_replace('./',base_url(),$Params);

return $newimg;




}
















}





?>
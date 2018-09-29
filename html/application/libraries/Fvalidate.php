<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fvalidate {



public function Fvalid($type,$msg){

$CI =& get_instance(); 

$CI->form_validation->set_message($type, $msg);


}







}
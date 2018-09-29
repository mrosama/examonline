<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Configer {



public function getConfiger(){

$CI =& get_instance(); 
$query  = $CI->db->get('cm_setting');
$row = $query->row_array();
return $row;




}
















}












?>
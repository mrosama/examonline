<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MX_Controller {



public function index(){
$data['conten_page']="member/index";

$this->load->model('member_model');

if($this->input->post('IsPost')=="delete"){
$this->member_model->delMember();
}


$id=$this->uri->segment(6);
switch($this->uri->segment(5)){
case "activeY":
$this->db->query("update `cm_member` set `active`='YES' where `ID`='$id' ");
break;
case "activeN":
$this->db->query("update `cm_member` set `active`='NO' where `ID`='$id' ");
break;
}


$member=$this->member_model->listmember();

$data=array_merge($data,$member);

 
$this->load->view('layouts/layout',$data);

}








public function preview(){
$id=$this->uri->segment(5);
$member=$this->db->query("SELECT *
 from `cm_member` left join `countries` on cm_member.country=countries.code where `ID`='$id' ");
$data['rs']=$member->row_array();



$this->load->view('member/preview',$data);

}




























}


?>

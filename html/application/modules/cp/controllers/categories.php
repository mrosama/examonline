<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MX_Controller {





public function index(){


if ($this->uri->segment(4) =="section"){
$com_type=$this->uri->segment(5);
$data['com_type']=$com_type;
}

$this->load->model('admin_model');
if($this->uri->segment(6) =="edit"){
$id=$this->uri->segment(7);
/**/



if($this->input->post('IsPost')=='Update'){

$catname=$this->input->post('name');
$cat=$this->input->post('cat');
$com_type=$this->input->post('com_type');
$File_image=$this->input->post('file1');

///***configure cat
$len=$this->db->query("select * from `cm_cat` where `name`='".$catname."' and  `com_type`='$com_type' and `ID`!='$id' ");
if($len->num_rows()==0){
/*
if($cat=='0'){
$level='0';
}
else {
$query=$this->db->query("select * from `cm_cat`  where `ID`='$cat' ");
$inhretcat=$query->row_array();
$level=$inhretcat['level']+1;
}*/
//add
///*********
$this->load->library('Images');
if($File_image!=""){
//@$this->images->thumb($File_image,80,80);
}
 
$this->db->query("update `cm_cat` set `name`='$catname',`img`='$File_image' where `ID`='$id'   ");
//***configure image
$data['catResult']='update';




}
else {
$data['catResult']='found';

}


 
}



/**/
$cat_edit=$this->admin_model->MainCatSelect2($com_type,$this->uri->segment(7));
$data['cat_edit']=$cat_edit;


$query=$this->db->query("select * from `cm_cat` where `ID`='$id' ");
$data['rowss']=$query->row_array();








}









if($this->input->post('IsPost')=='delete'){
$del=$this->input->post('del');
$len=count($del);

for($i=0;$i<$len;$i++){
$this->db->query("delete from `cm_cat` where `ID`='$del[$i]' ");
}



}




if($this->input->post('IsPost')=='Send'){

$catname=$this->input->post('name');
$cat=$this->input->post('cat');
$com_type=$this->input->post('com_type');
$File_image=$this->input->post('file1');
///***configure cat
$len=$this->db->query("select * from `cm_cat` where `name`='".$catname."' and  `com_type`='$com_type'");
if($len->num_rows()==0){

if($cat=='0'){
$level='0';
}
else {
$query=$this->db->query("select * from `cm_cat`  where `ID`='$cat' ");
$inhretcat=$query->row_array();
$level=$inhretcat['level']+1;
}
//add
///*********
$this->load->library('Images');
if($File_image!=""){
//@$this->images->thumb($File_image,80,80);
}
$this->db->query("insert into `cm_cat` (`name`,`cat`,`level`,`com_type`,`img`) values('$catname','$cat','$level','$com_type','$File_image')");
//***configure image
$data['catResult']='add';




}
else {
$data['catResult']='found';

}






 
}

///////////////////////////////////
 
$rows=$this->db->query("select * from `cm_cat` where cat='0' and `com_type`='$com_type' ");
 $data['rows']=$rows;

////////////////////







$cat=$this->admin_model->MainCatSelect2($com_type);
$data['cat']=$cat;





$data['conten_page']="categories/index";

$this->load->view('layouts/layout',$data);
}








}



?>


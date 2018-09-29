<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends MX_Controller {



public function __construct()
{
parent::__construct();
// Your own constructor code
}


	 
	 
	 
	 
public function index()
{
$this->load->model('exam_model');
$cat=$this->exam_model->getCat();
$data['cat']=$cat;
if($this->input->post('IsPost')=='Send'){
$data['results']=$this->exam_model->saveQuestion();
}
$data['conten_page']="exam/index";
$this->load->view('layouts/layout',$data);

}


public function listquestion(){




$this->load->library('pagination');
$this->load->helper('url');





if($this->input->post('IsPost')=="delete"){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){

 $this->db->query("delete  from `cm_question` where `ID`='$del[$i]' ");
 $this->db->query("delete  from `cm_answer` where `question`='$del[$i]' ");
}
}




////////////////////////////
$page_total=$this->db->query("SELECT * from `cm_question` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$pages=$this->db->query("SELECT * from `cm_question` order by ID desc limit $start,30");
$config['base_url'] = site_url('cp/exam/listquestion');
$config['total_rows'] =$page_total->num_rows();
$config['per_page'] = 30;
$config['uri_segment'] = 4;
$config['cur_tag_open'] = '&nbsp;( <b>';
$config['cur_tag_close'] = '</b> )&nbsp;';
$config['first_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_first.gif '>";
$config['last_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_last.gif '>";
$config['next_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_right.gif '>";
$config['prev_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_left.gif '>";
$config['num_tag_open'] = '&nbsp;<span class="newinput">';
$config['num_tag_close'] = '</span>&nbsp;';
$this->pagination->initialize($config);
$pagination=$this->pagination->create_links();
$data['pages']=$pages;
$data['pagination']=$pagination;
$data['counrow']=$page_total->num_rows();


//*******************************************************




$data['conten_page']="exam/listquestion";
$this->load->view('layouts/layout',$data);
}



////////

public function edit(){
$this->load->model('admin_model');
$this->load->model('exam_model');


if($this->input->post('IsPost')=='Update'){
$data['results']=$this->exam_model->UpdateQuestion();
}




if ($this->uri->segment(4) =="id"){
$id=$this->uri->segment(5);
$query=$this->db->query("SELECT * from `cm_question` where `ID`='$id' ");

$page=$query->row_array();
///////////
$query=$this->db->query("SELECT * from `cm_answer` where `question`='$id' ");

$XR=$query->result_array();
$data['ans']=$XR;



$data['page']=$page;
$cat=@$this->admin_model->MainCatSelect('com_exam',$page['cat']);
$data['cat']=$cat;

}



$data['conten_page']="exam/edit";
$this->load->view('layouts/layout',$data);
}






public function option(){
$this->load->model('exam_model');



if($this->input->post('IsPost')=='Send'){
$data['results']=$this->exam_model->SaveOption();
}



$id=$this->uri->segment(5);
switch($this->uri->segment(4)){

case "activeY":

$this->db->query("update `cm_cat` set `active`='YES' where `ID`='$id' ");
break;

case "activeN":
$this->db->query("update `cm_cat` set `active`='NO' where `ID`='$id' ");
break;

}
/////////////////////////////////////////////////////////////

$query=$this->db->query("select * from `cm_option` ");		

$data['option']=$query->row_array();



////////////////////////////////

$cat=$this->exam_model->getCat();
$data['cat']=$cat;


$data['conten_page']="exam/option";
$this->load->view('layouts/layout',$data);

}




public function result(){






$this->load->library('pagination');
$this->load->helper('url');





if($this->input->post('IsPost')=="delete"){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){

 $this->db->query("delete  from `cm_profile` where `ID`='$del[$i]' ");
}

redirect("cp/exam/result","refresh");
}




////////////////////////////
$page_total=$this->db->query("SELECT * from `cm_profile` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$pages=$this->db->query("SELECT * from `cm_profile` order by ID desc limit $start,30");
$config['base_url'] = site_url('cp/exam/result');
$config['total_rows'] =$page_total->num_rows();
$config['per_page'] = 30;
$config['uri_segment'] = 4;
$config['cur_tag_open'] = '&nbsp;( <b>';
$config['cur_tag_close'] = '</b> )&nbsp;';
$config['first_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_first.gif '>";
$config['last_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_last.gif '>";
$config['next_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_right.gif '>";
$config['prev_link'] = "<img src='".base_url("html/application/modules/cp/views/layouts/img/partials/")."/arrow_left.gif '>";
$config['num_tag_open'] = '&nbsp;<span class="newinput">';
$config['num_tag_close'] = '</span>&nbsp;';
$this->pagination->initialize($config);
$pagination=$this->pagination->create_links();
$data['pages']=$pages;
$data['pagination']=$pagination;
$data['counrow']=$page_total->num_rows();


//*******************************************************



























$data['conten_page']="exam/result";
$this->load->view('layouts/layout',$data);
}
























































	 
	
	
}






?>
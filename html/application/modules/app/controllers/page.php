<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {


  public function __construct()
       {
            parent::__construct();
		
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
 if($Setting['cache']=='YES'){
 $this->output->cache($Setting['cache_time']);
 }
}   
	 


public function index()
{

 
if($this->uri->segment(4)=='page_no'){

$this->load->library('Xcleans');
$id=$this->xcleans->process($this->uri->segment(5));

$query=$this->db->query("select * from `cm_page` where `active`='YES' and `ID`='$id' ");
if($query->num_rows()!=0){
$data['page']=$query->row_array();
}
else {
$data['pageerror']='error';
}

}







$data['conten_page']="app/page/index";
//$this->load->view('ap/ap/index',$data); module/controller/page
//$layout=$this->styles->getStyle();
//$this->load->view("layouts/$layout/layout",$data);
$this->load->view('app/page/index',$data);
}



public function prints()
{



if($this->uri->segment(4)=='page_no'){

$this->load->library('Xcleans');
$id=$this->xcleans->process($this->uri->segment(5));

$query=$this->db->query("select * from `cm_page` where `active`='YES' and `ID`='$id' ");
if($query->num_rows()!=0){
$data['page']=$query->row_array();
}
else {
$data['pageerror']='error';
}

}



$this->load->view("app/page/print",$data);

}







public function pdf()
{



if($this->uri->segment(4)=='page_no'){

$this->load->library('Xcleans');
$id=$this->xcleans->process($this->uri->segment(5));

$query=$this->db->query("select * from `cm_page` where `active`='YES' and `ID`='$id' ");
if($query->num_rows()!=0){
$data['page']=$query->row_array();
}
else {
$data['pageerror']='error';
}

}



$this->load->view("app/page/pdf",$data);

}






public function s2f()
{
@session_start();

$data['result']="";
 $this->load->library('form_validation');
 
if($this->input->post('do')=="sendmail"){
$this->load->library('Xcleans');
$this->load->library('WebMail');
 $this->load->library('Configer');
 $conf=$this->configer->getConfiger();
if($_SESSION['verfiy']==$this->input->post('code')){

$name=$this->xcleans->process($this->input->post('title'));
$email=$this->xcleans->process($this->input->post('email'));
$message =$this->xcleans->process($this->input->post('msg'));
$linkvisti=$this->input->post('linkvisti');
$this->form_validation->set_rules('title', ' ألاسم مفقود',"required");
$this->form_validation->set_rules('email', 'البريد غير صحيح','valid_email|required');

if ($this->form_validation->run() == FALSE){
$data['result']='error';
}
else {
$message.="<br/>
صديقك  $name
<br>
يدعوك إلي زيارة الرابط
<br/>
<a href=$linkvisti>$linkvisti</a>
";
@$this->webmail->__Sendmail($email,"$name    دعوة من صديقك ",$message,false,false,false,$conf);
$data['result']='ok';

}





} else {

$data['result']="errorcode";

}






}





 
$this->load->view("app/page/s2f",$data);
}



////////////////////////////////




public function cat(){

$this->load->library('Xcleans');

$cat=$this->db->query("select * from `cm_cat` where `cat`='0' and `com_type`='com_page' ");

 

if($this->uri->segment(4)=='id'){
$id=$this->xcleans->process($this->uri->segment(5));
$cat=$this->db->query("select * from `cm_cat` where `cat`='$id' and `com_type`='com_page' ");
}


$data['maincat']=$cat;





$data['conten_page']="app/page/cat";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);

}

///////////////////////////////////////////



public function listpage(){

$this->load->library('pagination');
$this->load->helper('url');
$this->load->library('Xcleans');



if($this->uri->segment(4)=='cat'){
$cat=$this->xcleans->process($this->uri->segment(5));



////////////////////////////
$page_total=$this->db->query("SELECT * from `cm_page` where `active`='YES' and `cat`='$cat' ");

$seg=$this->uri->segment(6);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$pages=$this->db->query("SELECT * from `cm_page` where `active`='YES' and `cat`='$cat' limit $start,30");
$config['base_url'] = site_url("app/page/listpage/cat/$cat");
$config['total_rows'] =$page_total->num_rows();
$config['per_page'] = 30;
$config['uri_segment'] = 6;
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


 

}








$data['conten_page']="app/page/listpage";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
}





public function lastpage(){
//->result_array();
$query = $this->db->query("select * from `cm_page` where `active`='YES' limit 6 ");


$data['rows']=$query;
$this->load->view("app/page/lastpage",$data);
}





































}


?>
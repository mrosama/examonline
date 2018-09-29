<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MX_Controller {





public function index()
{
@session_start();



 $this->load->library('form_validation');

if($this->input->post('IsPost')=="Send"){


$this->load->library('Xcleans');

$this->load->library('WebMail');
 $this->load->library('Configer');
 $conf=$this->configer->getConfiger();


if($_SESSION['random_number']==$this->input->post('captchacode')){

$subject=$this->xcleans->process($this->input->post('title'));
$email=$this->xcleans->process($this->input->post('email'));
$message =$this->xcleans->process($this->input->post('msg'));


$this->form_validation->set_rules('title', 'عنوان الرسالة مفقود',"required");
$this->form_validation->set_rules('email', 'البريد غير صحيح','valid_email|required');
 
 
 

if ($this->form_validation->run() == FALSE){
$data['validateerror']='error';
}

else {
//***********************************
$this->db->query("insert into `cm_inbox` (`subject`,`message`,`email`,`dat`) values('$subject','$message','$email ','NOW()')");
$this->webmail->__Sendmail($conf['sitemail'],$subject,$message,false,$email,false,$conf);

$data['senddata']='ok';
//***********************************
}



}

else {
$data['errorcaptach']='error';

}






}









$data['conten_page']="app/contact/index";
/*$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
*/
$this->load->view("app/contact/index");
}
















}


 

?>

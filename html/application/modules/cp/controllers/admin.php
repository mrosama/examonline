<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {






	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	   public function __construct()
       {
            parent::__construct();
		
            // Your own constructor code


       }
	   
	 
	 
	 
	 
	 
	public function index()
	{
	
	
	
	$querys = $this->db->query("SELECT * from `cm_admin` where `online`='YES' ");
	
	
	   $data['adminonine']=$querys;
     $data['conten_page']="admin/index.php";
 ///***********************************************
 
 
 if($this->input->post('IsPost')=="true"){
 
 $popup=$this->input->post('popup');
 $popup_w=$this->input->post('popup_w');
 $popup_h=$this->input->post('popup_h');
 $popup_content=$this->input->post('popup_content');
 
 $setting=$this->db->query("SELECT * from `cm_setting`");
 
 if ($setting->num_rows() > 0){
 //update
 $this->db->query("update `cm_setting` set `popup`='$popup',`popup_w`='$popup_w',`popup_h`='$popup_h',`popup_content`='$popup_content' ");
 
 }
 else {
 //insert
  $this->db->query("insert into `cm_setting`(`popup`,`popup_w`,`popup_h`,`popup_content`) values( '$popup','$popup_w','$popup_h','$popup_content')");
 
 
 }
 }
 //////////////////////////////////
 
 
  if($this->input->post('IsPost')=="Send"){
  
   $bgsound=$this->input->post('bgsound');
 
 $bgsound_loop=$this->input->post('bgsound_loop');
 $setting=$this->db->query("SELECT * from `cm_setting`");
 $filenames=time();
$config['upload_path'] = './Media';
$config['allowed_types'] = '*';
$config['max_size']	= '4048';
$config['file_name']=$filenames;

$this->load->library('upload', $config);

if(!$this->upload->do_upload('file1')){
 
 
  
  
 $newfile=$this->input->post('old_file');
 
} else {
$file = $this->upload->data();
$newfile= $file['file_name'];

}



 
  if ($setting->num_rows() > 0){
 $this->db->query("update `cm_setting` set `bgsound`='$bgsound',`bgsound_src`='$newfile',`bgsound_loop`='$bgsound_loop' ");
  } 
  
  else {
   $this->db->query("insert into `cm_setting`(`bgsound`,`bgsound_src`,`bgsound_loop`) values( '$bgsound','$filenames','$bgsound_loop')");
  }
 
   }
 
 
 $setting=$this->db->query("SELECT * from `cm_setting`");
 
 $row = $setting->row_array();
 
 
 
 
 $data['adminsetting']=$row;
 
 
 
 
 
 

 
 
 

 
	$this->load->view('layouts/layout',$data);

	}
	
	//begin setting
	
	
	
	
	
	
public function setting()
	{
	
     $data['conten_page']="admin/setting.php";
 
 
  $data['editsetting']=false;
  if($this->input->post('IsPost')=="Send"){
  ////
  
  $sitename=$this->input->post('sitename');
  $sitemail=$this->input->post('sitemail');
  $closesite=$this->input->post('closesite');
  $msg_close=$this->input->post('msg_close');
  $keywords=$this->input->post('keywords');
  $description=$this->input->post('description');
  $Author=$this->input->post('Author');
  $welcome=$this->input->post('welcome');
  $welcome_title=$this->input->post('welcome_title');
  $welcome_msg=$this->input->post('welcome_msg');
  $admin_style=$this->input->post('admin_style');
  $editor=$this->input->post('editor');
  $mailserver=$this->input->post('mailserver');
  $frommail=$this->input->post('frommail');
  $fromname=$this->input->post('fromname');
  $path_sendmail=$this->input->post('path_sendmail');
  $smtphost=$this->input->post('smtphost');
  $smtpport=$this->input->post('smtpport');
  $smtpuser=$this->input->post('smtpuser');
  $smtppass=$this->input->post('smtppass');
  $cache=$this->input->post('cache');
  $cache_time=$this->input->post('cache_time');

  
   $setting=$this->db->query("SELECT * from `cm_setting`");
  
  
    if ($setting->num_rows() > 0){
	
	$this->db->query("update `cm_setting` set `sitename`='$sitename',`sitemail`='$sitemail',`closesite`='$closesite',`msg_close`='$msg_close',`keywords`='$keywords',`description`='$description',`Author`='$Author',`welcome`='$welcome',`welcome_title`='$welcome_title',`welcome_msg`='$welcome_msg',`admin_style`='$admin_style',`editor`='$editor',`mailserver`='$mailserver',`frommail`='$frommail',`fromname`='$fromname',`path_sendmail`='$path_sendmail',`smtphost`='$smtphost',`smtpport`='$smtpport',`smtpuser`='$smtpuser',`smtppass`='$smtppass',`cache`='$cache',`cache_time`='$cache_time'");
	
	} else {
	$this->db->query("insert into `cm_setting` (`sitename`,`sitemail`,`closesite`,`msg_close`,`keywords`,`description`,`Author`,`welcome`,`welcome_title`,`welcome_msg`,`admin_style`,`editor`,`mailserver`,`frommail`,`fromname`,`path_sendmail`,`smtphost`,`smtpport`,`smtpuser`,`smtppass`,`cache`,`cache_time`) values('$sitename','$sitemail','$closesite','$msg_close','$keywords','$description','$Author','$welcome','$welcome_title','$welcome_msg','$admin_style','$editor','$mailserver','$frommail','$fromname','$path_sendmail','$smtphost','$smtpport','$smtpuser','$smtppass','$cache','$cache_time')  ");
	
	}
  //***************************
  $data['editsetting']=true;
  ////
  }
 
$setting=$this->db->query("SELECT * from `cm_setting`");
$row = $setting->row_array();
$data['adminsetting']=$row;
$this->load->view('layouts/layout',$data);
	}
	
	
	
	
	
public function vistor(){


$this->load->library('pagination');
$this->load->helper('url');

$vistor_total=$this->db->query("SELECT * from `cm_vistors` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$vistor=$this->db->query("SELECT * from `cm_vistors` order by ID desc limit $start,30");
$config['base_url'] = site_url('cp/admin/vistor');
$config['total_rows'] =$vistor_total->num_rows();
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
$data['vistorrows']=$vistor;
$data['pagination']=$pagination;
$data['counrow']=$vistor_total->num_rows();



$data['conten_page']="admin/vistor";

$this->load->view('layouts/layout',$data);
}	
	
	
	
	
	
	
	
	
	
	public function counters(){

$data['conten_page']="admin/counters";

  $data['updatecounters']=false;

  if($this->input->post('IsPost')=="counter"){
  
  $type_counter=$this->input->post('r1');
  $code=$this->input->post('code');
  $counter=$this->input->post('counter');
    $setting=$this->db->query("SELECT * from `cm_counters`");
  
if ($setting->num_rows() > 0){
//
$this->db->query("update `cm_counters` set `type_counter`='$type_counter',`code`='$code',`counter`='$counter' ");
} 

else {
//
$this->db->query("insert into `cm_counters` (`type_counter`,`code`,`counter`) values('$type_counter','$code','$counter')  ");

}
  
  $data['updatecounters']=true;
  ////
  
  
  }










  $setting=$this->db->query("SELECT * from `cm_counters`");
 
 $row = $setting->row_array();
 
 
 
 
 $data['admincounters']=$row;
 


$this->load->view('layouts/layout',$data);
}	
	
	
	
	
	
	
	
	
	public function help(){
	
	$this->load->view('admin/help');
	}
	
	
	
	
	public function addadmin(){
 
 $data['errorsadmin']="";
   if($this->input->post('IsPost')=="newAdmin"){
   
   $adminname=$this->input->post('adminname');
   $email=$this->input->post('email');
   $username=$this->input->post('username');
   $password=md5($this->input->post('password'));
   $role=$this->input->post('role');
   $rows=$this->db->query("SELECT * from `cm_admin` where `email`='$email' and `username`='$username' ");
   
   if ($rows->num_rows() > 0)
   {
   //found
   $data['errorsadmin']='error';
   } else {
   //add
   
$this->db->query("insert into `cm_admin` (`username`,`password`,`adminname`,`email`,`role`) 
values ('$username' , '$password' , '$adminname', '$email' ,'$role') ");
   
   $data['errorsadmin']='add';
   
   }
 
   }
 
 
 
	
	
	$data['conten_page']="admin/addadmin";
	$this->load->view('layouts/layout',$data);
	}
	
	
	
	
public function viewadmin(){




if($this->input->post('IsPost')=="delete"){
$c=$this->input->post('del');
$len=count($this->input->post('del'));
for($i=0;$i<$len;$i++){
$this->db->query("delete from `cm_admin` where `ID`='$c[$i]' and `online`='NO' ");
}
}


////

$querys = $this->db->query("SELECT * from `cm_admin` ");

$data['admindata']=$querys;
$data['num_rows']=$querys->num_rows();


$data['conten_page']="admin/viewadmin";
$this->load->view('layouts/layout',$data);
}

	
	
	
public function editadmin(){


$id=$this->uri->segment(5);
 

 
   
if($this->input->post('IsPost')=="editAdmin"){
$adminname=$this->input->post('adminname');
$email=$this->input->post('email');
$role=$this->input->post('role');
$id=$this->input->post('id');

if($this->input->post('password')!=""){
$newpass=md5($this->input->post('password'));
}
else {
$newpass=$this->input->post('old_');
}
$len = $this->db->query("SELECT * from `cm_admin` where email='$email' and `ID`!='$id' ");





if ($len->num_rows() > 0)
{
//found before
$data['errors']='found';
}   
else {
//update

$this->db->query("update `cm_admin` set `email`='$email',`role`='$role',`adminname`='$adminname',`password`='$newpass' where `ID`='$id' ");
$data['errors']='update';
}

   
   
   
   
}





$querys = $this->db->query("SELECT * from `cm_admin` where `ID`='$id' ");
 $row = $querys->row_array();
$data['admindata']=$row;


$data['conten_page']="admin/editadmin";
$this->load->view('layouts/layout',$data);
}




	/////
	
	
	
	
public function backup(){
 
$this->load->model('admin_model');
 
$data['backup']='';
if($this->input->post('IsPost')=="backup"){

$this->admin_model->backup($this->input->post('r1')); 
$data['backup']='ok';
}





$data['conten_page']="admin/backup";
$this->load->view('layouts/layout',$data);

}	
	
	
	
	
	
	
	
public function restorbackup(){

if ($this->uri->segment(4) =="restore"){
 $this->load->model('admin_model');
 $path=$this->uri->segment(5);
 $this->admin_model->restoreDb($path);
 
}

$data['conten_page']="admin/restorbackup";
$this->load->view('layouts/layout',$data);
}	
	
	
	
	
	
public function listbackup(){
$this->load->helper('download');
if($this->input->post('IsPost')=="Send"){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){
@unlink($del{$i});
}
}


if ($this->uri->segment(4) =="save"){
/*
$this->load->library('Https');
$this->https->download("bin/tmp/".$this->uri->segment(5));

*/
$this->load->helper('download');
$data = file_get_contents("bin/tmp/".$this->uri->segment(5)); // Read the file's contents
force_download($this->uri->segment(5), $data); 
}


$data['conten_page']="admin/listbackup";
$this->load->view('layouts/layout',$data);
}	
	
	
	
	
	
	
	
	
	
public function email(){


 
if($this->input->post('IsPost')=="Send"){
 $this->load->model('admin_model');
 $result=$this->admin_model->sendMail();
 if($result==true){
 $data['result']='send';
 } 
 else {
 $data['result']='error';
 }
 
 
 
 

}




$data['conten_page']="admin/email";
$this->load->view('layouts/layout',$data);

}	
	
	
	
	
	
	
public function listemail(){


//
$this->load->library('pagination');
$this->load->helper('url');



////////////

if($this->input->post('IsPost')=="Send"){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){
 $this->db->query("delete  from `cm_inbox` where `ID`='$del[$i]' ");
}
}









$inbox_total=$this->db->query("SELECT * from `cm_inbox` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$inbox=$this->db->query("SELECT * from `cm_inbox` order by ID desc limit $start,30");
$config['base_url'] = site_url('cp/admin/listemail');
$config['total_rows'] =$inbox_total->num_rows();
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
$data['inboxrows']=$inbox;
$data['pagination']=$pagination;
$data['counrow']=$inbox_total->num_rows();
///

$data['conten_page']="admin/listemail";
$this->load->view('layouts/layout',$data);

}		
	
	
	
public function viewemail(){

if ($this->uri->segment(4) =="id"){
$id=$this->uri->segment(5);

$inbox=$this->db->query("SELECT * from `cm_inbox` where `ID`='$id' ");
$data['inbox']=$inbox->row_array();
///
$this->db->query("update `cm_inbox` set `read`='YES' where `ID`='$id' ");

}




$data['conten_page']="admin/viewemail";
$this->load->view('layouts/layout',$data);
}
	
	
	
public function delemail(){
if ($this->uri->segment(4) =="id"){
$id=$this->uri->segment(5);

$this->db->query("delete from `cm_inbox`  where `ID`='$id' ");
$this->load->helper('url');
redirect('cp/admin/listemail','refresh');

}

}		
	
	
	
public function replayemail(){



 
if($this->input->post('IsPost')=="Send"){
$this->load->model('admin_model');
$result=$this->admin_model->sendMail();
if($result==true){
$data['result']='send';
} 
else {
$data['result']='error';
}
}



if ($this->uri->segment(4) =="id"){
$id=$this->uri->segment(5);
$inbox=$this->db->query("SELECT * from `cm_inbox` where `ID`='$id' ");
$data['inbox']=$inbox->row_array();
}



$data['conten_page']="admin/replayemail";
$this->load->view('layouts/layout',$data);
}		
	
	
	
	
	
	/////////////////////
	
	
	
 
	
	
	
	
	
	
	
	
	
	
 
	
	
	
	
	
}






?>
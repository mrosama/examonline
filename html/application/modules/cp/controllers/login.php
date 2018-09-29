<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {



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
	 
	  
	 
	public function index()
	{
	
	
	 $this->load->library("Xcleans");
	
	 $this->load->helper('url');
	
	$data['error']=false; 
	 
	if($this->input->post('IsPost')=="login"){
	
	$username=$this->xcleans->process($this->input->post('username'));
	$password=md5($this->xcleans->process($this->input->post('password')));

	$query = $this->db->query("SELECT * FROM `cm_admin` where `username`='$username' and `password`='$password' ");
	
	if ($query->num_rows() > 0){
	
	$row=$query->row_array();
	////
	
	 
@$CPAdmin = array(
'CP_ID'  => $row['ID'],
'CP_adminname'  => $row['adminname'],
'CP_username'     => $row['username'],
'CP_email'     => $row['email'],
'CP_role'     => $row['role'],
'CP_login' => true
);

$this->session->set_userdata($CPAdmin);
//*update status
$t=time();
$this->db->query("update `cm_admin` set `online`='YES',`timevisit`='$t' where `ID`='$row[ID]' ");
$this->load->helper('url');	
	///
	 
redirect('cp/admin', 'refresh');
	}
	else {
$data['error']=true;
	
	}
	
	
	}
	
     
$this->load->view('login/index',$data);



	}
	

	





public function logout(){



$this->db->query("update `cm_admin` set `online`='NO' where `ID`='".$this->session->userdata('CP_ID')."' ");

$this->load->helper('url');	
	///
	
$CPAdmin = array(
'CP_ID'  => '',
'CP_adminname'  => '',
'CP_username'     => '',
'CP_email'     => '',
'CP_role'     =>'',
'CP_login' => false
);

$this->session->unset_userdata($CPAdmin);	
	
redirect('cp/login', 'refresh');


}	
	
	
	
	
	
public function checklogin(){

$time=time()-3600;
$this->db->query("update `cm_admin` set `online`='NO' where `timevisit` < $time ");

if($this->session->userdata('CP_login')==true){
$n=time();
$id=$this->session->userdata('CP_ID');
$this->db->query("update `cm_admin` set `online`='YES',`timevisit`='$n' where `ID`='$id' ");
}

/////////////////////////////////////////

$querys = $this->db->query("SELECT *   FROM `cm_inbox` where `read`='NO' ");

$len=$querys->result_array() ;

$data['EmailNew']=count($len);
 
$this->load->view('login/checklogin',$data);


}	
	
	
	
	
	
	
	
public function auth(){
   $data['conten_page']="login/auth";
	$this->load->view('layouts/layout',$data);
 

}	
	
	
	
	
	
	
	
	
 
	
	
	
	
	
}






?>
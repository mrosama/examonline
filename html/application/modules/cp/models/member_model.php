<?php
class Member_model extends CI_Model {

 

   public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	
	
	
	
	
	
	
	
public function listmember(){


//////////


$this->load->library('pagination');
$this->load->helper('url');

 

////////////////////////////
$member_total=$this->db->query("SELECT * from `cm_member` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$member=$this->db->query("SELECT *
 from `cm_member` left join `countries` on cm_member.country=countries.code limit $start,30");
$config['base_url'] = site_url('cp/member/index');
$config['total_rows'] =$member_total->num_rows();
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
$data['member']=$member;
$data['pagination']=$pagination;
$data['counrow']=$member_total->num_rows();


return $data;


////////

}	
	
	
	
	
	
public function delMember(){


$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){
$this->db->query("delete  from `cm_member` where `ID`='$del[$i]' ");
}


}	
	
	
	
	
	
	









}
?>	
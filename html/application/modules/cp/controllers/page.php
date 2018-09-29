<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {






public function index(){





$this->load->model('admin_model');
$cat=@$this->admin_model->MainCatSelect('com_page','0');
$data['cat']=$cat;

//////////////////////

if($this->input->post('IsPost')=="addpage"){

$name=$this->input->post('name');
$title=$this->input->post('title');
$content=$this->input->post('input');
$cat=$this->input->post('cat');
$allow_print=$this->input->post('allow_print');
$allow_send=$this->input->post('allow_send');
$allow_fav=$this->input->post('allow_fav');
$allow_pdf=$this->input->post('allow_pdf');
$active=$this->input->post('active');


$data = array(
'name' =>$name,
'title' =>$title,
'content' =>$content,
'cat' =>$cat,
'allow_print' =>$allow_print,
'allow_send' =>$allow_send,
'allow_fav' =>$allow_fav,
'allow_pdf' =>$allow_pdf,
'active' =>$active,
);

$this->db->insert('cm_page', $data); 

$data['addpage']='ok';
 
$cat=@$this->admin_model->MainCatSelect('com_page','0');
$data['cat']=$cat;
}

$data['conten_page']="page/index.php";
$this->load->view('layouts/layout',$data);

}


//*****************************************************


public function listpage(){






$this->load->library('pagination');
$this->load->helper('url');





if($this->input->post('IsPost')=="delete"){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){
 $this->db->query("delete  from `cm_page` where `ID`='$del[$i]' ");
}
}




////////////////////////////
$page_total=$this->db->query("SELECT * from `cm_page` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$pages=$this->db->query("SELECT * from `cm_page` limit $start,30");
$config['base_url'] = site_url('cp/admin/listpage');
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

  
$data['conten_page']="page/listpage";
$this->load->view('layouts/layout',$data);
}







public function editpage(){
$this->load->model('admin_model');



/*
$data = array(
               'title' => $title,
               'name' => $name,
               'date' => $date
            );

$this->db->where('id', $id);
$this->db->update('mytable', $data); 

*/


if($this->input->post('IsPost')=="update"){

$name=$this->input->post('name');
$title=$this->input->post('title');
$content=$this->input->post('input');
$cat=$this->input->post('cat');
$allow_print=$this->input->post('allow_print');
$allow_send=$this->input->post('allow_send');
$allow_fav=$this->input->post('allow_fav');
$allow_pdf=$this->input->post('allow_pdf');
$active=$this->input->post('active');
$id=$this->input->post('id');

$data = array(
'name' =>$name,
'title' =>$title,
'content' =>$content,
'cat' =>$cat,
'allow_print' =>$allow_print,
'allow_send' =>$allow_send,
'allow_fav' =>$allow_fav,
'allow_pdf' =>$allow_pdf,
'active' =>$active,
);

 
$this->db->where('ID', $id);
$this->db->update('cm_page', $data); 
$data['addpage']='ok';

}





if ($this->uri->segment(4) =="id"){
$id=$this->uri->segment(5);
$query=$this->db->query("SELECT * from `cm_page` where `ID`='$id' ");

$page=$query->row_array();
$data['page']=$page;
$cat=@$this->admin_model->MainCatSelect('com_page',$page['cat']);
$data['cat']=$cat;

}




$data['conten_page']="page/editpage";
$this->load->view('layouts/layout',$data);
}














}


?>
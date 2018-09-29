<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {




public function index(){
$com_type='com_banner';
$data['com_type']=$com_type;

 
if($this->uri->segment(4) =="edit"){

$id=$this->uri->segment(5);



if($this->input->post('IsPost')=='Update'){

$catname=$this->input->post('name');
$width=$this->input->post('width');
$height=$this->input->post('height');

$len=$this->db->query("select * from `cm_cat` where `name`='".$catname."' and  `com_type`='$com_type' and `ID`!='$id' ");
if($len->num_rows()==0){

$this->db->query("update `cm_cat` set `name`='$catname',`width`='$width',`height`='$height' where `ID`='$id'   ");
$data['catResult']='update';
}
else {
$data['catResult']='found';
}


}

$query=$this->db->query("select * from `cm_cat` where `ID`='$id' ");
$data['rowss']=$query->row_array();

 
///
}




/////////
if($this->input->post('IsPost')=='delete'){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){
$this->db->query("delete from `cm_cat` where `ID`='$del[$i]' ");
}
}


///



//**********************************

if($this->input->post('IsPost')=="Send"){

$catname=$this->input->post('name');
$width=$this->input->post('width');
$height=$this->input->post('height');


$len=$this->db->query("select * from `cm_cat` where `name`='".$catname."' and  `com_type`='$com_type'");
if($len->num_rows()==0){

$this->db->query("insert into `cm_cat` (`name`,`cat`,`level`,`width`,`height`,`com_type`) values('$catname','0','0','$width','$height','$com_type')");

$data['catResult']='add';
} else {
$data['catResult']='found';
}

}
















$rows=$this->db->query("select * from `cm_cat` where cat='0' and `com_type`='$com_type' ");
$data['rows']=$rows;







$data['conten_page']="banner/cat";
$this->load->view('layouts/layout',$data);

}





public function newbanner(){
$com_type='com_banner';



if($this->input->post('IsPost')=="addbanner"){
$title=$this->input->post('title');
$filename=$this->input->post('file1');
$cat=$this->input->post('cat');
$link=$this->input->post('link');
$start_date=$this->input->post('start_date');
$end_date=$this->input->post('end_date');
$view=$this->input->post('view');


$data = array(
   'title' => $title ,
   'cat' => $cat ,
   'start_date' => $start_date,
   'end_date' =>$end_date ,
   'link' =>$link,
   'view' => $view ,
   'filename' => $filename
);

$this->db->insert('cm_banner',$data); 

$data['result']='ok';








}











$rows=$this->db->query("select * from `cm_cat` where  `com_type`='$com_type' ");
$data['rowcat']=$rows;






$data['conten_page']="banner/banner";
$this->load->view('layouts/layout',$data);

}










public function listbanner(){




$this->load->library('pagination');
$this->load->helper('url');





if($this->input->post('IsPost')=="delete"){
$del=$this->input->post('del');
$len=count($del);
for($i=0;$i<$len;$i++){

$query = $this->db->query("SELECT * from `cm_banner` where `ID`='$del[$i]' ");
$row = $query->row_array();
@unlink($row['filename']);

 $this->db->query("delete  from `cm_banner` where `ID`='$del[$i]' ");
}
}




////////////////////////////
$page_total=$this->db->query("SELECT * from `cm_banner` ");

$seg=$this->uri->segment(4);
if($seg==""){
$start=0;
}else  {
$start=$seg;
}
$pages=$this->db->query("SELECT cm_cat.name as catname,cm_banner.ID as IDbanner,cm_banner.title as title,cm_banner.start_date as start_date,cm_banner.end_date as end_date,cm_banner.filename as filename

 from `cm_banner` left join `cm_cat` on cm_banner.cat=cm_cat.ID limit $start,30");
$config['base_url'] = site_url('cp/banner/listbanner');
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











$data['conten_page']="banner/listbanner";
$this->load->view('layouts/layout',$data);
}







public function editbanner(){
$com_type='com_banner';

$id=$this->uri->segment(5);



if($this->input->post('IsPost')=="editbanner"){
$title=$this->input->post('title');
$filename=$this->input->post('file1');
$cat=$this->input->post('cat');
$link=$this->input->post('link');
$start_date=$this->input->post('start_date');
$end_date=$this->input->post('end_date');
$view=$this->input->post('view');


$data = array(
   'title' => $title ,
   'cat' => $cat ,
   'start_date' => $start_date,
   'end_date' =>$end_date ,
   'link' =>$link,
   'view' => $view ,
   'filename' => $filename
);
$this->db->where('ID', $id);
$this->db->update('cm_banner', $data); 
$data['result']='ok';



}






$banner=$this->db->query("select * from `cm_banner` where  `ID`='$id' ");
$data['banners']=$banner->row_array();


$rows=$this->db->query("select * from `cm_cat` where  `com_type`='$com_type' ");
$data['rowcat']=$rows;

$data['conten_page']="banner/editbanner";
$this->load->view('layouts/layout',$data);
}



























}
?>
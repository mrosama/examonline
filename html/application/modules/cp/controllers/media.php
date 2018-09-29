<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends MX_Controller {



public function index(){
 
 

 
 
 
 
 
 
if($this->input->post("IsPost")=="Send"){

$path=$this->input->post("Path");
$del=$this->input->post("del");
 $len=count($del);

 
 
$this->load->library('FileSystems');

//
 
if(is_array($del)){
for($i=0;$i<$len;$i++){
if(is_dir($path.'/'.$del[$i])){
if($path.'/'.$del[$i]=='./Media'){
continue;
} else {
$this->filesystems->removeFolder($path.'/'.$del[$i]);
}

}
else {
@unlink($path.'/'.$del[$i]);
}
}

}

 

//

} 


if($this->input->post("upload")){
$this->load->model('admin_model');
$path=$this->input->post("Path");
$result=$this->admin_model->uploadMedia($path);

if($result=="error"){
$data['uploadresult']='error';
} 
else {
$data['uploadresult']='ok';
$data['uploadfile']=$result['filepath'];
}


}
 
 
 //********************************
 
if($this->input->post("newfolder")){
$path=$this->input->post("Path");
$foldername=$this->input->post("foldername");
@mkdir($path.'/'.$foldername,0777);

}
 
 
 
 
 
if($this->input->post("IsPost")=="Send"){
$data['current_path']=$this->input->post("Path");
} else {
$data['current_path']="./Media";
}
 
///----------------------
 

$data['conten_page']="media/index";

$this->load->view('layouts/layout',$data);
}











 








public function mediafile(){



if ($this->uri->segment(4) =="item"){
 
$itemID=$this->uri->segment(5);
 $data['ItemID']=$itemID;
 
 }

 ////////////////////////
 
 
 
if($this->input->post("IsPost")=="Send"){

$path=$this->input->post("Path");
$del=$this->input->post("del");
 $len=count($del);

 
 
$this->load->library('FileSystems');

//
 
if(is_array($del)){
for($i=0;$i<$len;$i++){
if(is_dir($path.'/'.$del[$i])){
if($path.'/'.$del[$i]=='./Media'){
continue;
} else {
$this->filesystems->removeFolder($path.'/'.$del[$i]);
}

}
else {
@unlink($path.'/'.$del[$i]);
}
}

}

 

//

} 


if($this->input->post("upload")){
$this->load->model('admin_model');
$path=$this->input->post("Path");
$result=$this->admin_model->uploadMediaFly($path);

if($result=="error"){
$data['uploadresult']='error';
} 
else {


$data['uploadresult']='ok';
$data['uploadname']=$result['filename'];
$data['uploadfile']=$result['filepath'];
}


}
 
 
 //********************************
 
if($this->input->post("newfolder")){
$path=$this->input->post("Path");
$foldername=$this->input->post("foldername");
@mkdir($path.'/'.$foldername,0777);

}
 
 
 
 
 
if($this->input->post("IsPost")=="Send"){
$data['current_path']=$this->input->post("Path");
} else {
$data['current_path']="./Media";
}
 
///----------------------
 

 

$this->load->view('media/mediafile',$data);
}







}




















?>
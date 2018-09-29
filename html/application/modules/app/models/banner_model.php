<?php
class Banner_model extends CI_Model {

 

   public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	
	
	
	
	
 
 /////////////front////////////////////////



public function Banner($cat){

 
 $this->load->helper('jimage');

$html="";
 
$query=$this->db->query("select * from `cm_banner` where `cat`='$cat' and  curdate() between `start_date` and `end_date` order by ID desc ");
$data=$query->row_array();

if($query->num_rows()==0){
}
else 
{

$filename=Jimage($data['filename']);
$exe=strtoupper(end(explode(".",$filename)));

$CAT=$this->db->query("select * from `cm_cat` where `ID`='$data[cat]' and `com_type`='com_banner' ");

$getcat=$CAT->row_array();
 
$target=$data['view'];
 

if($exe=="SWF"){
if(!empty($data["link"])){
$html.= "<a href='http://$data[link]'> target='$target'><object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$getcat[width]' height='$getcat[height]'>
<param name='movie' value='$filename'  />
<param name='quality' value='high' />
<embed src='$filename' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$getcat[width]' height='$getcat[height]'></embed>
</object><a>";
}
else {
$html.= "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$getcat[width]' height='$getcat[height]'>
<param name='movie' value='$filename'  />
<param name='quality' value='high' />
<embed src='$filename' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$getcat[width]' height='$getcat[height]'></embed>
</object>";
}
}
else {
if(!empty($data["link"])){
$html.= "<a href='http://$data[link]' target='$target'><img src='$filename' border='0' 
width='$getcat[width]' height='$getcat[height]'></a>";
}
else {
$html.= "<img src='$filename' border='0' 
width='$getcat[width]' height='$getcat[height]'>";
}
return $html;
}
}




}

	
	
	
	
	
	
	
	
	
	
	
	
}	
	
	
	
	
	?>
    
    
    
    
    
    
    

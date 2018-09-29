<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$this->load->helper('html');
$this->load->helper('jimage');

 $this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");
 ?>

<table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain' align="right">
<?php
$this->load->model('app_model');
$id=$this->uri->segment(5);
$nav= $this->app_model->front_useFrom('الصفحات','app/page/cat',$id);
echo ($nav!="")? $nav:"الصفحات";
?>
</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">

<?php
if($maincat->num_rows()!=0){

?>
<table align="center" width="99%" border="0">
<tr>
<?php
$i=0;
foreach($maincat->result_array() as $row){


?>
<td align="center"><table width="30%"  align="center">

<tr><td align="center"><?php
if($row['img']==""){
echo anchor("app/page/cat/id/$row[ID]",img(array("src"=>"$base/img/1238674125.gif",'border'=>0)),''); 
} else {
echo anchor("app/page/cat/id/$row[ID]",img(array("src"=>Jimage($row['img']),'border'=>0)),"class='cat_img' "); 

}
?></td></tr>
<tr><td align="center">

<?php   
echo anchor("app/page/cat/id/$row[ID]",$row['name']);
?>
</td></tr>
</table>   
</td>

<?php
if($i==3){
echo "</tr><tr>";
$i=1;
}
$i++;
}
?>
</table>
<?php

}
else {
$id=$this->uri->segment(5);
   redirect("app/page/listpage/cat/$id", 'refresh');
}


?>


</td></tr></table>
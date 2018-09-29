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

<table align="center" width="99%" cellpadding="0">
<?php
if(@$pages->num_rows()!=0){

foreach($pages->result_array() as $row){

?>

<tr><td align="right"><?php 
echo anchor("app/page/index/page_no/$row[ID]",$row['title']);
 ?>
</td>
<td width="1%"><?php echo img(array('src'=>"$base/img/note.png",'border'=>0));?></td></tr>
<tr><td height="1px"  bgcolor="#CCCCCC" colspan="2"></td></tr>

<?php



}

}else {

echo "لا توجد صفحات مسجلة بهذا القسم";
}



?>
<tfoot><td colspan="2" align="center"><?php echo @$pagination;?></td></tfoot>
</table>





</td></tr></table>

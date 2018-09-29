<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 $this->load->helper('url');
  $this->load->helper('html');
$base= base_url("html/application/modules/cp/views/layouts/");
?>
<table align="center" width="100%" cellpadding="0" cellspacing="3" dir="ltr">
<?php
if($rows->num_rows()!=0){

foreach($rows->result_array() as $row){

?>

<tr><td align="right"><?php 
echo  anchor("app/page/index/page_no/$row[ID]",$row['title']);
?>
 
</td><td width="1%"><?php echo img(array('src'=>"$base/img/t_poll_unread.png",'border'=>0));?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<?php

}



}
?>


</table>
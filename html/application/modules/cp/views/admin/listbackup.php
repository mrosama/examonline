<?php
$this->load->model('admin_model');
$this->admin_model->CheckPremision();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


 <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
      
 </TD>
    <TD width='20%'  height="20px">   
    
    <select name="action" class="newinput" style="width:180px" onchange="location.href=this.value ">
 <option class="myoption"  selected="selected"    value="<?php echo base_url("cp/admin/listbackup");?>">أرشيف النسخ الاحتياطية</option>
<option   class="myoption"  
value="<?php echo base_url("cp/admin/backup");?>" >نسخة إحتياطية</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">أرشيف النسخ الاحتياطية</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/server.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
<!-- /**********************************/-->






  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
 
  <th  id="rating" align="center">حذف</th>
 <th  id="rating" align="center">إستعادة</th>
<th  id="rating" align="center">تحميل</th>
<th id="rating" align="center">الحجم</th>
<th id="rating" align="center">النوع</th>
<th id="rating" align="center"  >الملف</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php
$base= base_url("html/application/modules/cp/views/layouts/");

$this->load->library('FileSystems');

$this->load->helper('directory');
$pathfile='bin/tmp/';
$files=directory_map($pathfile, 0);




for($i=0;$i<count($files);$i++){

if($files{$i}=="index.html"){
continue;
}
?>


<tr>
<td align="center"><input type="checkbox" name="del[]" value="<?php echo $pathfile.$files{$i}?>" /></td>

<td align="center"><?php echo anchor("cp/admin/restorbackup/restore/".$files{$i},img("$base/img/create.png"),''); ?></td>

<td align="center"><?php echo anchor("cp/admin/listbackup/save/".$files{$i},img("$base/img/save_16.png"),''); ?></td>

<td align="center"><font color="#FF0000"><?php echo $this->filesystems->__FormatSize(filesize($pathfile.$files{$i}));?></font></td>
<td align="center"><?php echo $this->filesystems->File_extension($files{$i});?></td>
<td align="center"><?php echo $files{$i};?></td>
<td><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/database_16.png"  /></td>

</tr>

<?php
}
?>

</tbody>
<input type="hidden" value="Send" name="IsPost" />
<tfoot>
<tr><th colspan="7" align="left"><input type="submit" value="  حذف  "  class="button"></th></tr>
</tfoot>

</table>

</form>

</td></tr></table>






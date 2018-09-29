<?php
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
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
    
  </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">ألاعضاء</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/user1.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
<!-- /*0000000000000000000000*/-->





 
 
 <!--*****************************************-->
 
 
 
  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
<th  id="rating" align="center">حذف</th>
<th  id="rating" align="center">عرض البيانات</th>
<th id="rating" align="center">الحالة</th>
<th id="rating" align="center">البريد</th>
<th id="rating" align="center">الاسم</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php

if($counrow!=0){
$j=0;
foreach($member->result_array() as $row){
?>
      <tr>
 
<td  id="rating" align="center"><input type="checkbox" value="<?php echo $row['ID'];?>" name="del[]" class="newinput"></td>
<td id="rating" align="center">

 <script type="text/javascript">
 jQuery(document).ready(function() {
		
		jQuery("#preview_<?php echo $j;?>").fancybox({
				'width'				: '50%',
				'height'			: '89%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		
		})
    </script>
 
<?php
  echo anchor("cp/member/preview/id/$row[ID]",img("$base/img/glass.png"),"id=preview_$j "); 
  ?>
  
</td>
<td id="rating" align="center"> 
<?php
if($this->uri->segment(4)!=""){
$pageno=$this->uri->segment(4);
}else {
$pageno=0;
}


if($row['active']=="YES"){

echo anchor("cp/member/index/$pageno/activeN/$row[ID]",img(array('src'=>"$base/img/yes.gif",'border'=>0,'title'=>'مفعل') ));
}
else {
echo anchor("cp/member/index/$pageno/activeY/$row[ID]",img(array('src'=>"$base/img/no1.gif",'border'=>0,'title'=>'غير مفعل') ));
}
?>


</td>
<td id="rating" align="center"><?php echo $row['email'];?></td>
<td id="rating" align="center"><?php echo $row['name'];?></td>
<td id="rating" align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/left-li-bac-even.jpg"  /></td>
</tr>

<?php
$j++;
}}  else {
?>
<tr><td colspan="6" align="center">  لا يوجد اعضاء مسجلين</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="6">
<input type="hidden" value="delete" name="IsPost">
<p align="left"><input type="submit" value="  حذف "   class="button" /></p><?php echo @$pagination;?></th>


</tfoot>



</table></form>


</td></tr></table>
 
 
 















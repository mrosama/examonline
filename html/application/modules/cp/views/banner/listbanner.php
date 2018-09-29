<?php
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
 $this->load->helper('jimage');
 
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
     <option class="myoption"  selected="selected"   value="<?php echo base_url("cp/banner/listbanner");?>"> أرشيف ألاعلانات</option>
 <option class="myoption"      value="<?php echo base_url("cp/banner/newbanner");?>"> إعلان جديد</option>
<option   class="myoption"  
value="<?php echo base_url("cp/banner/index");?>" >أقسام الاعلانات</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">أرشيف ألاعلانات</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/ico_tv.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
 
 
 
 <!--*****************************************-->
 
 
 
  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
<th  id="rating" align="center">حذف</th>
<th  id="rating" align="center">تعديل</th>
<th  id="rating" align="center">القسم</th>
<th  id="rating" align="center">معاينة</th>
<th id="rating" align="center">تاريخ نهاية الاعلان</th>
<th id="rating" align="center">تاريخ بداية الاعلان</th>
<th id="rating" align="center">اسم الاعلان</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php

if($counrow!=0){
$j=0;
foreach($pages->result_array() as $row){
?>
      <tr>
 
<td  id="rating" align="center"><input type="checkbox" value="<?php echo $row['IDbanner'];?>" name="del[]" class="newinput"></td>
<td id="rating" align="center">
 <?php
  echo anchor("cp/banner/editbanner/id/$row[IDbanner]",img("$base/img/file_edit.gif"),' title="تعديل" '); 
  ?>
</td>
<td id="rating" align="center"> 
<?php
echo $row['catname'];
?>
</td>

<td id="rating" align="center"> 

 <script type="text/javascript">
 jQuery(document).ready(function() {
		
		jQuery("#preview_<?php echo $j;?>").fancybox({
				'width'				: '89%',
				'height'			: '89%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		
		})
    </script>
 
   <?php  echo anchor(Jimage($row['filename']),img("$base/img/note.png"),"id=preview_$j "); ?>


 
</td>

<td id="rating" align="center"> 
end
</td>
<td id="rating" align="center"> 
egin
</td>

<td id="rating" align="center"><?php echo $row['title'];?></td>
<td id="rating" align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/left-li-bac-even.jpg"  /></td>
</tr>

<?php
$j++;
}}  else {
?>
<tr><td colspan="8" align="center">  لا توجد إعلانات مسجلة</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="8">
<input type="hidden" value="delete" name="IsPost">
<p align="left"><input type="submit" value="  حذف "   class="button" /></p><?php echo @$pagination;?></th>


</tfoot>



</table></form>


</td></tr></table>
 
 
 
 
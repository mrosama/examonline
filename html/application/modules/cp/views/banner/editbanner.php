<?php
$this->load->helper('html');
$this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
 ?>
 
 <link type="text/css" href="<?php echo base_url('bin/jquery');?>/css/start/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('bin/jquery');?>/theme/ui-lightness/jquery.ui.all.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('bin/jquery');?>/demos.css" rel="stylesheet" media="screen" />

 
 

  <script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/external/jquery.bgiframe-2.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/External/jquery');?>/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.draggable.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.resizable.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.dialog.js"></script>
<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.effects.core.js"></script>
 <script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.effects.blind.js"></script>
 <script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.effects.explode.js"></script>

<script type="text/javascript" src="<?php echo base_url('bin/jquery');?>/ui/jquery.ui.datepicker.js"></script>
<!--
--> 
 
 
    	<script type="text/javascript">
	
	jQuery(document).ready(function(){
 
 
 var pickerOpts = {
dateFormat: "yy-mm-dd",
showOn: 'button',
buttonImage: '<?php echo $base.'/img/ca_day.png'?>',
buttonImageOnly: true,

changeFirstDay: false,
changeMonth: true,
changeYear: true,
closeAtTop: false,
showOtherMonths: true,
showStatus: true,
showWeeks: true,
duration: "fast"
};
	
// $.datepicker.setDefaults($.datepicker.regional['ar']);
 jQuery("#datepicker").datepicker(pickerOpts);
  jQuery("#datepicker2").datepicker(pickerOpts);
 	//end
	})

			
	 
				
	</script>
 
 
    <script type="text/javascript">
function validate2(myform){
var exe=new RegExp("(.+)\\.(JPEG|JPG|PNG|GIF|SWF)","i")
if(myform.title.value==""){
alert(" أسم الاعلان مفقود");
return false;

}


else if(myform.cat.value==""){
alert(" القسم مفقود");
return false;

}


else if(exe.test(myform.file1.value)==false){
alert("نوع الملف غير مسموح بة   \n  JPEG-JPG-PNG-GIF-SWF");
return false;
}

else if(myform.start_date.value=="") {
alert("تاريخ بداية الاعلان مفقود");
return false;
} 

else if(myform.end_date.value=="") {
alert("تاريخ نهاية الاعلان مفقود");
return false;
} 

else {
return true;
}

}
  </script>
 
 
 
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
     <option class="myoption"     value="<?php echo base_url("cp/banner/listbanner");?>"> أرشيف ألاعلانات</option>
 <option class="myoption"  selected="selected"    value="<?php echo base_url("cp/banner/newbanner");?>"> إعلان جديد</option>
<option   class="myoption"  
value="<?php echo base_url("cp/banner/index");?>" >أقسام الاعلانات</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">إعلان جديد</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/ico_tv.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
<?php
$this->load->library('Msg');
if(@$result=='ok'){
echo $this->msg->SendMsg(' الاعلانات ','     تم تعديل الاعلان',1);
}
?>

 
<table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="rtl ">
 <tr ><td align="right" class="blocks"></td>
 <td width="5%"></td></tr>
 <tr><td colspan="2" align="right">
 
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 
  
 
 <tr><td  align="right" ><input type="text" size="40" name="title" dir="rtl" class="newinput" style="width:80%" value="<?php echo $banners['title'];?>"></td><td class="myselect">اسم الاعلان</td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 <tr><td align="right" >
 <select name="cat" class="newinput">
  
 <?php
 if($rowcat->num_rows()!=0){
 foreach ($rowcat->result_array() as $row)
{
 
 ?>
 <option value="<?php echo $row['ID']?>"  <?php if($banners['cat']==$row['ID']){ echo "selected";}?>><?php echo $row['name']?></option>
 <?php
}
 }
 ?>
 
 </select>
 
 
 
 </td><td class="blocks">اختار القسم</td></tr>

 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>

 
  <tr>
 <td  align="right"  valign="top">
 

 <script type="text/javascript">
 jQuery(document).ready(function() {
		
		jQuery("#file_up").fancybox({
				'width'				: '89%',
				'height'			: '89%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		
		})
    </script>
 
   <?php  echo anchor('cp/media/mediafile/item/file1',img("$base/img/register.gif"),'id="file_up" title="تحميل ملف" '); ?>
 
 <input type="text"  id="file1" name="file1" class="newinput" style="width:30%" value="<?php echo $banners['filename'];?>" />



</td><td class="myselect">صورة الاعلان</td></tr>
    <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 <tr><td  align="right"  valign="top">
http://<input type="text" size="40" name="link" class="newinput" style="width:80%" value="<?php echo $banners['link'];?>"></td><td class="blocks">رابط الاعلان</td></tr>
    <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>


<tr><td  align="right"  valign="top">
<input type="text" size="20"   name="start_date" class="newinput" id="datepicker" value="<?php echo $banners['start_date'];?>"></td><td class="blocks">تاريخ بداية الاعلان</td></tr>
    <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
    
    <tr><td  align="right"  valign="top">
<input type="text" size="20"  name="end_date" class="newinput" id="datepicker2" value="<?php echo $banners['end_date'];?>"></td><td class="blocks">تاريخ نهاية الاعلان</td></tr>
    <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 
 
  
 
  <tr><td  align="right" >
  <table align="right" width="70%">
<tr><td align="right"><input type="radio" value="_self"   name="view" class="newinput" <?php if($banners['view']=="_self") { echo "checked='checked'";}?>></td><td class="blocks"> في النافذة النشطة</td>
<td align="right"><input type="radio" value="_blank"   name="view" <?php if($banners['view']=="_blank") { echo "checked='checked'";}?>   class="newinput"></td><td class="blocks">في نافذة مستقلة</td></tr>
</table>
  </td><td class="blocks">نافذة العرض</td></tr>
   <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
    <input type="hidden" value="<?php echo $banners['ID'];?>" name="id">
  <input type="hidden" value="editbanner" name="IsPost">
  <tr><td  align="center" colspan="2" >
 
  
    <input type="button" value=" عودة " class="button" onClick="location.href='<?php echo base_url('cp/banner/listbanner');?>' " />
  
  &nbsp; &nbsp; &nbsp; &nbsp;
  
  <input type="submit" value="  حفظ  " class="button" onClick="return validate2(this.form);"></td></tr>
 </table>
   </form>
 
 </td></tr></table> 
 
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
 </TD>
    <TD width='20%'  height="20px"><br/> </TD>
      <TD width="60%" class="myselect" align="right">إدارة الوسائط</TD>
        <TD width=10>
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/mico_download.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
 <style>
.toolbar {
margin-right: 10px;
 -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  border: 1px   solid #999999;
  background:#f9f9f9;
  width:90px;
  overflow:hidden;
}

.toolbar a.toolbar {
color : #808080;
text-decoration : none;
display: block;
border: 1px solid #DDD;
width: 40px;
padding: 2px 5px 2px 5px;
}
.toolbar a.toolbar:hover {

color : #C64934;
cursor: pointer;
border: 1px solid  #68A3CE  groove ;
background-color:#F8F5EF;
padding: 3px 5px 1px 5px;
}
.toolbar a.toolbar:active {
color : #FF9900;
}
/*---*/


.scrollable2 {

overflow: scroll; 
overflow: -moz-scrollbars-vertical; 
overflow-x: scroll; 
overflow-y: scroll;
height:200px;
width: 750px;
display: block;
padding-right:30px;
margin-right:0px;
float:right;

}



</style>
        <style type="text/css">
        #custom-demo .uploadifyQueueItem {
  background-color: #FFFFFF;
  border: none;
  border-bottom: 1px solid #E5E5E5;
  font: 11px Verdana, Geneva, sans-serif;
  height: 50px;
  margin-top: 0;
  padding: 10px;
  width: 350px;
}
#custom-demo .uploadifyError {
  background-color: #FDE5DD !important;
  border: none !important;
  border-bottom: 1px solid #FBCBBC !important;
}
#custom-demo .uploadifyQueueItem .cancel {
  float: right;
}
#custom-demo .uploadifyQueue .completed {
  color: #C5C5C5;
}
#custom-demo .uploadifyProgress {
  background-color: #E5E5E5;
  margin-top: 10px;
  width: 100%;
}
#custom-demo .uploadifyProgressBar {
  background-color: #0099FF;
  height: 3px;
  width: 1px;
}
#custom-demo #custom-queue {
  border: 1px solid #E5E5E5;
  height: 213px;
margin-bottom: 10px;
  width: 370px;
 
}				</style>
<?php
$this->load->helper('html');
 $this->load->helper('url');
 $this->load->helper('directory');
$base= base_url("html/application/modules/cp/views/layouts/");

$FlashUpload=base_url("bin/FlashUpload/");

 
 
 ?>

 <script type="text/javascript">
 
 function remap(url){
 var oldPath= document.getElementById('Path').value;
document.getElementById('Path').value="";
 document.getElementById('Path').value+=oldPath+'/'+url;
 document.form_dir.submit();
 
 }
 /////////////////////////////
 
 
 function folderUp(){
  
var path= document.getElementById('Path').value;
var restoredArray = path.split("/");
 
if(restoredArray.length >2){
restoredArray.pop();
var newpath= restoredArray.join("/");
document.getElementById('Path').value=newpath
document.form_dir.submit();
}


 
 }
 </script>
  <?php
 $this->load->library('Msg');
 if(@$uploadresult=='error'){
 echo $this->msg->SendMsg(' FileSystem ','   غير قادر علي تحميل الملف  ',3);
 }
 
  if(@$uploadresult=='ok'){
  $msg="<ul><li>تم تحميل الملف</li>
  <li>  رابط الملف  : $uploadfile  </li></ul>
  ";
 echo $this->msg->SendMsg(' FileSystem ',$msg,1);
 }
 
 ?>
 
 
 
 
 <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <form method="post" enctype="multipart/form-data" name="form_dir">
 <tr>
 <td>
 <table align="center" width="99%">
 <tr>
 <td width="53%"><input type="text"  
  class="newinput"   
 value="<?php echo @$current_path;?>" name="Path" id="Path" readonly="readonly" style="width:90%"></td>
 
 <td width="17%" align="right" valign="middle">
 <input type="submit" name="newfolder" value="مجلد جديد"  style="border:1px #999999 solid; height:25px">
  </td>
 <td width="15%" align="left"><input type="text" size="10" class="newinput" name="foldername"></td>
 
 <td width="15%">
  <a href="#" onclick="document.form_dir.submit();" > <IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/no_icon.gif"  border="0" title="حذف الملفات والمجلدات المختارة" /></a>
  
  
 &nbsp;&nbsp;&nbsp;&nbsp;
 <a href="#" onclick="folderUp();" ><IMG   src="<?php echo base_url("html/application/modules/cp/views/layouts/img/mime/");?>/up.png" width="24" border="0"  title="Up /الانتقال إلي مستوي اعلي"  /></a></td>
 </tr>
 
 </table>
 </td>
 </tr>
 
 
 
 
  <tr><td  height="1px" bgcolor="#cccccc"></td></tr>
  
   <tr><td width="100%">
   <div  class="scrollable2"  >
   <?php
   $map = directory_map($current_path,1);
 
   ?>
   <table align="center" cellpadding="5" cellspacing="5"  width="100%" >
   
 <tr>  <?php
 $this->load->library("FileSystems");
 
 
 
 $fileexe=array('avi','doc','mov','mp3','mp4.','odc','odd','odt','ogg','pdf','ppt','rar','rtf','svg','sxd','tar','tgz','wma','wmv','xls','zip','gif','jpeg','jpg','png','exe');
 $photo=array("png","gif","jpeg","bmp","jpg");
 
   $i=1;
   if(is_array($map)){
   foreach($map as $item){
    $exe=$this->filesystems->File_extension($item);
    
   if(in_array($exe,$fileexe)){
   $icon=base_url("html/application/modules/cp/views/layouts/img/mime/$exe.png");
   }
   else {
   $icon=base_url("html/application/modules/cp/views/layouts/img/mime/advertise.png");
   }
 
 if(is_dir($current_path.'/'.$item)){
  $icon=base_url("html/application/modules/cp/views/layouts/img/mime/Folder.png");
 }
   
    if(in_array($exe,$photo)){
	 $icon=base_url($current_path.'/'.$item);
	 @$options="width=80 height=50 style=' border: 1px   solid #999999;' ";
	}
	else {
	$options="";
	}
   
   
  ?> 
  
  <td class="myselect" align="center"  >
  <table width="100%" class="toolbar" cellpadding="5" cellspacing="5">
  <tr><td align="center">
  <a href="#" onclick="remap('<?php  echo $item;?>');"><IMG src="<?php echo $icon;?>" <?php echo  @$options;?> border="0" /></a></td>
  </tr>
  <tr><td class="myselect" align="center"><?php echo $item;?><br/>&nbsp;<input type="checkbox" name="del[]" value="<?php echo $item;?>"></td></tr>
  </table>
  </td>
  
   
  
  
   <?php
   if($i==5){
   echo "</tr><tr>";
   $i=0;
   }
   
   
   $i++;
   }
 
 }
   ?>
   
   
   
   </table>
   
   
   
   
   
   
   
   </div>
   
   
   
   </td></tr>
   
     <tr><td  height="1px" bgcolor="#cccccc"></td></tr>
      <tr><td align="left">
      
      <fieldset >
<legend class="myselect">تحميل الملفات	</legend>
     <br/> 
 
      
      
    <input id="file1" name="file1" type="file"  size="30" 
    style="height:30px; border:1px #555 outset; background:#cccccc"  />
    <br clear="right">
<input type="submit" name="upload" value="  &nbsp; Upload &nbsp;" style="border:1px #999999 solid; height:25px; font-weight:bold" />
    <br/> <br/>
      </fieldset>
      </td></tr>
   
   <input type="hidden" value="Send" name="IsPost">
   
 </form>
 </table>
 

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
    <TD width='20%'  height="20px"><br/> </TD>
      <TD width="60%" class="myselect" align="right">إعدادات</TD>
        <TD width=10>
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/page_advanced.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 
 <?php
 $this->load->library('Msg');
 if($editsetting==true){
 echo $this->msg->SendMsg(' ألاعدادات ','   تم تعديل ألاعدادات  ',1);
 }
 ?>
 

 
 <table align="center" width="100%">
 <tr><td>
 
  <form method="post" name="form_1">
        <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
          <tr>
            <td  align="right"  ><input type="text" size="40" name="sitename" class="newinput" value="<?php echo $adminsetting['sitename'];?>" dir="rtl"  ></td>
            <td class="myselect">اسم الموقع</td>
          </tr>
          <tr>
            <td   height='1'   colspan="2" ></td>
          </tr>
          <tr>
            <td   align="right" ><input type="text" size="40" name="sitemail" class="newinput" value="<?php echo $adminsetting['sitemail'];?>" dir="rtl" ></td>
            <td class="myselect">بريد استقبال الرسائل</td>
          </tr>
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"></td>
          </tr>
       <tr>
<td   align="right">
<select name="editor" class="newinput"  style="width:150px">
<option value="0"    <?php if($adminsetting['editor']=="0") { echo "selected='selected'"; }?>  >none</option>
<option value="1"   <?php if($adminsetting['editor']=="1") { echo "selected='selected'"; }?>  >CLEditor</option>
<option value="2"    <?php if($adminsetting['editor']=="2") { echo "selected='selected'"; }?> >tiny_mce</option>
<option value="3"   <?php if($adminsetting['editor']=="3") { echo "selected='selected'"; }?> >Elrte</option>
            </select>            
            
            </td>
            <td class="myselect">محرر</td>
          </tr> 
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
          <tr>
            <td   align="right" ><table width="50%">
                <tr>
                  <td   align="right"><input   type="radio"    value="NO" <?php if($adminsetting['closesite']=="NO") { echo "checked='checked'"; }?>  name="closesite" class="newinput"></td>
                  <td class="myselect">لا</td>
                  <td  align="right"><input type="radio"   value="YES" <?php if($adminsetting['closesite']=="YES") { echo "checked='checked'"; }?>      name="closesite" class="newinput"></td>
                  <td class="myselect">نعم</td>
                </tr>
              </table></td>
            <td class="myselect">إغلاق الموقع</td>
          </tr>
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
          <tr>
            <td   align="right"><textarea cols="60" rows="3" name="msg_close"  class="newinput" dir="rtl" ><?php echo $adminsetting['msg_close'];?> </textarea></td>
            <td class="myselect">رسالة الاغلاق</td>
          </tr>
          
             <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>   
    <tr>
 <td   align="right" ></td>
  <td class="myselect"><font color="#FF3300">ألوان لوحة التحكم</font></td>

          </tr>
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>       
          
 <tr>
 <td  align="right">  
 
<div >    
<table class="color-palette">
<tr>
<td align="right" style="background-color: #dbedf3"  ></td>
</tr>
</table>
 </div>
</td> 
<td align="left">
 <input name="admin_style"     type="radio" value="blue.css" class="newinput"  <?php if($adminsetting['admin_style']=="blue.css") { echo "checked='checked'"; }?>    /> 
</td>
</tr>
    
    
   <tr>
 <td  align="right">  
<div >    
<table class="color-palette">
<tr>
<td style="background-color: #fdfae7"  ></td>
</tr>
</table>
 </div>
</td> 
<td align="left">
 <input name="admin_style"   type="radio" value="yellow.css" class="newinput" <?php if($adminsetting['admin_style']=="yellow.css") { echo "checked='checked'"; }?>  /> 
</td>
</tr>



   <tr>
 <td  align="right">  
<div >    
<table class="color-palette">
<tr>
<td style="background-color: #cccccc"  ></td>
</tr>
</table>
 </div>
</td> 
<td align="left">
 <input name="admin_style"   type="radio" value="gray.css" class="newinput" <?php if($adminsetting['admin_style']=="gray.css") { echo "checked='checked'"; }?>   /> 
</td>
</tr>







 <tr>
 <td  align="right">  
<div >    
<table class="color-palette">
<tr>
<td style="background-color: #ffdef0"  ></td>
</tr>
</table>
 </div>
</td> 
<td align="left">
<input name="admin_style"   type="radio" value="red.css"   class="newinput"  <?php if($adminsetting['admin_style']=="red.css") { echo "checked='checked'"; }?>     /> 
</td>
</tr>        
          
          
  <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
          <tr>
            <td   align="right"></td>
            <td class="myselect"><font color="#FF3300">Metadata Settings  </font></td>
          </tr>
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
          <tr>
            <td   align="right" ><textarea cols="60" name="keywords" rows="3"  class="newinput" dir="rtl" > <?php echo $adminsetting['keywords'];?></textarea></td>
            <td class="myselect">keywords</td>
          </tr>
          <tr>
            <td   align="right" ><textarea cols="60" rows="3"  name="description" class="newinput" dir="rtl" ><?php echo $adminsetting['description'];?></textarea></td>
            <td class="myselect">description</td>
          </tr>
          <tr>
            <td  align="right" ><textarea cols="60" name="Author" rows="3"  class="newinput" dir="rtl" > <?php echo $adminsetting['Author'];?></textarea></td>
            <td class="myselect">Author</td>
          </tr>
          
          
            <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>    
          
          
          
 <tr>
            <td   align="right">
            </td>
            <td class="myselect"><font color="#FF3300"> إعداد كلمة الترحيب</font></td>
          </tr>
                  <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>

          </tr>
          
          
           
           
                          <tr>
            <td   align="right"><select name="welcome" class="newinput" style="width:100px">
                
                <option value="NO"   <?php if($adminsetting['welcome']=="NO") { echo "selected='selected'"; }?>  >لا </option>

                <option value="YES"  <?php if($adminsetting['welcome']=="YES") { echo "selected='selected'"; }?>  > نعم  </option>
              </select></td>
            <td class="myselect">تفعيل كلمة الترحيب</td>
          </tr>
           
               
     
                         <tr>
            <td   align="right"><input type="text" size="40" name="welcome_title" class="newinput" 
			value="<?php echo $adminsetting['welcome_title'];?>" dir="rtl" ></td>
            <td class="myselect">عنوان كلمة الترحيب</td>
          </tr>
          
  <tr>
            <td    align="right" >

            
            
            
            
            <textarea dir="rtl"  cols="80" name="welcome_msg" rows="3" id="welcome_msg"   class="newinput"> <?php echo $adminsetting['welcome_msg'];?></textarea></td>
            <td class="myselect">محتوي كلمة الترحيب</td>
          </tr> 
  <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
 <tr>
            <td   align="right" ></td>
            <td class="myselect"><font color="#FF3300">إعدادات البريد</font></td>

          </tr>
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
          <tr>
            <td   align="right" ><select name="mailserver" class="newinput">
                <option value="php" <?php if($adminsetting['mailserver']=="php") { echo "selected='selected'"; }?>   >Mail Function</option>
                <option value="sendmail"  <?php if($adminsetting['mailserver']=="sendmail") { echo "selected='selected'"; }?>  >SendMail</option>

                <option value="smtp"  <?php if($adminsetting['mailserver']=="smtp") { echo "selected='selected'"; }?>   >smtp</option>
              </select></td>
            <td class="myselect">وسيلة الارسال</td>
          </tr>
          <tr>
            <td   align="right" ><input type="text" size="30" name="frommail" class="newinput" value="<?php echo $adminsetting['frommail'];?>" dir="rtl" ></td>
            <td class="myselect">بريد الارسال</td>

          </tr>
          <tr>
            <td   align="right" ><input type="text" size="30" name="fromname" class="newinput" value="<?php echo $adminsetting['fromname'];?>" dir="rtl" ></td>
            <td class="myselect">أسم الراسل</td>
          </tr>
          <tr>
            <td   align="right" ><input type="text" size="30" name="path_sendmail" value="<?php echo $adminsetting['path_sendmail'];?>" class="newinput" value="99" dir="rtl" ></td>
            <td class="myselect">( SendMail ) مسار</td>

          </tr>
          <tr>
            <td   align="right" ><input type="text" size="30" name="smtphost" class="newinput" value="<?php echo $adminsetting['smtphost'];?>" dir="rtl" ></td>
            <td class="myselect"> ( SMTP ) خادم</td>
          </tr>
          <tr>
            <td   align="right" ><input type="text" size="5" name="smtpport" class="newinput" value="<?php echo $adminsetting['smtpport'];?>" dir="rtl"  style="width:20%"></td>
<td class="myselect">رقم البورت</td>
          </tr>
          <tr>
            <td   align="right" ><input type="text" size="15" name="smtpuser" class="newinput" value="<?php echo $adminsetting['smtpuser'];?>" style="width:30%"  dir="rtl"></td>
            <td class="myselect">( SMTP ) مستخدم</td>
          </tr>
          <tr>
            <td   align="right" ><input   type="password" size="15" name="smtppass" class="newinput" value="<?php echo $adminsetting['smtppass'];?>" dir="rtl"  style="width:30%"></td>
            <td class="myselect">( SMTP ) كلمة المرور</td>

          </tr>
          
          
          
 <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
 <tr>
            <td   align="right" ></td>
            <td class="myselect"><font color="#FF3300">إعدادات الكاش</font></td>

          </tr>
          <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"  align="right"></td>
          </tr>
          <tr>
            <td   align="right" ><select name="cache" class="newinput" style="width:100px">
                
                <option value="NO" <?php if($adminsetting['cache']=="NO") { echo "selected='selected'"; }?>>لا </option>

                <option value="YES" <?php if($adminsetting['cache']=="YES") { echo "selected='selected'"; }?>> نعم  </option>
              </select></td>
            <td class="myselect">كاش</td>
          </tr>    
          
               <tr>
            <td   align="right" class="myselect" >دقائق 	<input type="text" size="20" name="cache_time" class="newinput" value="<?php echo $adminsetting['cache_time'];?>" style="width:20%"></td>
            <td class="myselect">وقت الكاش</td>
          </tr>  
          
      
      
      
      
  <tr>
            <td   height='1' bgcolor='#CCCCCC' colspan="2"   align="right"></td>
          </tr>
          <input type="hidden" value="Send" name="IsPost">
          <tr>
            <td  align="center" colspan="2" >
            
 
  <input type="submit" value="  حفظ البيانات  " class="button"></td>
          </tr>
          
        </table>

    </form>
 
 </td></tr></table>
 
 
 
 
 
 
 
 
 
 
 
 
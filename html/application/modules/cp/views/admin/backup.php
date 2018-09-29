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
 <option class="myoption"     value="<?php echo base_url("cp/admin/listbackup");?>">أرشيف النسخ الاحتياطية</option>
<option   class="myoption"  selected="selected" 
value="<?php echo base_url("cp/admin/backup");?>" >نسخة إحتياطية</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">نسخة إحتياطية</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/server.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
<!-- /**********************************/-->




  <?php
 $this->load->library('Msg');
 if($backup=='ok'){
 echo $this->msg->SendMsg(' قاعدة البيانات ','  تم إنشاء النسخة الاحتياطية  ',1);
 }
 
 
 ?>

  <form method="post" name="form_3" enctype="multipart/form-data">
 <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td class="myselect" colspan="2" align="right">من فضلك أختار نوع النسخة</td></tr>
<tr>
 <td align="right"class="blocks" >
  
 <table align="right" width="100%"> 
 <tr>

 
  <td width="64%"  align="right"class="myselect">GZ</td>
  <td width="5%"><input type="radio" name="r1" value="gz"   class="newinput"></td>
  
 <td width="27%" align="right" class="myselect">Sql</td>
  <td width="4%"><input type="radio" name="r1" value="txt" checked="checked" class="newinput"></td>
 </tr>
  </table>
 
</td>

<td align="right"  class="blocks" width="30%" >
 
</td>

</tr>

 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 
      <input type="hidden" value="backup" name="IsPost">
          <tr>
            <td  align="center"  colspan="2"><input type="submit" value=" إنشاء النسخة الاحتياطية" class="button"></td>
          </tr>
          
        </table>

    </form>














 
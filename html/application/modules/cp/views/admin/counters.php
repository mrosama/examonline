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
 <option class="myoption"    selected="selected"  value="<?php echo base_url("cp/admin/counters");?>">إعداد عداد الزوار</option>
<option  class="myoption" 
value="<?php echo base_url("cp/admin/vistor");?>" >زوار الموقع</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">إعداد عداد الزوار</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon_user2.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 
 
 
 
 
  
 <?php
 if( $updatecounters==true ){
  $this->load->library('Msg');
   echo $this->msg->SendMsg(' عدد الزوار ','   تم حفظ البيانات بنجاح  ',1);
 }
 
 ?>
 
 <table align="center" width="100%">
 <tr><td>
 
  <form method="post" name="form_2">
        <table width="99%" border="1"    cellpadding="0" cellspacing="4" class="border_table1" >
          <tr>
 <td align="right"    class="myselect">
 0123456789
</td>

 <td align="right" class="myselect" >
 Normal
</td>
 <td class="blocks"><input type="radio"    name="r1" value="normal"  class="text_field" 
 <?php if(@$admincounters['type_counter']=='normal'){ echo 'checked="checked" ' ;} ?>   ></td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>
  

 <tr>
 <td align="right" class="myselect">
 <img src="<?php echo base_url('bin/counter/style1/style1.gif')?>" border="0">
</td>
 <td align="right" class="myselect" >

 Style1
</td>
 <td class="blocks"><input type="radio"   name="r1" value="style1"  class="text_field"
  <?php if(@$admincounters['type_counter']=='style1'){ echo 'checked="checked" ' ;} ?>    ></td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>
 
 
  <tr>
 <td align="right" class="myselect">
 
 <img src="<?php echo base_url('bin/counter/style2/style2.gif')?>" border="0">
</td>
 <td align="right"  class="myselect" >
  Style2

</td>
 <td class="blocks"><input type="radio"   name="r1" value="style2"  class="text_field"  
 <?php if(@$admincounters['type_counter']=='style2'){ echo 'checked="checked" ' ;} ?>  ></td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>
 
 
  <tr>
 <td align="right" class="myselect">
 
 
  <img src="<?php echo base_url('bin/counter/style3/style3.gif')?>" border="0">
</td>
 <td align="right"  class="myselect"  >
 Style3
</td>

 <td class="blocks"><input type="radio"   name="r1" value="style3"  class="text_field" 
 <?php if(@$admincounters['type_counter']=='style3'){ echo 'checked="checked" ' ;} ?>    ></td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>
 
 
   <tr>
 <td align="right"  class="myselect" >
 
 <img src="<?php echo base_url('bin/counter/style4/style4.gif')?>" border="0">
</td>
 <td align="right"  class="myselect"  >
 Style4
</td>
 <td class="blocks"><input type="radio"   name="r1" value="style4"  class="text_field"
 <?php if(@$admincounters['type_counter']=='style4'){ echo 'checked="checked" ' ;} ?>      /></td></tr>

 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>
 
 
    <tr>
 <td align="right"  class="myselect">
<textarea cols="70" rows="4" class="newinput" name="code"><?php echo @$admincounters['code'] ;?>  </textarea>
</td>
 <td align="right" class="myselect"  >
 Custom Code
</td>

 <td class="blocks"><input type="radio"   name="r1" value="custome"  class="text_field" <?php if(@$admincounters['type_counter']=='custome'){ echo 'checked="checked" ' ;} ?>    ></td></tr>

 
 
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>


   <tr>
 
 <td align="right"     colspan="2" >
<input type="text" value="<?php echo @$admincounters['counter'];?>" name="counter" size="30"  class="newinput" style="width:30%"/>
</td>
 <td class="myselect" align="right">عداد الزوار</td></tr>
 
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="3"></td></tr>
      <input type="hidden" value="counter" name="IsPost">
          <tr>
            <td  align="center"  colspan="3"><input type="submit" value="حفظ البيانات" class="button"></td>
          </tr>
          
        </table>

    </form>
 
 </td></tr></table>
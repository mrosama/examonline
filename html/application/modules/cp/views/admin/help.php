<?php
$this->load->helper('html');
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");

$this->load->library("Configer");
  $defaultSetting=$this->configer->getConfiger();
 ?>
 <SCRIPT type=text/javascript src="<?php echo $base;?>/js/rounded_corners_lite.inc.js"></SCRIPT>
 
 <link href="<?php echo $base; ?>/css/<?php echo  $defaultSetting['admin_style'];?>" rel="stylesheet" type="text/css" media="all" />
 
 
 
  <table width="99%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
 </TD>
    <TD width='20%'  height="20px"><br/> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">مساعدة</TD>
        <TD width=10>
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/Help-copy.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 <table width="99%" border="1"  align="right"     cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td class="myselect" >
 <br/>
 Technical support or tech support refers to a range of services by which enterprises provide assistance to users of technology products such as mobile phones, televisions, computers, software products or other electronic or mechanical goods. In general, technical support services attempt to help the user solve specific problems with a product—rather than providing training, customization, or other support services. Most companies offer technical support for the products they sell, either freely available or for a fee. Technical support may be delivered over the telephone or online by e-mail or a web site or a tool where users can log a call/incident. Larger organizations frequently have internal technical support available to their staff for computer related problems. The internet is also a good source for freely available tech support, where experienced users may provide advice and assistance with problems. In addition, some fee-based service companies charge for premium technical support services.</td>
 </tr>
 
 
 </table>
 
 
 
 
 <script type="text/javascript">
settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
</script>
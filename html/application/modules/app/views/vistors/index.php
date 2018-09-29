<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");
 ?>

<!--<a href="http://s05.flagcounter.com/more/luc"><img src="http://s05.flagcounter.com/count/luc/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_12/viewers_3/labels_0/pageviews_0/flags_0/" alt="المتواجدون الان" border="0"></a><br><a href="http://www.flagcounter.com/"> </a>-->



<!--<table align="center" width="100%" border="0" cellpadding="0" cellspacing="3" dir="rtl">-->
<?php
/*$this->load->helper('url');
$this->load->helper('html');
$base= base_url("html/application/modules/app/views/layouts/default/");

$timeoutseconds="3600";
$flagscounter=array();
$countryname=array();
$time=time();

$timeout=$time-$timeoutseconds;
//get ip
 $PHP_SELF=$_SERVER['PHP_SELF'];
 $REMOTE_ADDR=$this->input->ip_address();
 
$this->db->query("INSERT INTO online VALUES ('$time','$REMOTE_ADDR','$PHP_SELF')");
$this->db->query("DELETE FROM online WHERE time<$timeout");
//////////////////////////////
$resultonline=$this->db->query("SELECT DISTINCT ip FROM online WHERE file='$PHP_SELF'");
$user=$resultonline->num_rows();

$query=$this->db->query("SELECT * FROM online WHERE file='$PHP_SELF' GROUP BY ip");

foreach ($query->result_array() as $result){

$sql_ip=@$this->db->query("SELECT * FROM ips WHERE ips < INET_ATON('$result[ip]') ORDER BY ips DESC LIMIT 1");

$result_ip=$sql_ip->row_array();

$sql_country=@$this->db->query("SELECT * FROM countries WHERE code='".$result_ip['code']."' ");
$result_country=$sql_country->row_array();

$code=@$result_country['code'];


if($code=="")
{
if(!isset($flagscounter["unknown"]))
{
$flagscounter["unknown"]=1;
$countryname["unknown"]="غير معروف";
}else{
$flags["unknown"]++;
}
}else{
if(!isset($flagscounter[$code]))
{
$flagscounter[$code]=1;
$countryname[$code]=$result_country['country'];
}else{
$flagscounter[$code]++;
}
}








//////////////////////
}
$countertd=0;
foreach($flagscounter as $code => $counter)
{
$countertd++;
$country=@$countryname[$code];
?>
<tr><td  align="" class="myselect">(<?php echo $counter;?>)</td><td><?php echo img(array('src'=>base_url("bin/flags/$code.jpg"))); ?></td></tr>
<tr><td colspan="2"  height="1px" bgcolor="#EFEFEF" ></td></tr>


<?php


}
*/
?>

 
 
 
 <table align="center" width="100%" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><?php echo @$num_user;?></td>
    <td align="right">ألاعضاء</td>
    <td width="1%"><img src="<?php echo $base;?>/img/user.png"></td>
  </tr>
  <tr>
    <td align="center"><?php echo @$num_vistor;?></td>
    <td align="right">الزوار</td>
    <td width="1%"><img src="<?php echo $base;?>/img/user.png"></td>
  </tr>
  <tr>
    <td align="center"><?php echo @$num_total;?></td>
    <td align="right">ألاجمالي</td>
    <td width="1%"><img src="<?php echo $base;?>/img/user.png"></td>
  </tr>
</table>

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Msg {

 /*
 Warning  3
 Notice  2
 Apply  1
 */


 
public function SendMsg($title,$msg,$type){

$CI2 =& get_instance(); 
$CI2->load->helper('url');
$CI2->load->helper('file');

switch($type){
case "3":
$content=read_file('bin/FlashMessage/Warning.dat');
$Icon=base_url('bin/FlashMessage/icon13.gif');
break;
case "2":
$content=read_file('bin/FlashMessage/Notice.dat');
$Icon=base_url('bin/FlashMessage/warning.png');
break;
case "1":
$content=read_file('bin/FlashMessage/Apply.dat');
$Icon=base_url('bin/FlashMessage/icon-16-checkin.png');
break;
}
$content1=str_replace("{_TITLE}",$title,$content);
$flash__=str_replace("{_MSG}",$msg,$content1);
$msg=str_replace("{_ICON}",$Icon,$flash__);
return $msg;

}
 



}
?>
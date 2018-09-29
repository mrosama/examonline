<?php
class Https {



 
	



   /**
   * ::roleAccess() -   Authenticate user   
   * @param account Array ,associated array account users array('User1'=>'pass1')
   * @return boolean
   */

public function roleAccess($account=array()){
$login_successful = false;
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
{
$usr = $_SERVER['PHP_AUTH_USER'];
$pwd = $_SERVER['PHP_AUTH_PW'];
 foreach($account as $key=>$value){
 if($usr == $key && $pwd == $value){
 $login_successful = true;
 break;
 }
  }
}
 if (!$login_successful)
{
    header('WWW-Authenticate: Basic realm="Secret page"');
    header('HTTP/1.0 401 Unauthorized');
    print "Login failed!\n";
}
}




  /**
   *::Download() Download File.......
   *@param file string Filename &path file;
   *@return string 
   */ 
 
public function download( $file )
{
 header( "Pragma: public");
 header( "Expires: 0");
 header( "Cache-Control: must-revalidate, post-check=0, pre-check=0");
 header( "Accept-Ranges: none");
 header( "Content-Type: application/force-download");
 header( "Content-Type: application/octet-stream");
 header( 'Content-Disposition: attachment; filename="'. basename($file) .'"');
 header( "Content-Length: ". filesize($file));
 header( "Content-Transfer-Encoding: binary");
 header( "Content-Description: File Transfert");
 readfile( $file );
exit;
 
    } 
 
 
 public function download_($filename)
{
header("Content-Disposition: attachment; filename=" . basename($filename) . ";"); 
header("Content-type: application/download"); 
readfile($filename);
}

 
 
 
   /**
   *::__Download() Download File  by depend on speed limit. ......
   *@param file string Filename &path file;
   *@param download_rate Int speed download by KB
   *@return string 
   */ 
 
 
 
public function __Download($file,$download_rate=30){

header('Cache-control: private');
header('Content-Type: application/octet-stream');
header('Content-Length: '.filesize($file));
header('Content-Disposition: filename="'. basename($file) .'"');
flush();
$file = fopen($file, "r");
while(!feof($file))
{
echo fread($file, round($download_rate * 1024));
flush();
sleep(1);
}
fclose($file);



}




public function UserInfo(){


return get_browser(null, true);


}



 // : allow_url_fopen must be turned on

 function http_test_existance($url) {
     return (($fp = @fopen($url, 'r')) === false) ? false : @fclose($fp);
 }







  /**
   *::SetCookie()  Function save cookie in client user...
   *@param name string cookie name 
   *@param valie string  cookie value 
   *@param Expire time time in houre
   *@see SetCookie  Function
   *@return boolean true
   */ 


public function SetCookie($name,$val,$expire='1'){
$calexpire=3600*$expire;
$check=@setcookie($name, $val, time()+$calexpire);
return $check;
}   
 
 
 
 
   /**
    *::GetCookie() Get Cookie value  Function  restore cookie in client user...
    *@param name string cookie name 
    *@see SetCookie  Function
    *@return string 
    */ 
 
public function GetCookie($name){
 return @$_COOKIE["$name"];
} 
 
 
   /**
    *::delCookie() delete Cookie   Function  delete cookie in client user...
    *@param name string cookie name 
    *@see SetCookie  Function
    *@return boolean true
    */  
public function delCookie($name){
 @setcookie($name,'', time()-3600);
}  
 





/* @get the full url of page
 *
 * @return string
 *
 */
public  function getAddress()
 {
 
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
 
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 }








public function BrowserInfo()
{
 $browser = array ( //reversed array
  "OPERA",
  "MSIE",            // parent
  "NETSCAPE",
  "FIREFOX",
  "SAFARI",
  "KONQUEROR",
  "MOZILLA"        // parent
 );
 
 $info[browser] = "OTHER";
  
 foreach ($browser as $parent)  
 {
  if ( ($s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent)) !== FALSE )
  {            
    $f = $s + strlen($parent);
    $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 5);
    $version = preg_replace('/[^0-9,.]/','',$version);
              
    $info[browser] = $parent;
    $info[version] = $version;
    break; // first match wins
  }
 }
 
 return $info['browser'];
}






public function PlatformInfo() {
$curos=strtolower($_SERVER['HTTP_USER_AGENT']);
$uip=$_SERVER['REMOTE_ADDR'];
$uht=gethostbyaddr($_SERVER['REMOTE_ADDR']);
if (strstr($curos,"mac")) {
$uos="MacOS";
} else if (strstr($curos,"linux")) {
$uos="Linux";
} else if (strstr($curos,"win")) {
$uos="Windows";
} else if (strstr($curos,"bsd")) {
$uos="BSD";
} else if (strstr($curos,"qnx")) {
$uos="QNX";
} else if (strstr($curos,"sun")) {
$uos="SunOS";
} else if (strstr($curos,"solaris")) {
$uos="Solaris";
} else if (strstr($curos,"irix")) {
$uos="IRIX";
} else if (strstr($curos,"aix")) {
$uos="AIX";
} else if (strstr($curos,"unix")) {
$uos="Unix";
} else if (strstr($curos,"amiga")) {
$uos="Amiga";
} else if (strstr($curos,"os/2")) {
$uos="OS/2";
} else if (strstr($curos,"beos")) {
$uos="BeOS";
} else { $uos="[?]EgzoticalOS";
}

return $uos;
}


















}














?>
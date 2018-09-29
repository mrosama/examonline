<?php

class Networks {



private $address;



public function ShowIP(){
if(getenv('HTTP_X_FORWARDED_FOR')){
$ip=getenv('HTTP_X_FORWARDED_FOR');
}
elseif (getenv('HTTP_CLIENT_IP')){
$ip=getenv('HTTP_CLIENT_IP');
}
elseif(getenv('REMOTE_ADDR')) {
$ip=getenv('REMOTE_ADDR');
} 
 else {
$ip=$_SERVER['REMOTE_ADDR']; 
 }
 return $ip;
}   
 



      /**
       * ::remoteFile() -   Read file from server
       * @param url   string  path file
       * @return string
       */ 
 
public function remoteFile($url){
if(function_exists('curl_init')){
$curl = @curl_init(); 
$timeout = 0;
@curl_setopt ($curl, CURLOPT_URL, $url); 
@curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true); 
@curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, $timeout); 
$buffer = @curl_exec($curl); 
@curl_close($curl); 
return $buffer;
}elseif(function_exists('file_get_contents')){
$buffer = @file_get_contents($url); 
return $buffer;
}elseif(function_exists('file')){
$buffer = @implode('',@file($url)); 
return $buffer;
}else{
return false;
}
}
 



    /**
     * ::ServerInfo() -  get info about server
     * @return string
     */ 
 public function ServerInfo(){
 return phpinfo();
}  




   /**
   * ::Apacheinfo() -   Show Apacheinfo
   * @param att  (M,V,U) string  type info from apache
   * @param uri    string  filename form lookup
   * @return string
   */ 
  public function Apacheinfo($att,$uri=''){
 
switch($att){
case "M":
$appserv= apache_get_modules() ;
return $appserv;
break;
case "V":
$appserv=  apache_get_version ();
return $appserv;
break;
case "U":
 $appserv= apache_lookup_uri($uri);
 return $appserv;
break;
} 
  
}  
 




 /**
  *::Redirect() function To Redirect
  *@param address string  Redirect Url
  *@return Boolean True 
  */
public function Redirect($address){
$this->address=$address;

if(!headers_sent()){
header("location:$this->address");
return true;
}  
else {
echo "<script type=\"text/javascript\">window.location.href=$this->address</script>";
echo "<meta http-equiv=\"refresh\" content=\"0;url=$this->address\">";
return true;
}
}













}






?>
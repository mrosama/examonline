<?php

class FileSystems {


private $filetowrite;
private $filemod;
private $filecontent;
private $filetoread;
private $dirs; 



 


/**
 *::WriteFile()  function To Write new file
 *@param filetowrite string
 *@param filemod  string  Read,write, append 'w,w+,a,a+,r,r+,rb 
 *@return boolean
 */ 
 
public function WriteFile($filetowrite,$filecontent,$filemod='w+'){

$this->filetowrite=$filetowrite;
$this->filemod=$filemod;
$this->filecontent=$filecontent;
if(function_exists('fopen')){

if (!$fp = fopen($this->filetowrite,$this->filemod)) {
throw new Exception($this->Err);
exit;
    }
 if (fwrite($fp, $this->filecontent) === FALSE) {
throw new Exception($this->Err);
        exit;
    }
 fclose($fp);
  return true;
}  

else {
$fp=new SplFileObject($this->filetowrite,$this->filemod);
$fp->fwrite($this->filecontent);
$fp->fclose($fp);
 return true;
}


} 
 
 
 
 /**
  *::ReadFile() function To Open  file
  *@param filetowrite string
  *@param filemod string  Read,write, append 'w,w+,a,a+,r,r+,rb
  *@return string
*/ 
 
 public function ReadFile__($filetoread,$filemod='r'){

$this->filetoread=$filetoread;
$this->filemod=$filemod;
$out='';
if(file_exists($this->filetoread)){

if(function_exists('fopen')){

$fp=fopen($this->filetoread,$this->filemod);

while(!feof($fp)){
$out.=fread($fp,1024);
}
fclose($fp);
return $out;
} 

else {
$fp=new SplFileObject($this->filetoread);
foreach($fp as $line){
$out.=$line;
}

return $out;
}
}
else {
 return false;

 }

} 
 
 
 /**
  *Mysql::FormatSize() function To Format size  file
  *@param size Int File size
  *@return string
  */  
 
public function FormatSize($fileSize)
{
$count = 0;
$format = array("Bytes","KB","MB","GB","TB","PB","EB","ZB","YB");
while($fileSize>1024 && $count<9)
{
$fileSize=$fileSize/1024;
$count++;
}
$return = number_format($fileSize,2,'.',',')." <font color=red>".$format[$count]."</font>";
return $return;
}
 

 /**
  *::__FormatSize() alies function To Format size  file
  *@param size Int File size
  *@return string
  */  


public  function __FormatSize($fileSize)
{

$byteUnits = array(" GB"," MB"," KB"," bytes");

if($fileSize >= 1073741824)
{
$fileSize = round($fileSize / 1073741824 * 100) / 100 . $byteUnits[0];
}
elseif($fileSize >= 1048576)
{
$fileSize = round($fileSize / 1048576 * 100) / 100 . $byteUnits[1];
}
elseif($fileSize >= 1024)
{
$fileSize = round($fileSize / 1024 * 100) / 100 . $byteUnits[2];
}
else
{
$fileSize = $fileSize . $byteUnits[3];
}
return $fileSize;
}
 
 
  /**
  *::dir_size()  function to get folder size
  *@param path string File path
  *@return int
  */  
 
 
public function dir_size($path)
{
    $size = 0;

    $dir = opendir($path);
    if (!$dir){return 0;}

    while (($file = readdir($dir)) !== false) {

        if ($file[0] == '.'){ continue; }

        if (is_dir($path.$file)){
            // recursive:
            $size += dir_size($path.$file.DIRECTORY_SEPARATOR);
        }
        else {
            $size += filesize($path.$file);
        }
    }

    closedir($dir);
    return $size;
} 
 
 
 /**
 *::ReadDir() function To read all file in dir
 *@param   dirs  string directory String
 *@return array
*/  

public function ReadDir($dirs) {

$this->dirs=$dirs;

 if ($handle = opendir("$dirs")) {
   while (false !== ($item = readdir($handle))) {
     if ($item != "." && $item != "..") {
       if (is_dir("$dirs/$item")) {
 
         $this->ReadDir("$dirs/$item");
		 
       } else {
          $arrdir[]="$dirs/$item";
 //view file
       }
     }
   }
   closedir($handle);
 
 
 }
 return $arrdir;
}



public function __ReadDir($dirs) {

$this->dirs=$dirs;

 if ($handle = opendir("$dirs")) {
   while (false !== ($item = readdir($handle))) {
     if ($item != "." && $item != "..") {
    {
          $arrdir[]="$dirs/$item";
 //view file
      }
     }
   }
   closedir($handle);
 
 
 }
 return $arrdir;
}

 
 /**
  *Mysql::DeleteDir() function To delete all file in dir
  *@param   dirs  string directory String
  *@return boolean
  */  

public function DeleteDir($dirs) {
 
 if ($handle = opendir("$dirs")) {
   while (false !== ($item = readdir($handle))) {
     if ($item != "." && $item != "..") {
       if (is_dir("$dirs/$item")) {
         $this->DeleteDir("$dirs/$item");
       } else {
         @unlink("$dirs/$item");
        }
     }
   }
   closedir($handle);
   rmdir($dirs);
 
 }
}
 

 /**
  *::removeFolder() function To delete  directory
  *@param   dirs  string directory String
  *@return boolean
  */  


public function removeFolder($dir)
{
if(!is_dir($dir))
return false;

for($s = DIRECTORY_SEPARATOR, $stack = array($dir), $emptyDirs = array($dir); $dir = array_pop($stack);){
if(!($handle = @dir($dir)))
continue;
while(false !== $item = $handle->read())
$item != '.' && $item != '..' && (is_dir($path = $handle->path . $s . $item) ?
array_push($stack, $path) && array_push($emptyDirs, $path) : unlink($path));
$handle->close();
}
for($i = count($emptyDirs); $i--; rmdir($emptyDirs[$i]));

}




////

  /**
   *::ConvertEncode() Convert String Between utf-8 or ISO-8859-1 or windows-1256
   *@param in_encoding string Encoding Type ;
   *@param out_encoding string  Encoding Type want to convert to ;
   *@param str string;
   *@return string Converting
   */ 
 
public function ConvertEncode($in_encoding,$out_encoding,$str){
$result=@iconv($in_encoding,$out_encoding,$str);
return $result;
}  
 





   /**
    *::File_extension() get File Exetention.......
    *@param filename string Filename &path file;
    *@return string 
    */
 
public function File_extension($filename){

$exe=end(explode(".","$filename")); 

return  $exe;
 
}  


   /**
    *::__File_extension()  alies function get File Exetention.......
    *@param filename string Filename &path file;
    *@return string 
    */

function __File_extension($filename)
{
$path_info = @pathinfo($filename);
return $path_info['extension'];
}





public function ReadRss($url){

$filerss=$this->remoteFile($url);
$xml= new SimpleXMLElement($filerss);
$rss=$xml->xpath('//item');
 if(is_array($rss)){
 return $rss;
 }
 return false;
}  






    /**
     * ::ReadXml() -   Read xml file
     * @param filename   string  path file xml
     * @return Object
     */ 
public function ReadXml($filename){

$Chexe=strtoupper($this->File_extension($filename));
if($Chexe=="XML")
{
$Obj=simplexml_load_file($filename);
return $Obj;
} 
else {
return false;
}
 
} 


     /**
     * ::ReadJson() -   Read json file
     * @param filename   string  path file xml
     * @return array
     */ 
 
public function ReadJson($filename){

if(file_exists($filename)){
$file=file_get_contents($filename); 
$json=json_decode($file);
return $json;
 } else {
 return false;
 }
} 






  /**
   * ::Quote() - prepare string to inserted or updated in the database
   * @param string $string
   * @return string
   */
   
	public function Quote($string = null) {
        return ($string === null) ? 'NULL' : "'" . str_replace("'", "''", $string) . "'";
    }




/**
*
* Function to make URLs into links
*
* @param string The url string
*
* @return string
*
**/
function makeLink($string){
$string = preg_replace("/([^\w\/])(www\.[a-z0-9\-]+\.[a-z0-9\-]+)/i", "$1http://$2",$string);
$string = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i","<a target=\"_blank\" href=\"$1\">$1</A>",$string);
$string = preg_replace("/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?))/i","<A HREF=\"mailto:$1\">$1</A>",$string);
return $string;
}





   /**
    * ::text2links() - convert all link to html link and active it
    * @param str  string
    * @return string
    */	

public function text2links($str = '')
{
if($str=='' or !preg_match('/(http|www\.|@)/i', $str)) { return $str; }
$lines = explode("\n", $str);
$new_text = '';
while (list($k,$l) = each($lines))
{
$l = preg_replace("/([ \t]|^)www\./i", "\\1http://www.", $l);
$l = preg_replace("/([ \t]|^)ftp\./i", "\\1ftp://ftp.", $l);

$l = preg_replace("/(http:\/\/[^ )\r\n!]+)/i",
"<a href=\"\\1\">\\1</a>", $l);

$l = preg_replace("/(https:\/\/[^ )\r\n!]+)/i",
"<a href=\"\\1\">\\1</a>", $l);

$l = preg_replace("/(ftp:\/\/[^ )\r\n!]+)/i",
"<a href=\"\\1\">\\1</a>", $l);

$l = preg_replace(
"/([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))/i",
"<a href=\"mailto:\\1\">\\1</a>", $l);
$new_text .= $l."\n";
}

return $new_text;
}






 
    /**
    *::fix_badwords() - Filter all bad words
    *@param str  string text want to filter
    *@param bad_words  string with bad words  fuck,shit,paragraph
    *@param replace_str  string ,*
    *@return string
    */	

public function fix_badwords($str, $bad_words, $replace_str='')
{
    if (!is_array($bad_words)){ $bad_words = explode(',', $bad_words); }
    for ($x=0; $x < count($bad_words); $x++)
    {
        $fix = isset($bad_words[$x]) ? $bad_words[$x] : '';
        $_replace_str = $replace_str;
        if (strlen($replace_str)==1)
        {
            $_replace_str = str_pad($_replace_str, strlen($fix), $replace_str);
        }
        $str = preg_replace('/'.$fix.'/i', $_replace_str, $str);
    }
    return $str;
} 
 
 /////
 
     /**
    *::str_to_hex() -Convert string to hex
    *@param string  string text  
    *@return string
    */	
 
public function str_to_hex($string){
    $hex='';
    for ($i=0; $i < strlen($string); $i++){
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}




     /**
      *::hex_to_str() -Convert hex to string
      *@param hex  string text  
      *@return string
      */	
public function hex_to_str($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}





       /**
      *::showFile() -Show file by type
      *@param target string  target dir
	  *@param typefile  string    {*.jpeg,*.jpeg,*.png,*.gif}
      *@return array
      */	
 
public function showFile($target,$typefile){
  foreach(glob("$target/$typefile",GLOB_BRACE) as $filename){
 $files[]=basename($filename);
 }
  return  $files;
 }



public function highlight_words($word, $subject) {
if (is_array($word)) {
$regex_chars = "*|#.+?(){}[]^$/";
for ($j = 0; $j < count($word); $j++) {
for ($i = 0; $i < strlen($regex_chars); $i++) {
$char = substr($regex_chars, $i, 1);
$word[$j] = str_replace($char, '\\'.$char, $word[$j]);
}
$subject = preg_replace("/(".$word[$j].")/is", "<span style='background-color:yellow;font-weight:bold;padding-left:2px;padding-right:2px'>\\1</span>", $subject);
}
}
return $subject;
}
 




public function div_words($text){
$MText=wordwrap($text, 20, "<br />\n");
return nl2br($MText);
} 
 
/////////////////////////////////////////////

/*
* convert xml 2 array
*/

function xml2array($xml)
{
$xmlary = array();

$reels = '/<(\w+)\s*([^\/>]*)\s*(?:\/>|>(.*)<\/\s*\\1\s*>)/s';
$reattrs = '/(\w+)=(?:"|\')([^"\']*)(:?"|\')/';

preg_match_all($reels, $xml, $elements);

foreach ($elements[1] as $ie => $xx) {
$xmlary[$ie]["name"] = $elements[1][$ie];

if ($attributes = trim($elements[2][$ie])) {
preg_match_all($reattrs, $attributes, $att);
foreach ($att[1] as $ia => $xx)
$xmlary[$ie]["attributes"][$att[1][$ia]] = $att[2][$ia];
}

$cdend = strpos($elements[3][$ie], "<");
if ($cdend > 0) {
$xmlary[$ie]["text"] = substr($elements[3][$ie], 0, $cdend - 1);
}

if (preg_match($reels, $elements[3][$ie]))
$xmlary[$ie]["elements"] = xml2array($elements[3][$ie]);
else if ($elements[3][$ie]) {
$xmlary[$ie]["text"] = $elements[3][$ie];
}
}

return $xmlary;
}




public function directorySize($directory)
{
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file)
    {
        $size += $file->getSize();
    }
    return $size;
}



 

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






















}














?>
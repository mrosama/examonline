<?php


class Encryptions {



private  $pattern="0123456789abcdefghijklmonpqrstyvwxyz!@%&()*/-";


public function makePassword($len = 8)
{
        $vowels = array('a', 'e', 'i', 'o', 'u', 'y');
        $confusing = array('I', 'l', '1', 'O', '0');
        $replacements = array('A', 'k', '3', 'U', '9');
        $choices = array(0 => rand(0, 1), 1 => rand(0, 1), 2 => rand(0, 2));
        $parts = array(0 => '', 1 => '', 2 => '');

        if ($choices[0]) $parts[0] = rand(1, rand(9,99));
        if ($choices[1]) $parts[2] = rand(1, rand(9,99));

        $len -= (strlen($parts[0]) + strlen($parts[2]));
        for ($i = 0; $i < $len; $i++)
        {
                if ($i % 2 == 0)
                {
                        do $con = chr(rand(97, 122));
                        while (in_array($con, $vowels));
                        $parts[1] .= $con;
                }
                else
                {
                        $parts[1] .= $vowels[array_rand($vowels)];
                }
        }
        if ($choices[2]) $parts[1] = ucfirst($parts[1]);
        if ($choices[2] == 2) $parts[1] = strrev($parts[1]);

        $r = $parts[0] . $parts[1] . $parts[2];
        $r = str_replace($confusing, $replacements, $r);
        return $r;
}




   /**
  *alterbate::makePassword()  function makePassword
  *@return string random string 
  */
public  function makePassword__()
{
$salt = "R1aQ2qW3wE4eT5rY6tU7yI8uP9iLKoJHpGFDSAZXCVBNM";
srand((double)microtime()*1000000);
$i = 0;
while ($i <= 6)
{
$num = rand() % 30;
$tmp = substr($salt, $num, 1);
$pass = $pass . $tmp;
$i++;
}
return $pass;
}




  /**
  *::randomkey() function To get randomkey
  *@param  len  int  key length   
  *@return string
  */   
 
public  function randomkey($len){
 for($i=0;$i<$len;$i++){
$key.=$this->pattern{rand(0,44)};
 }
 return $key;
 }




























}















?>
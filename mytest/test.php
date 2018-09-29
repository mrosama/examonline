<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$arr=array('100','200','300','400');
foreach($arr   as $key=>$val){
$f[]="r_$val";

}
//print_r($f);


$exam=array();

if(@$_POST['submit']){

 $len=count($arr);
 $data=$_POST;
 
foreach($arr as $key=>$val){
$answer=array();
$answer2=array();

@$question[]=$val;
if(in_array(@$_POST["r_$val"],$data)){
@$answer[]=$_POST["r_$val"];
}

////
if(@$_POST["c_$val"]){
$lens=count($_POST["c_$val"]);
$BI=$_POST["c_$val"];
for($j=0;$j<$lens;$j++){
@$answer2[]=$BI[$j];
}

}

 $r=array_merge($answer,$answer2);
$t=implode(',',$r);
////////////////////////////
$exam[$key]['Q']=$val;
$exam[$key]['A']=$t;






} 
 
////////////////////////////////////

/*
print_r($question);
echo "<hr>";
print_r($answer);
echo "<hr>";
print_r($answer2);
*/
}



if(is_array($exam)){
for(@$i=0;$i<count($exam);$i++){
echo @$exam[$i]['Q']."||".$exam[$i]['A']."<br/>";
}
}
 
 

?>






<form method="post">
<b>what is A</b>
<li>A<input type="radio" value="1" name="r_100"></li>
<li>B<input type="radio" value="2" name="r_100"></li>
<li>C<input type="radio" value="3" name="r_100"></li>
<li>D<input type="radio" value="4" name="r_100"></li>
<hr>
<input type="hidden" value="100" name="Q[]">

<b>what is b</b>
<li>A<input type="radio" value="5" name="r_200"></li>
<li>B<input type="radio" value="6" name="r_200"></li>
<li>C<input type="radio" value="7" name="r_200"></li>
<li>D<input type="radio" value="8" name="r_200"></li>
<hr>
<input type="hidden" value="200" name="Q[]">

<b>what is C</b>
<li>A<input type="checkbox" value="9" name="c_300[]"></li>
<li>B<input type="checkbox" value="10" name="c_300[]"></li>
<li>C<input type="checkbox" value="11" name="c_300[]"></li>
<li>D<input type="checkbox" value="12" name="c_300[]"></li>
<hr>
<input type="hidden" value="300" name="Q[]">


<b>what is D</b>
<li>A<input type="checkbox" value="13" name="c_400[]"></li>
<li>B<input type="radio" value="14" name="r_400"></li>
<li>C<input type="checkbox" value="15" name="c_400[]"></li>
<li>D<input type="radio" value="16" name="r_400"></li>
<hr>
<input type="hidden" value="400" name="Q[]">

<input type="submit" value="submit" name="submit">
</form>


















</body>
</html>

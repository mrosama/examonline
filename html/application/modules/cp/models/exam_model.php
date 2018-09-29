<?php
class Exam_model extends CI_Model {


   public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	
	


public function getCat(){

$query=$this->db->query("select * from `cm_cat` where `com_type`='com_exam' and `cat`=0 order by ID  ");
$row=$query->result_array();
return $row;

}	
	

///////////////////////////////////////////////


public function saveQuestion(){

$cat=$this->input->post("cat");
$question=$this->input->post("question");

$query=$this->db->query("select * from `cm_question` where `question`='$question' ");
$t=$query->num_rows();
if($t==0){

$answer=$this->input->post("answer");
$ktype=$this->input->post("ktype");
$kanswer=$this->input->post("kanswer");
$len=count($answer);

$data1 = array(
   'question' =>$question,
   'cat' =>$cat
);

$this->db->insert('cm_question', $data1); 
$qID=$this->db->insert_id();



for($i=0;$i<$len;$i++){
//echo $answer[$i].":::".$ktype[$i]."::".$kanswer[$i]."<br/>";
$data2 = array(
'question' =>$qID,
'answer' =>$answer[$i],
'ktype' =>$ktype[$i],
'kanswer' =>$kanswer[$i]
);

$this->db->insert('cm_answer', $data2); 

}

return 'OK';

} else {
return 'FOUND';
}


}	
	
	
	
	
	
	
	
	
	
	


public function UpdateQuestion(){

$EA=$this->input->post("EA");
$id=$this->input->post("id");
$cat=$this->input->post("cat");
$question=$this->input->post("question");



$answer=$this->input->post("answer");
$ktype=$this->input->post("ktype");
$kanswer=$this->input->post("kanswer");
$len=count($answer);

$data1 = array(
   'question' =>$question,
   'cat' =>$cat
);
$this->db->where('ID', $id);
$this->db->update('cm_question', $data1); 
 



for($i=0;$i<$len;$i++){
//echo $answer[$i].":::".$ktype[$i]."::".$kanswer[$i]."<br/>";
$data2 = array(
'answer' =>$answer[$i],
'ktype' =>$ktype[$i],
'kanswer' =>$kanswer[$i]
);

$this->db->where('ID', $EA[$i]);
$this->db->update('cm_answer', $data2); 

}

return 'OK';



}	
	
	
	
public function SaveOption(){

$duraction=$this->input->post("duraction");
$numquestion=$this->input->post("numquestion");
$cat=$this->input->post("cat");

$len=count($cat);
for($i=0;$i<$len;$i++){
$data1 = array(
'duration' =>$duraction[$i],
'numquestion' =>$numquestion[$i]
);
$this->db->where('ID', $cat[$i]);
$this->db->update('cm_cat', $data1); 
}

		
///

$allow_report=$this->input->post("allow_report");
$allow_email=$this->input->post("allow_email");	
		
$query=$this->db->query("select * from `cm_option` ");		
$c=$query->num_rows();		

$x=array(
'allow_report'=>$allow_report,
'allow_email'=>$allow_email
);		
		
if($c==0){
$this->db->insert('cm_option', $x); 
} else {
$this->db->update('cm_option', $x); 
}		
		
		
return 'OK';		
	
	
}	
	
	
	
	
	
	
    
	
	
	
	
	
	
	
	
	
	
	
	}
    
    ?>
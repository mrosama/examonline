<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vistors extends MX_Controller {





public function index(){
$this->load->model('App_model');
 
 $data['num_user']=$this->App_model->front_GetUser();;
$data['num_vistor']=$this->App_model->front_GetVistor();
$data['num_total']=$this->App_model->front_GetTotal();



$this->load->view("app/vistors/index",$data);

}










}
?>
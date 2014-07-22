<?php 
/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();				
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));		
		$this->load->library(array("input","form_validation","session","my_auth","email"));	
	}
	public function homepage(){
		redirect(base_url()."index.php/Home/verify/login");		
	}	
	public function introduct(){
		$this->load-> view("user/introduct_view");
	}
	public function keyboard(){
		$this->load-> view("user/keyboard_view");
	}
	public function guide(){
		$this->load-> view("user/guide_view");
	}
	public function alphabet(){
		$this->load->view("user/alphabet_view");
	}
}
 ?>
 
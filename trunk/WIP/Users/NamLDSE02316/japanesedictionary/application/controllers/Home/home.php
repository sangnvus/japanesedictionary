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
	}
	public function homepage(){
		$this->load->view("user/Homepage_view");
	}	
}
 ?>
 
<?php 
/**
* 
*/
class Verify extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library('form_validation');
        $this->load->library(array("form_validation","session","my_auth"));
        
        $this->load->database();
        $this->load->model("User_model");

	}
	public function login(){
		if($this->my_auth->is_User())
        {
            // redirect den homepage            
            redirect(base_url()."index.php/Home/user");
            exit();
        }
        $error['error_login'] = "";        
        $this->form_validation->set_rules("u_username","Username","required");
        $this->form_validation->set_rules("u_password","Password","required");
        $error['error_login'] = 1;
        if($this->form_validation->run()==FALSE)
        {             
            $error['error_login'] = "";
            $this->load->view("user/Homepage_view",$error);            
        }
        else
        {   
             $u = $this->input->post("u_username");
             $p = $this->input->post("u_password");
             $session = $this->User_model->checkLogin($u,$p);

             if(!is_null($session) && $session['u_role'] == 2)
             {                   
                      $data = array(
                                    "u_username"  => $session['u_username'],
                                    "u_id"    => $session['u_id'],
                                    "u_role"  => $session['u_role'],
                                    "error" => ""
                                );
                     $this->my_auth->set_userdata($data);
                     //redirect to homepage                     
                     redirect(base_url()."index.php/Home/user");
                 
                 $this->load->view("user/Homepage_view",$data);                 
             }
             else
             {          
                $error['error_login'] = "Username or Password wrong";    
                $this->load->view("user/Homepage_view",$error);    
             }
        }
	}
    //---- Logout
    function logout()
    {
        $this->my_auth->sess_destroy();
        redirect(base_url()."index.php/Home/verify/login");
    }
}
 ?>
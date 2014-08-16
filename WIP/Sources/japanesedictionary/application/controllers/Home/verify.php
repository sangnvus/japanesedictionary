<?php 
/**
* 
*/
class Verify extends CI_Controller
{
	
	function __construct() {
		parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library('form_validation');
        $this->load->library(array("form_validation","session","my_auth"));
        $this->load->library('facebook');
        $this->config->load('facebook');
        
        $this->load->database();
        $this->load->model("User_model");        
	}    
	public function login() {                        
        $user = $this->facebook->getUser();
        // echo "<pre>";    
        // print_r($user);
        // echo "</pre>";    
        // die;
        if ($user) {
            // echo "strin1g";
            // die;
            $data['logout_url'] = site_url('Home/verify/fblogout'); // Logs off application
            $data['user_profile'] = $this->facebook->api('/me');
            // OR 
            // Logs off FB!            
            $this->load->view("user/Homepage_view",$data);
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('Home/verify/fblogin'), 
                'scope' => array("email") // permissions here
            ));
            // $this->load->view("user/Homepage_view",$data);
        } 
		if($this->my_auth->is_User())
        {
            // redirect den homepage            
            redirect(base_url()."index.php/Home/user");
            exit();
        }        
        $data['error_login'] = "";        
        $this->form_validation->set_rules("u_username","Tên đăng nhập","required");
        $this->form_validation->set_rules("u_password","Mật khẩu","required");
        $this->form_validation->set_message("required","%s không được trống");
        $data['error_login'] = 1;
        if($this->form_validation->run()==FALSE)
        {             
            $data['error_login'] = "";
            $this->load->view("user/Homepage_view",$data);            
        }
        else
        {   
             $u = $this->input->post("u_username");
             $p = $this->input->post("u_password");
             $session = $this->User_model->checkLogin($u,$p);

             if(!is_null($session) && $session['u_role'] == 2 && $session['u_status'] ==1)
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
                if(!is_null($session) && $session['u_role'] == 2 && $session['u_status'] ==0)
                {  
                $data['error_login'] = "Tài khoản đã bị khóa";    
                $this->load->view("user/Homepage_view",$data);
                }
                else
                {
                $data['error_login'] = "Sai tên đăng nhập hoặc mật khẩu";    
                $this->load->view("user/Homepage_view",$data);
                }    
             }
        }
	}
    //---- Logout
    function logout()
    {
        $this->my_auth->sess_destroy();
        redirect(base_url()."index.php/Home/verify/login");
    }

    //-----Login By Facebook
    function fblogin(){
        $this->load->library('facebook'); // Automatically picks appId and secret from config                
        $user = $this->facebook->getUser();
        if($user){
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                // echo "<pre>";
                // print_r($data['user_profile']);
                // echo "</pre>";
                // die;       
                if ($this->User_model->checkFacebookId($data['user_profile']['id'])==TRUE) {
                    $user_facebook = array(
                                "facebook_id" => $data['user_profile']['id'],
                                "email" => $data['user_profile']['email'],
                                "first_name" => $data['user_profile']['first_name'],
                                "gender"=>$data['user_profile']['gender'],
                                "last_name"=>$data['user_profile']['last_name'],
                                "link"=>$data['user_profile']['link'],
                                "locale"=>$data['user_profile']['locale'],
                                "name"=>$data['user_profile']['name'],
                                "timezone"=>$data['user_profile']['timezone'],
                                "updated_time"=>$data['user_profile']['updated_time'],
                                "verified"=>$data['user_profile']['verified']
                    );  
                    $this->User_model->addUserFacebook($user_facebook);             
                }                                
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else{
            $this->facebook->destroySession();
        }
        if ($user) {
            $data['logout_url'] = site_url('Home/verify/fblogout'); // Logs off application            
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('Home/verify/fblogin'), 
                'scope' => array("email") // permissions here
            ));
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        $this->load->view('user/Homepage_view',$data);
    }
    public function fblogout(){

        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
        $this->my_auth->sess_destroy();
        // Make sure you destory website session as well.
        redirect(base_url()."index.php/Home/verify/login");
    }
}
 ?>
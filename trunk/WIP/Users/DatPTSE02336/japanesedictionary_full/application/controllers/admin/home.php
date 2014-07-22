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
        
		if(!$this->my_auth->is_Admin()){			
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }

        $this->load->database();
        $this->load->model("User_model");
	}
	function login(){
		$this->load->view("admin/login_admin_view");
	}
    // list User
    public function index(){        
        
        $this->User_model->getAllUser();
        $max = $this->User_model->num_rows();
        $min = 1;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/home/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['users'] = $this->User_model->getAllUser($min,$this->uri->segment($config['uri_segment']));
            $this->load->view("admin/homepageadmin_view",$data);
        }else{
            return false;
        }
    }
	public function listAdmin(){
        if($this->my_auth->is_SuperAdmin()){                                            
		$user = $this->User_model->getListAdmin();
		$data = "";
		if (!is_null($user)) {
			foreach ($user as $key => $value) {
				$data = array('users' => $user);
					}
				} else {
					$user = null;					
				}
			$this->load->view('admin/listadmin_view', $data);
        }else{
            redirect(base_url()."index.php/admin/verify/login");
        }
	}
	public function redirectAddNewAdmin(){
		$this->load->view('admin/addNewAdmin_view');
	}
	
	public function addNewAdmin(){		
        $this->form_validation->set_rules("username","username","required|max_length[25]|callback_checkUser");
        $this->form_validation->set_rules("password","password","required");
        $this->form_validation->set_rules("email","Email","required|valid_email|callback_checkEmail");        

        $data['error'] = "";
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/addNewAdmin_view",array("error"=>""));
        }
        else
        {                
                $user = array(                        
                        "u_username"  => $this->input->post("username"),                        
                        "u_password"  => $this->input->post("password"),
                        "u_email"     => $this->input->post("email"),                                                
                        "u_role"     => $_POST['role'],                        
                        "u_registerdate"  => date("Y-m-d H:i:s"),
                        "u_status"    => 1, // da kich hoat
                );
					$this->User_model->addNewAdmin($user);
					redirect(base_url()."index.php/admin/home/listAdmin");                                                
                }
                
               // $this->load->view("admin/addNewAdmin_view",$data);
        }
    //--- Edit Admin
    function editAdmin(){
    	$u_id = $this->uri->segment(4);
        $data['info'] = $this->User_model->getInfo($u_id);
        $data['error'] = "";
        if(is_numeric($u_id) && $data['info']!=NULL)
        {
            
            if(isset($_POST['ok']))
            {            
                
                    $this->form_validation->set_rules("username","Username","required|max_length[32]|callback_checkUser");                
                    $this->form_validation->set_rules("password","Password","required");  
                    $this->form_validation->set_rules("newpassword","NewPassword","matches[renewpassword]");
                    //$this->form_validation->set_rules("renewpassword","ReNewPassword","required");                                
                    $this->form_validation->set_rules("email","Email","required|valid_email|callback_checkEmail");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/editAdmin_view",$data);                
                }else{
                    if($this->input->post("newpassword")!="")
                      {
                      $update = array(                                    
                                    "u_username"  => $this->input->post("username"),
                                    "u_password" => $this->input->post("newpassword"),
                                    "u_fullname" => $this->input->post("fullname"),
                                    "u_email"     => $this->input->post("email")
                                 );
                      }else{
                       $update = array(                                    
                                    "u_username"  => $this->input->post("username"),
                                    "u_password" => $this->input->post("password"),
                                    "u_fullname" => $this->input->post("fullname"),
                                    "u_email"     => $this->input->post("email")
                                 );
                      }
                      
                      $this->User_model->updateUser($update,$u_id);
                      redirect(base_url()."index.php/admin/home"); 
                }
            }
            else
            {
                $this->load->view("admin/editAdmin_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
    //--- Xoa User
    function deleteUser(){
        $u_id = $this->uri->segment(4);        
        if(is_numeric($u_id)){            
            $this->User_model->deleteUser($u_id);
            redirect(base_url()."index.php/admin/home/listAdmin");        
        }else{
            return false;     
        }
    }

    //--- Kiểm tra user hợp lệ
    function checkUser($u_username)
    {
        $u_id = $this->uri->segment(4);
        if($this->User_model->getUser($u_username,$u_id)==TRUE){
            return TRUE;
        }
        else{
            $this->form_validation->set_message("checkUser","Your username has been register, please try again");
            return FALSE;
       }
    }
    //---- Kiem tra Email
    function checkEmail($u_email)
    {
        $u_id = $this->uri->segment(4);
        if($this->User_model->checkEmail($u_email,$u_id)==TRUE){
            return TRUE;
        }
        else{
            $this->form_validation->set_message("checkEmail","Email has been exit, please try again");
            return FALSE;
        }
    }
    // Search user
    function getUserByUsername(){
        $txtUsername = "";
        $txtEmail = "";
        if (isset($_GET['txtUsername']) || isset($_GET['txtEmail'])) {
            $txtUsername = $_GET['txtUsername'];
            $txtEmail = $_GET['txtEmail'];
        }

        $txtUsername = ($txtUsername===null) ? "" : $txtUsername;
        $txtEmail = ($txtEmail===null) ? "" : $txtEmail;

        if ($txtUsername === "" && $txtEmail === "") {
            redirect(base_url()."index.php/admin/home");
            exit();
        }

           
        $user = $this->User_model->getUserByUsername($txtUsername,$txtEmail);
        $data = "";
        if (!is_null($user)) {
            foreach ($user as $key => $value) {
                $data = array('users' => $user,
                                'txtUsername' => $txtUsername,
                                'txtEmail' => $txtEmail
                                );
                    }
                } else {
                    $user = null;                   
                    $data = array('users' => $user,
                                'txtUsername' => $txtUsername,
                                'txtEmail' => $txtEmail
                                );
                }
            $this->load->view('admin/listSearchUser_view', $data);
    }
    //Ban/Unban User
    function banUser(){
        $u_id = $this->uri->segment(4);
        if(is_numeric($u_id)){
            $update = array("u_status" => 0);
            $this->User_model->updateUser($update,$u_id);
            redirect(base_url()."index.php/admin/home");        
        }else{
            return false;     
        }
    }
    function unbanUser(){
        $u_id = $this->uri->segment(4);
        if(is_numeric($u_id)){
            $update = array("u_status" => 1);
            $this->User_model->updateUser($update,$u_id);
            redirect(base_url()."index.php/admin/home");        
        }else{
            return false;     
        }
    }
}
 ?>
<?php
class Verify extends CI_Controller
{    
    // constructor
    //　コンストラクタ
    function __construct() 
    {        
        parent::__construct();
        // load helper 
        //ロード　ヘルパー           
        $this->load->helper(array("url","form"));        
        // load library
        //　ロード　ライブラリ
        $this->load->library('form_validation');        
        $this->load->library(array("form_validation","session","my_auth"));
        $this->load->database();
        $this->load->model("User_model");
    }
    //--- Login
    //　ログイン
    function login() 
    {
        if ($this->my_auth->is_Admin()) {
            // redirect to homepage
            // ホームページ　まで来る
            redirect(base_url()."index.php/admin/home");
            exit();
        }
        // validation input
        // 検証フォーム
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");
        $this->form_validation->set_message("required","%s is required<br>");

        if ($this->form_validation->run() == FALSE) {            
            $this->load->view("admin/login_admin_view",array("error" => ""));          
        } else {   
            $u = $this->input->post("username");
            $p = $this->input->post("password");
            $session = $this->User_model->checkLogin($u,$p);
            if ($session) {
                //check Active
                if (!$this->my_auth->is_Active($session['u_id'])) {
                    $data['error'] = "Check mail để kích hoạt tài khoản !";
                    $this->load->view("admin/login_admin_view",$data);
                } else {
                    $data = array("u_username"  => $session['u_username'],
                                  "u_id"        => $session['u_id'],
                                  "u_role"      => $session['u_role'],
                                 );
                    $this->my_auth->set_userdata($data);
                    //redirect to homepage
                    // ホームページ　まで来る
                    redirect(base_url()."index.php/admin/home");
                }                 
            } else {  
                //load view
                //　ロード　ビュー
                $this->load->view("admin/login_admin_view",array("error" => "Wrong username or wrong password!"));    
            }
        }
    }    
    //---- Logout
    //　ログアウト
    function logout() 
    {
        // destroy session
        //　セッション　を　消す
        $this->my_auth->sess_destroy();
		redirect(base_url()."index.php/admin/verify/login");
    }
}
?>
<?php 
/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();		
		$this->load->helper("url");
    $this->load->helper(array('form', 'url'));		
		$this->load->library(array("input","form_validation","session","my_auth","email"));        
    $this->load->database();
    $this->load->model("User_model");
	}
	function index(){
		$this->load->view("user/Homepage_view");
	}
	public function forgotInfo(){
  		$this->load->view('user/forgotInfo_view');
	}
	public function forget(){
    if (isset($_GET['info'])) {
               $data['info'] = $_GET['info'];
              }
    if (isset($_GET['error'])) {
              $data['error'] = $_GET['error'];
              }
    
    $this->load->view('user/forgotInfo_view',$data);
    } 
	public function doforget(){    
    $this->load->helper('url');
    $email= $_POST['email'];
    $q = $this->db->query("select * from user where u_email='" . $email . "' and u_role='2'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user=$r[0];
      $this->User_model-> resetpassword($user);    
      $info= $email;
      redirect('Home/user/forget?info=' . $info, 'refresh');
        }
    $error= "";
    redirect('Home/user/forget?error=' . $error, 'refresh');
  	} 

  	public function thank()
 		{
  			$data['title']= 'Đăng ký thành công';
  			$this->load->view('user/registersuccess_view.php', $data);
 		}

 	public function viewProfile(){
 		if(!$this->my_auth->is_User())
        {   
            // redirect den homepage            
            redirect(base_url()."index.php/Home/user");
            exit();
        }
        $u_id = $this->uri->segment(4);
        $data['info'] = $this->User_model->getInfo($u_id);
 		$this->load->view('user/profile_view',$data);
 	}

 	function editUser(){
    	   $u_id = $this->uri->segment(4);
        $data['info'] = $this->User_model->getInfo($u_id);
        $data['error'] = "";
        if(is_numeric($u_id) && $data['info']!=NULL)
        {
            
            if(isset($_POST['ok']))
            {            
             
                    $this->form_validation->set_rules("username","Tên đăng nhập","required|min_length[6]|callback_checkUser");                
                    //$this->form_validation->set_rules("password","Password","required");  
                    $this->form_validation->set_rules("newpassword","Mật khẩu mới","min_length[6]|max_length[32]|matches[renewpassword]");
                    $this->form_validation->set_rules("renewpassword","Nhập lại mật khẩu","matches[newpassword]");                                
                    $this->form_validation->set_rules("email","Email","required|valid_email|callback_checkEmail");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("user/editUser_view",$data);                
                }else{
                    if($this->input->post("newpassword")!="")
                      {
                      $update = array(                                    
                                    "u_username"  => $this->input->post("username"),
                                    "u_password" => md5($this->input->post("newpassword")),
                                    "u_fullname" => $this->input->post("fullname"),
                                    "u_email"     => $this->input->post("email")
                                 );
                      }else{
                       $update = array(                                    
                                    "u_username"  => $this->input->post("username"),
                                    "u_fullname" => $this->input->post("fullname"),
                                    "u_email"     => $this->input->post("email")
                                 );
                      }
                      
                      $this->User_model->updateUser($update,$u_id);
                      redirect(base_url()."index.php/Home/user"); 
                }
            }
            else
            {
                $this->load->view("user/editUser_view",$data);   
            }
            
        }
        else
        {            
            $this->load->view('user/Homepage_view');
        }
    }
 	public function registration()
 	{
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'Tên đăng nhập', 'trim|required|alpha_numberic|min_length[6]|max_length[32]|xss_clean|is_unique[user.u_username]');
  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|is_unique[user.u_email]');
  $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Nhập lại mật khẩu', 'trim|required|matches[password]');
  $this->load->library('recaptcha');

        if($this->input->post())
        {
            //Load Class Validation
            //$this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
        }
  if($this->form_validation->run() == FALSE)
  {
    $this->load->library('recaptcha');
    $this->load->view('user/register_view');
  }
  else
  {
   $now = getdate();
  	$currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; 
  	$data=array(
    'u_username'=>$this->input->post('user_name'),
    'u_email'=>$this->input->post('email_address'),
    'u_password'=>md5($this->input->post('password')),
    'u_fullname'=>$this->input->post('full_name'),
    'u_status' => '1',
    'u_role' => '2',
    'u_registerdate' => $currentDate
  	);
  	$this->User_model->add_user($data);
   	$this->thank();
  }
 }

 	public function opinion()
 {
  $this->load->library('recaptcha');
  $this->load->view('user/contact_opinion_view');
 }
 public function qa()
 {
  $this->load->library('recaptcha');
  $this->load->view('user/contact_Q&A_view');
 }
 public function vocab()
 {
    $this->load->library('recaptcha');
    $this->load->view('user/contributed_vocab_view');
 }
 public function kanji()
 {
    $this->load->library('recaptcha');
    $this->load->view('user/contributed_kanji_view');
 }
 public function grammar()
 {
    $this->load->library('recaptcha');
    $this->load->view('user/contributed_grammar_view');
 }
 public function thankcontact()
 {
  $data['title']= 'Đóng góp thành công';
  $this->load->view('user/contactsuccess_view.php', $data);
 }
public function thankcontributed()
 {
  $data['title']='Đóng góp thành công';
  $this->load->view('user/contributedsuccess_view.php',$data);
 }
  public function contributedDB()
  {
    $this->load->view('user/contributedatabase.php');
  }
   public function contributedVocab()
 {
  $this->load->model("Vocabulary_model");
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('v_hiragana', 'Hiragana', 'trim|required');
  $this->form_validation->set_rules('m_category', 'Loại từ', 'trim|required'); 
  $this->form_validation->set_rules('m_meaning', 'Nghĩa của từ', 'trim|required');   
  $this->form_validation->set_message('required','%s không được trống!');
  $this->load->library('recaptcha');

        if($this->input->post())
        {
            //Load Class Validation
            //$this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
        }
  if($this->form_validation->run() == FALSE)
  {
   $this->vocab();
  }
  else
  {
    $vocab=array(
    'v_hiragana'=>$this->input->post('v_hiragana'),
    'v_status' => 0,
      );
    $this->User_model->contribute_vocab($vocab);
    $id= $this->Vocabulary_model->getId();
    $mean=array(
    'v_id'=>$id->max,
    'm_meaningvn' =>$this->input->post('m_meaning'),
    'm_category' =>$this->input->post('m_category'),
    'm_kanji' =>$this->input->post('m_kanji'),
      );
   
    $this->User_model->contribute_mean($mean);
    $this->thankcontributed();
  }
 }
public function contributedKanji()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('k_kanji', 'Chữ Hán', 'trim|required|is_unique[kanji.k_kanji]');
  $this->form_validation->set_rules('k_hanviet', 'Âm Hán Việt', 'trim|required'); 
  $this->form_validation->set_rules('k_meaning', 'Nghĩa của chữ Hán', 'trim|required');   
  $this->form_validation->set_message('required','%s không được trống!');
  $this->form_validation->set_message('is_unique','%s đã có!');
  $this->load->library('recaptcha');

        if($this->input->post())
        {
            //Load Class Validation
            //$this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
        }
  if($this->form_validation->run() == FALSE)
  {
   $this->kanji();
  }
  else
  {
    $kanji=array(
    'k_kanji'=>$this->input->post('k_kanji'),
    'k_hanviet'=>$this->input->post('k_hanviet'),
    'k_onyomi'=>$this->input->post('k_onyomi'),
    'k_kunyomi'=>$this->input->post('k_kunyomi'),
    'k_meaning'=>$this->input->post('k_meaning'),
    'k_status' => 0,
      );
    $this->User_model->contribute_kanji($kanji);
    $this->thankcontributed();
  }
 }

 public function contributedGrammar()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('g_hiragana', 'Cấu trúc', 'trim|required|is_unique[kanji.k_kanji]');
  $this->form_validation->set_rules('g_use', 'Cách dùng', 'trim|required'); 
  $this->form_validation->set_rules('g_meaning', 'Tên ngữ pháp', 'trim|required');   
  $this->form_validation->set_message('required','%s không được trống!');
  $this->form_validation->set_message('is_unique','%s đã có!');
  $this->load->library('recaptcha');

        if($this->input->post())
        {
            //Load Class Validation
            //$this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
        }
  if($this->form_validation->run() == FALSE)
  {
   $this->grammar();
  }
  else
  {
    $grammar=array(
    'g_hiragana'=>$this->input->post('g_hiragana'),
    'g_use'=>$this->input->post('g_use'),
    'g_meaning'=>$this->input->post('g_meaning'),
    'g_status' => 0,
      );
    $this->User_model->contribute_grammar($grammar);
    $this->thankcontributed();
  }
 }
  public function attributeOpinion()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('contact_email', 'Email', 'trim|required|valid_email');  
  $this->form_validation->set_rules('contact_content', 'Nội dung', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_message('required','%s không được trống!');
  $this->form_validation->set_message('valid_email','%s không chính xác!');
  $this->load->library('recaptcha');

        if($this->input->post())
        {
            //Load Class Validation
            //$this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
        }
  if($this->form_validation->run() == FALSE)
  {
   $this->opinion();
  }
  else
  {
  	$data=array(
    'contact_email'=>$this->input->post('contact_email'),
    'contact_content'=>$this->input->post('contact_content'),
    'contact_type'=>'Opinion',
    'contact_status' => '1'
  );
  	//$this->db->insert('contact',$data);
   	$this->User_model->add_contactopinion($data);
   	$this->thankcontact();
  }
 }
 public function attributeQA()
 {
  $data=null;
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('contact_email', 'Email', 'trim|required|valid_email');  
  $this->form_validation->set_rules('contact_content', 'Nội dung', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_message('required','%s không được trống!');
  $this->form_validation->set_message('valid_email','%s không chính xác!');
  $this->load->library('recaptcha');

        if($this->input->post())
        {
            //Load Class Validation
            //$this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
        }
  if($this->form_validation->run() == FALSE)
  {
   $this->qa();
  }
  else
  {
   $data=array(
    'contact_email'=>$this->input->post('contact_email'),
    'contact_content'=>$this->input->post('contact_content'),
    'contact_type'=>'Q&A',
    'contact_status' => '1'
  );
  	//$this->db->insert('contact',$data);
   $this->User_model->add_contactQA($data);
   $this->thankcontact();
  }
 }
}
?>
<?php 
/**
* 
*/
class Contact extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// load helper
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));
        // load library
        $this->load->library(array("input","form_validation","session","my_auth","email"));
        //connect DB
		$this->load->database();
        $this->load->model("Contact_model");
	}
	//list contact
	function index(){
		// count record
        $max = $this->Contact_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/contact/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['contact'] = $this->Contact_model->getAllContact($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/contact/listContact_view",$data);
        }else{
            $data['contact']=null;
            $this->load->view("admin/contact/listContact_view",$data);
        }
	}

    function replyContact($contact){
        $contact_id = $this->uri->segment(4);
        $data['info'] = $this->Contact_model->getInfo($contact_id);
        $data['error'] = "";
        
        if(is_numeric($contact_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         

                    //$this->form_validation->set_rules("vi_id","Vi_id","required");   
                    $this->form_validation->set_rules("contact_reply","Nội dung trả lời","required");                                                               
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/contact/replyContact_view",$data);                
                }else{
                      $contact = array(
                                    "contact_id" =>    $this->input->post("contact_id"),
                                    "contact_email" => $this->input->post("contact_email"),
                                    "contact_content" => $this->input->post("contact_content"),
                                    "contact_reply"  =>$this->input->post("contact_reply"),
                                    "contact_status" => 0
                                    );                                        
                        $this->Contact_model->updateContact($contact,$contact_id);
                        date_default_timezone_set('GMT');
                        $email= $_POST['contact_email'];
                        $reply=$_POST['contact_reply'];
                        $this->load->helper('string');
                        $this->load->library('email');
                        $this->email->from('datptse02336@gmail.com', 'Phạm Tiến Đạt');
                        $this->email->to(''.$email);   
                        $this->email->subject('Trả lời thắc mắc/ý kiến');
                        $this->email->message('Chúng tôi xin trả lời bạn:'.$reply);
                        $this->email->send();
                      redirect(base_url()."index.php/admin/contact"); 
                }
            }
            else
            {
                $this->load->view("admin/contact/replyContact_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
	function getContactByContactType(){
		$data = "";
        $txtType = "";        
        if (isset($_GET['txtType'])) {
            $txtType = $_GET['txtType'];            
        }

        $txtType = ($txtType===null) ? "" : $txtType;   

        $max = $this->Contact_model->num_rowsBySearch($txtType);
        $min = 10;
        $data['txtType'] = $txtType;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/vocabulary/getContactByContactType";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['contact'] = $this->Contact_model->getContactByType($txtType,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/contact/listSearchContact_view",$data);
        }else{
            $data['contact'] = null;            
            $this->load->view("admin/contact/listSearchContact_view",$data);
        }
	}
	function deleteContact(){
		$contact_id = $this->uri->segment(4);             
        if(is_numeric($contact_id)){            
            $this->Contact_model->deleteContact($contact_id);
            redirect(base_url()."index.php/admin/contact/index");        
        }else{
            return false;     
        }
	}
}
 ?>
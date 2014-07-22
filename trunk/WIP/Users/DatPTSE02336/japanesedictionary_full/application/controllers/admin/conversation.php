<?php 
/**
* 
*/
class Conversation extends CI_Controller
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
        $this->load->model("Conversation_model");
	}
	function index(){
		// count record
        $max = $this->Conversation_model->num_rows();
        // so record tren 1 page
        $min = 5;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/conversation/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
            

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['conversation'] = $this->Conversation_model->getAllConversation($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/conversation/listConversation_view",$data);
        }else{
            $data['conversation'] =null;
            $this->load->view("admin/conversation/listConversation_view",$data);
        }
	}
	function getConversationByLevel(){
		$data = "";
        $txtLevel = "";        
        if (isset($_GET['txtLevel'])) {
            $txtLevel = $_GET['txtLevel'];            
        }

        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;   

        $max = $this->Conversation_model->num_rowsBySearch($txtLevel);
        $min = 5;
        $data['txtLevel'] = $txtLevel;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/conversation/getConversationByLevel";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['conversation'] = $this->Conversation_model->getConversationByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/conversation/listSearchConversation_view",$data);
        }else{
            $data['conversation'] = null;            
            $this->load->view("admin/conversation/listSearchConversation_view",$data);            
        }
	}
	function addConversation(){
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/conversation/addConversation_view",$data);
        } else {
            $this->form_validation->set_rules("c_id","c_id","required|max_length[32]");
            $this->form_validation->set_rules("c_level","c_level","required");
            $this->form_validation->set_rules("c_title","c_title","required");                    
        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/conversation/addConversation_view",array("error"=>""));
        }
        else
        {                
                $conversation = array(                        
                        "c_id"  => $this->input->post("c_id"),                        
                        "c_level"  => $this->input->post("c_level"),
                        "c_title"     => $this->input->post("c_title"),                                                                                                                                            
                );
                try {
                    $this->Conversation_model->addConversation($conversation);
                    redirect(base_url()."index.php/admin/conversation/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }                
                //$this->load->view("admin/vocabulary/addVocabulary_view",$data);
        }                
    }
    function editConversation(){
    	$c_id = $this->uri->segment(4);
    	$con_id = $this->uri->segment(5); 
    	$con_id = ($con_id===null) ? "" : $con_id;   	
        $data['info'] = $this->Conversation_model->getInfoConversation($c_id,$con_id);
        $data['error'] = "";
        if(is_numeric($con_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("c_id","c_id","required|max_length[32]");
		            $this->form_validation->set_rules("c_level","c_level","required");
		            $this->form_validation->set_rules("c_title","c_title","required");                    
                    $this->form_validation->set_rules("con_id","con_id","required");                
                    $this->form_validation->set_rules("con_title","con_title","required");                                          
                    $this->form_validation->set_rules("con_hiragana","con_hiragana","required");
                    $this->form_validation->set_rules("con_romaji","con_romaji","required");
                    $this->form_validation->set_rules("con_meaning","con_meaning","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/conversation/editConversation_view",$data);                
                }else{
                      $conversation = array(                        
                        "c_id"  => $this->input->post("c_id"),                        
                        "c_level"  => $this->input->post("c_level"),
                        "c_title"     => $this->input->post("c_title"),                                                                                                                                            
               			 );
                      $conversation_content = array(                                    
                                    "con_id"  => $this->input->post("con_id"),
                                    "con_title" => $this->input->post("con_title"),
                                    "con_hiragana" => $this->input->post("con_hiragana"),
                                    "con_romaji"     => $this->input->post("con_romaji"),
                                    "con_meaning"     => $this->input->post("con_meaning")
                                 );   
                      $this->Conversation_model->updateConversation($conversation,$c_id);                 
                      $this->Conversation_model->updateContent($conversation_content,$con_id);
                      redirect(base_url()."index.php/admin/conversation"); 
                }
            }
            else
            {
                $this->load->view("admin/conversation/editConversation_view",$data);   
            }
            
        }
        else
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("c_id","c_id","required|max_length[32]");
		            $this->form_validation->set_rules("c_level","c_level","required");
		            $this->form_validation->set_rules("c_title","c_title","required");                                                      
                    $this->form_validation->set_rules("con_title","con_title","required");                                          
                    $this->form_validation->set_rules("con_hiragana","con_hiragana","required");
                    $this->form_validation->set_rules("con_romaji","con_romaji","required");
                    $this->form_validation->set_rules("con_meaning","con_meaning","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/conversation/editConversation_view",$data);                
                }else{
                      $conversation = array(                        
                        "c_id"  => $this->input->post("c_id"),                        
                        "c_level"  => $this->input->post("c_level"),
                        "c_title"     => $this->input->post("c_title"),                                                                                                                                            
               			 );
                      $conversation_content = array(          
                      				"c_id"  => $this->input->post("c_id"),                                                              
                                    "con_title" => $this->input->post("con_title"),
                                    "con_hiragana" => $this->input->post("con_hiragana"),
                                    "con_romaji"     => $this->input->post("con_romaji"),
                                    "con_meaning"     => $this->input->post("con_meaning")
                                 );   
                      $this->Conversation_model->updateConversation($conversation,$c_id);                 
                      $this->Conversation_model->updateContent($conversation_content,$con_id);
                      redirect(base_url()."index.php/admin/conversation"); 
                }
            }
            else
            {
                $this->load->view("admin/conversation/editConversation_view",$data);   
            }
        }
    }    
    	//--- Xoa Conversation
    function deleteConversation(){
        $c_id = $this->uri->segment(4);
        $con_id = $this->uri->segment(5);
        $con_id = ($con_id === null) ? "" : $con_id;             
        if($c_id != ""){            
            $this->Conversation_model->deleteConversation($c_id,$con_id);
            redirect(base_url()."index.php/admin/conversation/index");        
        }else{
            return false;     
        }
    }
    function addContent(){
        $c_id = $this->uri->segment(4);
        $con_id = $this->uri->segment(5);
        $con_id = ($con_id === null) ? "" : $con_id;
        $data['info'] = $this->Conversation_model->getInfoConversation($c_id,$con_id);
        $data['error'] = "";
        if($c_id != "" && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                       

                    $this->form_validation->set_rules("c_id","c_id","required|max_length[32]");
		            $this->form_validation->set_rules("c_level","c_level","required");
		            $this->form_validation->set_rules("c_title","c_title","required");                                                      
                    $this->form_validation->set_rules("con_title","con_title","required");                                          
                    $this->form_validation->set_rules("con_hiragana","con_hiragana","required");
                    $this->form_validation->set_rules("con_romaji","con_romaji","required");
                    $this->form_validation->set_rules("con_meaning","con_meaning","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/conversation/addContent_view",$data);                
                }else{
                      $conversation = array(                        
                        "c_id"  => $this->input->post("c_id"),                        
                        "c_level"  => $this->input->post("c_level"),
                        "c_title"     => $this->input->post("c_title"),                                                                                                                                            
               			 );
                      $content = array(          
                      				"c_id"  => $this->input->post("c_id"),                                                              
                                    "con_title" => $this->input->post("con_title"),
                                    "con_hiragana" => $this->input->post("con_hiragana"),
                                    "con_romaji"     => $this->input->post("con_romaji"),
                                    "con_meaning"     => $this->input->post("con_meaning")
                                 );                      
                      $this->Conversation_model->addContent($content);
                      redirect(base_url()."index.php/admin/conversation"); 
                }
            }
            else
            {
                $this->load->view("admin/conversation/addContent_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
}
 ?>
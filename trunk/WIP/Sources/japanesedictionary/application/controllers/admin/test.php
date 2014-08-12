<?php 
/**
* 
*/
class Test extends CI_Controller
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
        $this->load->model("Test_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function index(){
		// count record
        $max = $this->Test_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/test/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
            

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['test'] = $this->Test_model->getAllTest($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/test/listTest_view",$data);
        }else{
            $data['test'] =null;
            $this->load->view("admin/test/listTest_view",$data);
        }
	}
	function getTestByLevel(){
        $data = "";
        $txtLevel = "";        
        if (isset($_GET['txtLevel'])) {
            $txtLevel = $_GET['txtLevel'];            
        }

        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;   

        $max = $this->Test_model->num_rowsBySearch($txtLevel);        
        $min = 10;
        $data['txtLevel'] = $txtLevel;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/test/getTestByLevel";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['test'] = $this->Test_model->getTestByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/test/listTest_view",$data);
        }else{
            $data['test'] = null;            
            $this->load->view("admin/test/listTest_view",$data);            
        }
    }
	function addTest(){
		$data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/test/addTest_view",$data);
        } else {
            $this->form_validation->set_rules("test_id","test_id","required|max_length[20]|is_unique[test.test_id]|alpha_numeric");
            $this->form_validation->set_rules("test_category","test_category","required|max_length[50]");
            $this->form_validation->set_rules("test_level","test_level","required|max_length[10]");
            $this->form_validation->set_rules("test_content", "test_content", 'trim|max_length[5000]');                   
        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/test/addTest_view",array("error"=>""));
        }
        else
        {                
                $test = array(                        
                        "test_id"  => $this->input->post("test_id"),                        
                        "test_category"  => $this->input->post("test_category"),
                        "test_level"     => $this->input->post("test_level"),                                                                                                                    
                        "test_content"    => $this->input->post("test_content")
                );
                try {
                    $this->Test_model->addTest($test);
                    redirect(base_url()."index.php/admin/test/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }                
                //$this->load->view("admin/vocabulary/addVocabulary_view",$data);
        }  
	}
	function editTest(){
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5);
        $answer_id = $this->uri->segment(6);

        $question_id = ($question_id === null) ? "" : $question_id;
        $answer_id = ($answer_id === null) ? "" : $answer_id;

        $data['info'] = $this->Test_model->getInfoAll($test_id,$question_id,$answer_id);
        $data['error'] = "";
        if(!is_null($test_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                  
            		$this->form_validation->set_rules("test_id","test_id","required|max_length[20]");
		            $this->form_validation->set_rules("test_category","test_category","required|max_length[50]");
		            $this->form_validation->set_rules("test_level","test_level","required|max_length[10]");
                    $this->form_validation->set_rules("test_content", "test_content", 'trim|max_length[5000]');       
                    $this->form_validation->set_rules("question_id","question_id","required");   
                    $this->form_validation->set_rules("question_content","question_content","required|max_length[200]");                                                                                   
                    $this->form_validation->set_rules("answer_content","answer_content","required|max_length[200]");
                    $this->form_validation->set_rules("answer_correct","answer_correct","required");
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/test/editTest_view",$data);                
                }else{
                      $test = array(
                                    "test_id" => $this->input->post("test_id"),
                                    "test_category" => $this->input->post("test_category"),
                                    "test_level" => $this->input->post("test_level"),
                                    "test_content" => $this->input->post("test_content")                                    
                                    );
                      $question = array(    
                      				"test_id" => $this->input->post("test_id"),                                                                
                                    "question_content" => $this->input->post("question_content")                                    
                                 );
                      $answer = array(
                      				"question_id" => $this->input->post("question_id"),
                      				"answer_content" => $this->input->post("answer_content"),
                      				"answer_correct" => $this->input->post("answer_correct")
                      			);   
                      $this->Test_model->updateTest($test,$test_id);                 
                      $this->Test_model->updateQuestion($question,$test_id);
                      $this->Test_model->updateAnswer($answer,$question_id);
                      redirect(base_url()."index.php/admin/test"); 
                }
            }
            else
            {
                $this->load->view("admin/test/editTest_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
    //--- Xoa Test
    function deleteTest(){
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5);
        $answer_id = $this->uri->segment(6);

        $question_id = ($question_id === null) ? "" : $question_id;
        $answer_id = ($answer_id === null) ? "" : $answer_id;
        if(!is_null($test_id)){        	
				$this->Test_model->deleteTest($test_id,$question_id,$answer_id);        		        	            
            	redirect(base_url()."index.php/admin/test/index");        
        }else{
            return false;     
        }
    }
    function addQuestion(){
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5);
        $question_id = ($question_id === null) ? "" : $question_id;
        $data['info'] = $this->Test_model->getInfoTest($test_id,$question_id);
        $data['error'] = "";
        if(!is_null($test_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                            
                    $this->form_validation->set_rules("test_id","test_id","required|max_length[20]");
		            $this->form_validation->set_rules("test_category","test_category","required|max_length[50]");
		            $this->form_validation->set_rules("test_level","test_level","required|max_length[10]");
                    $this->form_validation->set_rules("test_content", "test_content", 'trim|max_length[5000]');   
                    $this->form_validation->set_rules("question_content","question_content","required|max_length[200]");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/test/addQuestion_view",$data);                
                }else{
                      $question = array(                                                                        
                                    "test_id" => $this->input->post("test_id"),
                                    "question_content" => $this->input->post("question_content")                                    
                                 );                      
                      $this->Test_model->addQuestion($question);
                      redirect(base_url()."index.php/admin/test"); 
                }
            }
            else
            {
                $this->load->view("admin/test/addQuestion_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
    function addAnswer(){
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5);        
        $question_id = ($question_id === null) ? "" : $question_id;        

        $data['info'] = $this->Test_model->getInfoQuestion($test_id,$question_id);
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;*/
        $data['error'] = "";
        if(!is_null($test_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                            
                    $this->form_validation->set_rules("test_id","test_id","required|max_length[20]");
		            $this->form_validation->set_rules("test_category","test_category","required|max_length[50]");
		            $this->form_validation->set_rules("test_level","test_level","required|max_length[10]");       
                    $this->form_validation->set_rules("test_content", "test_content", 'trim|max_length[5000]');  
                    $this->form_validation->set_rules("question_content","question_content","required|max_length[200]");
                    $this->form_validation->set_rules("answer_content","answer_content","required|max_length[200]");
                    $this->form_validation->set_rules("answer_correct","answer_correct","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/test/addAnswer_view",$data);                
                }else{
                      $answer = array(                                                                        
                                    "question_id" => $this->input->post("question_id"),
                                    "answer_content" => $this->input->post("answer_content"),
                                    "answer_correct" => $this->input->post("answer_correct")                                    
                                 );                      
                      $this->Test_model->addAnswer($answer);
                      redirect(base_url()."index.php/admin/test"); 
                }
            }
            else
            {
                $this->load->view("admin/test/addAnswer_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
}
 ?>
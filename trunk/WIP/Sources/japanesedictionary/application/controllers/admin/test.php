<?php 
/**
* 
*/
class Test extends CI_Controller
{	
	function __construct() {
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
	function index() {
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
	function getTestByLevel() {
        $data = "";
        $txtLevel = "";        
        if(isset($_GET['txtLevel'])){
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
            $config['base_url'] = base_url()."index.php/admin/test/getTestByLevel?txtLevel=".$txtLevel."&search=Search";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            // $config['uri_segment'] = 4;
            $config['page_query_string'] = TRUE;
            $this->pagination->initialize($config);                                 
            $data['links'] = $this->pagination->create_links();
            $data['test'] = $this->Test_model->getTestByLevel($txtLevel,$min,$this->input->get('per_page'));

            $this->load->view("admin/test/listTest_view",$data);
        }else{
            $data['test'] = null;            
            $this->load->view("admin/test/listTest_view",$data);            
        }
    }
	function addTest() {
		$data['error'] = "";
        if(isset($_POST['addnew'])){
            $this->load->view("admin/test/addTest_view",$data);
        }else{
            if (isset($_POST['ok'])) {                
                if ($this->input->post("test_category") == "Listening") {
                    $config['upload_path'] = './public/audio';
                    $config['allowed_types'] = 'avi|flv|wmv|mp3';
                    $config['max_size'] = '10000000';
                    $this->load->library('upload', $config);

                    $this->form_validation->set_rules("test_title","Title","required|max_length[20]|is_unique[test.test_title]|alpha_numeric");
                    $this->form_validation->set_rules("test_category","Category","required|max_length[50]");
                    $this->form_validation->set_rules("test_level","Level","required|max_length[10]");
                    if (empty($_FILES['userfile']['name'])){
                    $this->form_validation->set_rules('userfile', 'File', 'required');
                    } 
                    if($this->form_validation->run()==FALSE){            
                        $this->load->view("admin/test/addTest_view",array("error" => ""));
                    }else{  
                        if(!$this->upload->do_upload()){
                            $test = array("test_title"     => $this->input->post("test_title"),                        
                                      "test_category"  => $this->input->post("test_category"),
                                      "test_level"     => $this->input->post("test_level")                                                                                                                                                        
                            ); 
                            $this->Test_model->addTest($test);
                            redirect(base_url()."index.php/admin/test/index");                                                   
                        }else{
                            $test = array("test_title"     => $this->input->post("test_title"),                        
                                      "test_category"  => $this->input->post("test_category"),
                                      "test_level"     => $this->input->post("test_level"),
                                      "test_content"   => $this->upload->data()['file_name']                                                                                                                                                         
                            );
                            $this->Test_model->addTest($test);
                            redirect(base_url()."index.php/admin/test/index"); 
                        }
                    }
                } else {
                    $this->form_validation->set_rules("test_title","Title","required|max_length[20]|is_unique[test.test_title]|alpha_numeric");
                    $this->form_validation->set_rules("test_category","Category","required|max_length[50]");
                    $this->form_validation->set_rules("test_level","Level","required|max_length[10]");
                    if($this->form_validation->run()==FALSE){            
                        $this->load->view("admin/test/addTest_view",array("error" => ""));
                    }else{                
                        $test = array("test_title"     => $this->input->post("test_title"),                        
                                      "test_category"  => $this->input->post("test_category"),
                                      "test_level"     => $this->input->post("test_level"),                                                                                                                    
                                      "test_content"   => $this->input->post("test_content")
                            );                                 
                        try{
                            $this->Test_model->addTest($test);
                            redirect(base_url()."index.php/admin/test/index");                                                   
                        }catch(Exception $e){
                            show_404();
                            log_message('error', $e->getMessage());
                        }                
                    }   
                }                
            } else {
                $this->load->view("admin/test/addTest_view",$data);
            }                            
        }  
	}
	function editTest() {
        $test_id = $this->uri->segment(4);                
        $data['info'] = $this->Test_model->getInfoAll($test_id);        
        $data['error'] = "";                  
            if(isset($_POST['ok'])){ 
                if ($this->input->post("test_category") === "Listening") {
                    $config['upload_path'] = './public/audio';
                    $config['allowed_types'] = 'avi|flv|wmv|mp3';
                    $config['max_size'] = '10000000';
                    $this->load->library('upload', $config);

                    $this->form_validation->set_rules("test_title","Title","required|max_length[20]");
                    $this->form_validation->set_rules("test_category","Category","required|max_length[50]");
                    $this->form_validation->set_rules("test_level","Level","required|max_length[10]");

                    if($this->form_validation->run()==FALSE){            
                        $this->load->view("admin/test/editTest_view",array("error" => ""));
                    }else{  
                        if(!$this->upload->do_upload()){
                            $test = array("test_title"     => $this->input->post("test_title"),                        
                                      "test_category"  => $this->input->post("test_category"),
                                      "test_level"     => $this->input->post("test_level")                                                                                                                                                        
                            ); 
                            $this->Test_model->updateTest($test,$this->input->post("test_id")); 
                            redirect(base_url()."index.php/admin/test/index");                                                   
                        }else{
                            $test = array("test_title"     => $this->input->post("test_title"),                        
                                      "test_category"  => $this->input->post("test_category"),
                                      "test_level"     => $this->input->post("test_level"),
                                      "test_content"   => $this->upload->data()['file_name']                                                                                                                                                         
                            );
                            $this->Test_model->updateTest($test,$this->input->post("test_id")); 
                            redirect(base_url()."index.php/admin/test/index"); 
                        }
                    }
                } else {
                    $this->form_validation->set_rules("test_title","Title","required|max_length[20]");
                    $this->form_validation->set_rules("test_category","Category","required|max_length[50]");
                    $this->form_validation->set_rules("test_level","Level","required|max_length[10]");
                    $this->form_validation->set_rules("test_content", "Content", 'trim|max_length[5000]');                                       
                    if($this->form_validation->run()==FALSE){   
                        $this->load->view("admin/test/editTest_view",$data);                
                    }else{
                        $test = array("test_title"    => $this->input->post("test_title"),
                                      "test_category" => $this->input->post("test_category"),
                                      "test_level"    => $this->input->post("test_level"),
                                      "test_content"  => $this->input->post("test_content")                                    
                                     );  
                        $this->Test_model->updateTest($test,$this->input->post("test_id"));                 
                        redirect(base_url()."index.php/admin/test"); 
                    }
                }                            	
            }else{
                $this->load->view("admin/test/editTest_view",$data);   
            }    
    }
    //--- Xoa Test
    function deleteTest() {
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5);
        $answer_id = $this->uri->segment(6);
        $question_id = ($question_id===null) ? "" : $question_id;
        $answer_id = ($answer_id===null) ? "" : $answer_id;
        if(!is_null($test_id)){        	
			$this->Test_model->deleteTest($test_id,$question_id,$answer_id);        		        	            
            redirect(base_url()."index.php/admin/test/index");        
        }else{
            return false;     
        }
    }
    function addQuestion() {
        $test_id = $this->uri->segment(4);
        $data['info'] = $this->Test_model->getTestById($test_id);
        $data['error']="";
        if(isset($_POST['ok'])){            
            $this->form_validation->set_rules("test_content", "Content", 'trim|max_length[5000]');   
            $this->form_validation->set_rules("question_content","Question's content","required|max_length[200]");
            $this->form_validation->set_rules("answer1","Answer1","required|max_length[200]");                                                               
            $this->form_validation->set_rules("answer2","Answer2","required|max_length[200]");
            $this->form_validation->set_rules("answer3","Answer3","required|max_length[200]");
            $this->form_validation->set_rules("answer4","Answer4","required|max_length[200]");
            $this->form_validation->set_rules("correctAnswer1","Correct Answer1","required");
            $this->form_validation->set_rules("correctAnswer2","Correct Answer2","required"); 
            $this->form_validation->set_rules("correctAnswer3","Correct Answer3","required"); 
            $this->form_validation->set_rules("correctAnswer4","Correct Answer4","required");                                                                               
            if($this->form_validation->run()==FALSE){   
                $this->load->view("admin/test/addQuestion_view",$data);                
            }else{
                $question = array("test_id" => $this->input->post("test_id"),
                                  "question_content" => $this->input->post("question_content")                                    
                                 );                                                                                   
                $this->Test_model->addQuestion($question);
                $maxQuestionId = $this->Test_model->getMaxQuestionId();                      
                $answer1 =  array("question_id"    => $maxQuestionId->max,
                                  "answer_content" => $this->input->post("answer1"),
                                  "answer_correct" => $this->input->post("correctAnswer1")                                    
                                 );                                                                                 
                $this->Test_model->addAnswer($answer1);
                $answer2 =  array("question_id"    => $maxQuestionId->max,
                                  "answer_content" => $this->input->post("answer2"),
                                  "answer_correct" => $this->input->post("correctAnswer2")                                    
                                 );                                                                                  
                $this->Test_model->addAnswer($answer2);
                $answer3 =  array("question_id"    => $maxQuestionId->max,
                                  "answer_content" => $this->input->post("answer3"),
                                  "answer_correct" => $this->input->post("correctAnswer3")                                    
                                 );                                                                                     
                $this->Test_model->addAnswer($answer3);
                $answer4 =  array("question_id"    => $maxQuestionId->max,
                                  "answer_content" => $this->input->post("answer4"),
                                  "answer_correct" => $this->input->post("correctAnswer4")                                    
                                 );                                                                                  
                $this->Test_model->addAnswer($answer4);
                redirect(base_url()."index.php/admin/test/detailTest/$test_id"); 
            }
        }else{
            $this->load->view("admin/test/addQuestion_view",$data);   
        }
    }
    function editQuestion() {
        // get id from url
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5);
        $data['test'] = $this->Test_model->getTestById($test_id);
        $data['question'] = $this->Test_model->getQuestionById($question_id);
        $data['answer'] = $this->Test_model->getAnswerByQuestionId($question_id);                
        $data['error']="";
        if(isset($_POST['ok'])){            
            $answers = $this->input->post('answer');
            $correctAnswer = ($this->input->post('correctAnswer')===null) ? "" : $this->input->post('correctAnswer');                    
            $this->form_validation->set_rules("question_content","Content","required|max_length[200]");                        
            if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/test/editQuestion_view",$data);                
            }else{
                $question = array("question_id"      =>$this->input->post("question_id"),                                                                     
                                  "test_id"          => $this->input->post("test_id"),
                                  "question_content" => $this->input->post("question_content")                                    
                                 );        
                $this->Test_model->updateQuestion($question,$this->input->post("question_id"));                   
                foreach($answers as $answer_id => $answer_content){
                    $answer =  array("question_id"    => $this->input->post("question_id"),
                                     "answer_id"      => $answer_id,
                                     "answer_content" => $answer_content,
                                     "answer_correct" => $correctAnswer[$answer_id]                                  
                                    );                                                                                                                                         
                    $this->Test_model->updateAnswer($answer,$answer_id);
                }                                                                 
                redirect(base_url()."index.php/admin/test/detailTest/$test_id"); 
            }
        }else{
            $this->load->view("admin/test/editQuestion_view",$data);   
        }
    }
    function deleteQuestion() {
        $test_id = $this->uri->segment(4);
        $question_id = $this->uri->segment(5); 
        if(!is_null($question_id)){         
            $this->Test_model->deleteQuestion($question_id);                                        
            redirect(base_url()."index.php/admin/test/detailTest/$test_id");        
        }else{
            return false;     
        }
    }
    function detailTest() {
        $test_id = $this->uri->segment(4);
        $detailTest = $this->Test_model->detailTest($test_id);  
        $data="";
        if($detailTest!=null){
            foreach($detailTest as $row){
                $detailQuestion = $this->Test_model->detailQuestion($row->test_id); 
                if($detailQuestion!=null){
                    foreach($detailQuestion as $key => $value){
                        $question_id = $value->question_id;                     
                        $detailAnswer = $this->Test_model->detailAnswer($question_id);
                        $detailQuestion[$key]->detailAnswer = $detailAnswer;
                    }
                    $data = array('detailTest'     => $detailTest, 
                                  'detailQuestion' => $detailQuestion             
                                 );       
                }else{
                    $detailQuestion = null;
                    $data = array('detailTest'     => $detailTest, 
                                  'detailQuestion' => $detailQuestion             
                                 );          
                }
            }
        }else{
            $detailTest = null;
            $data = array('detailTest' => $detailTest                                     
                         );                 
        }             
        $this->load->view('admin/test/detailTest_view',$data);
    }
}
?>
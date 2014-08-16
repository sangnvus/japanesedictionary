<?php 
/**
* 
*/
class ReadingDocument extends CI_Controller
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
        $this->load->model("ReadingDocument_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
    function listReadingDocument(){ 
        // count record
        $max = $this->ReadingDocument_model->num_rows_ReadingDocument();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/readingdocument/listReadingDocument";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['readingdocument'] = $this->ReadingDocument_model->getAllReadingDocument($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/readingdocument/listReadingDocument_view",$data);
        }else{
            $data['readingVocab'] = null;
            $this->load->view("admin/readingdocument/listReadingDocument_view",$data);
        }
    }
    function addReading() {
        $data['error'] = "";
        if (isset($_POST['ok'])){
            $this->form_validation->set_rules("reading_code","Code","required|max_length[50]");
            $this->form_validation->set_rules("reading_title","Title","required|max_length[100]");
            $this->form_validation->set_rules("reading_level","Level","required|max_length[10]");
            if($this->form_validation->run()==FALSE){            
                $this->load->view("admin/readingdocument/addReading_view",array("error"=>""));
            }else{                
                $reading = array("reading_code"   => $this->input->post("reading_code"),                        
                                 "reading_title"  => $this->input->post("reading_title"),
                                 "reading_level"  => $this->input->post("reading_level")
                                );                        
                $this->ReadingDocument_model->addReading($reading);
                redirect(base_url()."index.php/admin/readingdocument/listReadingDocument");       
            }
        }else{
            $this->load->view("admin/readingdocument/addReading_view",$data);
        }                
    }
    function editReading() {
        $reading_id = $this->uri->segment(4);
        $data['info'] = $this->ReadingDocument_model->getInfo($reading_id);
        $data['error'] = "";
        if (isset($_POST['ok'])) {
            $this->form_validation->set_rules("reading_id","ID","required");
            $this->form_validation->set_rules("reading_code","Code","required|max_length[50]");
            $this->form_validation->set_rules("reading_title","Title","required|max_length[100]");
            $this->form_validation->set_rules("reading_level","Level","required|max_length[10]");
            if($this->form_validation->run()==FALSE){            
                $this->load->view("admin/readingdocument/editReading_view",$data);
            }else{                
                $reading = array("reading_id"    => $this->input->post("reading_id"),                     
                                 "reading_code"  => $this->input->post("reading_code"),                        
                                 "reading_title" => $this->input->post("reading_title"),
                                 "reading_level" => $this->input->post("reading_level")
                                );  
                $this->ReadingDocument_model->updateReading($reading,$reading_id);
                redirect(base_url()."index.php/admin/readingdocument/listReadingDocument");       
            }
        }else {
            $this->load->view("admin/readingdocument/editReading_view",$data);
        }                
    }
    function deleteReadingDocument() {
        $reading_id = $this->uri->segment(4);
        if($reading_id != ""){            
            $this->ReadingDocument_model->deleteReadingDocument($reading_id);
            redirect(base_url()."index.php/admin/readingdocument/listReadingDocument");        
        }else{
            return false;     
        }

    }
    function getReadingByLevel() {
		$data = "";
        $txtLevel = "";        
        if(isset($_GET['txtLevel'])){
            $txtLevel = $_GET['txtLevel'];            
        }
        if(strpos($txtLevel,'%')!== false){                        
            $data['readingdocument'] = null;       
            $data['txtLevel'] = $txtLevel;    
            $this->load->view("admin/readingdocument/listReadingDocument_view",$data);
        }
        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;   
    	$max = $this->ReadingDocument_model->num_rowsBySearch($txtLevel);
        $min = 10;
        $data['txtLevel'] = $txtLevel;
        $data['num_rows'] = $max;
	        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/readingdocument/getReadingByLevel?txtLevel=".$txtLevel."&search=Search";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            // $config['uri_segment'] = 4;
            $config['page_query_string'] = TRUE;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['readingdocument'] = $this->ReadingDocument_model->getReadingByLevel($txtLevel,$min,$this->input->get('per_page'));

            $this->load->view("admin/readingdocument/listReadingDocument_view",$data);
        }else{
            $data['readingdocument'] = null;           
            $this->load->view("admin/readingdocument/listReadingDocument_view",$data);            
        }                     
	}
    function listReadingVocab() {
        // count record
        $reading_id = $this->uri->segment(4);
        $data['reading'] = $this->ReadingDocument_model->getInfo($reading_id);
        $max = $this->ReadingDocument_model->num_rows_ReadingVocab($reading_id);
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        $data['reading_id'] = $reading_id;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/readingdocument/listReadingVocab/$reading_id";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['readingVocab'] = $this->ReadingDocument_model->getAllReadingVocab($reading_id,$min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/readingdocument/listReadingVocabulary_view",$data);
        }else{
            $data['readingVocab'] =null;
            $this->load->view("admin/readingdocument/listReadingVocabulary_view",$data);
        }
    }
	//--- Xoa Reading
    function deleteReadingVocab() {
        $reading_id = $this->uri->segment(4);
        $readingvocabulary_id = $this->uri->segment(5);
        $readingvocabulary_id = ($readingvocabulary_id===null) ? "" : $readingvocabulary_id;             
        if($reading_id!=""){            
            $this->ReadingDocument_model->deleteVocab($reading_id,$readingvocabulary_id);
            redirect(base_url()."index.php/admin/readingdocument/listReadingVocab/$reading_id");        
        }else{
            return false;     
        }
    }
	function addReadingVocab() {
        $reading_id = $this->uri->segment(4);
        $data['info'] = $this->ReadingDocument_model->getInfo($reading_id);
        $data['error'] = "";       
        if(isset($_POST['ok']))
        {                               
            $this->form_validation->set_rules("readingvocabulary_hiragana","Hiragana","required|max_length[100]|is_unique[readingvocabulary.readingvocabulary_hiragana]");                                          
            $this->form_validation->set_rules("readingvocabulary_meaning","Meaning","required|max_length[100]");
            $this->form_validation->set_rules("readingvocabulary_kanji", "Kanji", 'trim|max_length[10]');                                                                                
            $this->form_validation->set_rules("readingvocabulary_type","Type","required|max_length[50]");                 
            if($this->form_validation->run()==FALSE){   
                $this->load->view("admin/readingdocument/addReadingVocab_view",$data);                
            }else{
                $vocab = array("reading_id"                  => $this->input->post("reading_id"),                                                              
                               "readingvocabulary_hiragana"  => $this->input->post("readingvocabulary_hiragana"),
                               "readingvocabulary_meaning"   => $this->input->post("readingvocabulary_meaning"),
                               "readingvocabulary_kanji"     => $this->input->post("readingvocabulary_kanji"),                                    
                               "readingvocabulary_type"      => $this->input->post("readingvocabulary_type")                                    
                              );          	                      
                $this->ReadingDocument_model->addReadingVocab($vocab);
                redirect(base_url()."index.php/admin/readingdocument/listReadingVocab/$reading_id"); 
            }
        }else{   
            $error="";
            $this->load->view("admin/readingdocument/addReadingVocab_view",$data);    
        }
    }
    function editReadingVocab() {
    	$reading_id = $this->uri->segment(4);
    	$readingvocabulary_id = $this->uri->segment(5);
        $data['reading'] = $this->ReadingDocument_model->getInfo($reading_id); 	
        $data['vocab'] = $this->ReadingDocument_model->getInfoVocab($readingvocabulary_id);
        $data['error'] = "";          
        if(isset($_POST['ok']))
        {                                                                            
            $this->form_validation->set_rules("readingvocabulary_id","ID","required");
            $this->form_validation->set_rules("readingvocabulary_hiragana","Hiragana","required|max_length[100]");                                          
            $this->form_validation->set_rules("readingvocabulary_meaning","Meaning","required|max_length[100]");
            $this->form_validation->set_rules("readingvocabulary_kanji", "Kanji", 'trim|max_length[10]');                                                              
            $this->form_validation->set_rules("readingvocabulary_type","Type","required|max_length[50]");                 
            if($this->form_validation->run()==FALSE){   
                $this->load->view("admin/readingdocument/editReadingVocab_view",$data);                
            }else{
                $readingvocabulary = array("reading_id"                 => $this->input->post("reading_id"),
                                           "readingvocabulary_hiragana" => $this->input->post("readingvocabulary_hiragana"),
                                           "readingvocabulary_meaning"  => $this->input->post("readingvocabulary_meaning"),
                                           "readingvocabulary_kanji"    => $this->input->post("readingvocabulary_kanji"),
                                           "readingvocabulary_type"     => $this->input->post("readingvocabulary_type"));                                        
                $this->ReadingDocument_model->updateVocab($readingvocabulary,$readingvocabulary_id);
                redirect(base_url()."index.php/admin/readingdocument/listReadingVocab/$reading_id"); 
            }
        }else{
            $this->load->view("admin/readingdocument/editReadingVocab_view",$data);   
        }
    } 

    //add Reading Article
    function viewReadingArticle() {
        $reading_id = $this->uri->segment(4);
        $data['reading'] = $this->ReadingDocument_model->getInfo($reading_id);
        $data['article'] = $this->ReadingDocument_model->getReadingArticleById($reading_id);
        $this->load->view('admin/readingdocument/viewReadingArticle_view', $data);
    }
	function addReadingArticle() {
        $reading_id = $this->uri->segment(4);
        $data['info'] = $this->ReadingDocument_model->getInfo($reading_id);
        $data['error'] = "";
        if($reading_id !="" && $data['info']!=NULL){            
            if(isset($_POST['ok'])){                       
                $this->form_validation->set_rules("reading_id","ID","required");
                $this->form_validation->set_rules("readingarticle_content","Content","required|max_length[5000]");                                          
                $this->form_validation->set_rules("readingarticle_question","Question","required|max_length[5000]");
                $this->form_validation->set_rules("readingarticle_answer","Answer","required|max_length[5000]");                                                                                  
                $this->form_validation->set_rules("readingarticle_meaning","Meaning","required|max_length[5000]");                 
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/readingdocument/addContentArticle_view",$data);                
                }else{
                    $contentArticle = array("reading_id"             => $this->input->post("reading_id"),                                                              
                                            "readingarticle_content" => $this->input->post("readingarticle_content"),
                                            "readingarticle_question"=> $this->input->post("readingarticle_question"),
                                            "readingarticle_answer"  => $this->input->post("readingarticle_answer"),
                                            "readingarticle_meaning" => $this->input->post("readingarticle_meaning")                                    
                                           );     			                      
                    $this->ReadingDocument_model->addArticle($contentArticle);
                    redirect(base_url()."index.php/admin/readingdocument/viewReadingArticle/$reading_id"); 
                }
            }else{
                $this->load->view("admin/readingdocument/addContentArticle_view",$data);    
            }     
        }else{            
            return false;
        }
    }
    function editReadingArticle() {
    	$reading_id = $this->uri->segment(4);
    	$readingarticle_id = $this->uri->segment(5);   	
        $data['reading'] = $this->ReadingDocument_model->getInfo($reading_id);
        $data['article'] = $this->ReadingDocument_model->getInfoArticle($readingarticle_id);
        $data['error'] = "";         
        if(isset($_POST['ok'])){                                                                       
            $this->form_validation->set_rules("readingarticle_id","ID","required");
            $this->form_validation->set_rules("readingarticle_content","Content","required|max_length[5000]");                                          
            $this->form_validation->set_rules("readingarticle_question","Question","required|max_length[5000]");
            $this->form_validation->set_rules("readingarticle_answer","Answer","required|max_length[5000]");                                                                                  
            $this->form_validation->set_rules("readingarticle_meaning","Meaning","required|max_length[5000]");                         
            if($this->form_validation->run()==FALSE){   
                $this->load->view("admin/readingdocument/editReadingArticle_view",$data);                
            }else{
                $readingArticle = array("reading_id"               => $this->input->post("reading_id"),                                                              
                                        "readingarticle_content"   => $this->input->post("readingarticle_content"),
                                        "readingarticle_question"  => $this->input->post("readingarticle_question"),
                                        "readingarticle_answer"    => $this->input->post("readingarticle_answer"),
                                        "readingarticle_meaning"   => $this->input->post("readingarticle_meaning")                                    
                                       );          		                    
                $this->ReadingDocument_model->updateContentArticle($readingArticle,$readingarticle_id);
                redirect(base_url()."index.php/admin/readingdocument/viewReadingArticle/$reading_id"); 
                }
        }else{
            $this->load->view("admin/readingdocument/editReadingArticle_view",$data);   
        }
    } 
    //--- Xoa Reading
    function deleteReadingArticle() {
        $reading_id = $this->uri->segment(4);
        $readingarticle_id = $this->uri->segment(5);           
        if($reading_id!=""){            
            $this->ReadingDocument_model->deleteReadingArticle($readingarticle_id);
            redirect(base_url()."index.php/admin/readingdocument/viewReadingArticle/$reading_id");        
        }else{
            return false;     
        }
    }
}
?>
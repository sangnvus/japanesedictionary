<?php 
/**
* 
*/
class ReadingDocument extends CI_Controller
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
        $this->load->model("ReadingDocument_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function listReadingVocab(){
		// count record
        $max = $this->ReadingDocument_model->num_rows_ReadingVocab();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/readingdocument/listReadingVocab";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['readingVocab'] = $this->ReadingDocument_model->getAllReadingVocab($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/readingdocument/listReadingVocabulary_view",$data);
        }else{
            $data['readingVocab'] =null;
            $this->load->view("admin/readingdocument/listReadingVocabulary_view",$data);
        }
	}
	function addReading(){
		$type = $this->uri->segment(4);
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/readingdocument/addReading_view",$data);
        } else {
            $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]|is_unique[readingdocument.reading_id]");
            $this->form_validation->set_rules("reading_title","reading_title","required|max_length[100]");
            $this->form_validation->set_rules("reading_level","reading_level","required|max_length[10]");
        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/readingdocument/addReading_view",array("error"=>""));
        }
        else
        {                
                $reading = array(                        
                        "reading_id"  => $this->input->post("reading_id"),                        
                        "reading_title"  => $this->input->post("reading_title"),
                        "reading_level"     => $this->input->post("reading_level")
                );
                try {
                    $this->ReadingDocument_model->addReading($reading);
                    if ($type == "vocab") {
                    	redirect(base_url()."index.php/admin/readingdocument/listReadingVocab");                                                   
                    } else {
                    	redirect(base_url()."index.php/admin/readingdocument/listReadingArt");
                    }                    
                    
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }                
                //$this->load->view("admin/vocabulary/addVocabulary_view",$data);
        }                
    }
    function getReadingByLevel(){
    	$type = $this->uri->segment(4);
		$data = "";
        $txtLevel = "";        
        if (isset($_GET['txtLevel'])) {
            $txtLevel = $_GET['txtLevel'];            
        }

        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;   
        if ($type == "vocab") {
        	$max = $this->ReadingDocument_model->num_rowsBySearch($txtLevel);
	        $min = 10;
	        $data['txtLevel'] = $txtLevel;
	        $data['num_rows'] = $max;
	        //--- Paging
	        if($max!=0){    
	            $this->load->library('pagination');                    
	            $config['base_url'] = base_url()."index.php/admin/readingdocument/getReadingByLevel";
	            $config['total_rows'] = $max;
	            $config['per_page'] = $min;
	            $config['num_link'] = 3; 
	            $config['uri_segment'] = 4;

	            $this->pagination->initialize($config);                        
	                        
	            $data['links'] = $this->pagination->create_links();
	            $data['readingVocab'] = $this->ReadingDocument_model->getReadingByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));

	            $this->load->view("admin/readingdocument/listSearchVocabulary_view",$data);
	        }else{
	            $data['readingVocab'] = null;            
	            $this->load->view("admin/readingdocument/listSearchVocabulary_view",$data);            
	        }
        } 
        if ($type == "article") {
        	$max = $this->ReadingDocument_model->num_rowsArticleBySearch($txtLevel);
	        $min = 10;
	        $data['txtLevel'] = $txtLevel;
	        $data['num_rows'] = $max;
	        //--- Paging
	        if($max!=0){    
	            $this->load->library('pagination');                    
	            $config['base_url'] = base_url()."index.php/admin/readingdocument/getReadingByLevel";
	            $config['total_rows'] = $max;
	            $config['per_page'] = $min;
	            $config['num_link'] = 3; 
	            $config['uri_segment'] = 4;

	            $this->pagination->initialize($config);                        
	                        
	            $data['links'] = $this->pagination->create_links();
	            $data['readingArticle'] = $this->ReadingDocument_model->getReadingArticleByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));

	            $this->load->view("admin/readingdocument/listSearchArticle_view",$data);
	        }else{
	            $data['readingArticle'] = null;            
	            $this->load->view("admin/readingdocument/listSearchArticle_view",$data);            
	        }
        }                      
	}
	//--- Xoa Reading
    function deleteReading(){
        $reading_id = $this->uri->segment(4);
        $readingvocabulary_id = $this->uri->segment(5);
        $readingvocabulary_id = ($readingvocabulary_id === null) ? "" : $readingvocabulary_id;             
        if($reading_id != ""){            
            $this->ReadingDocument_model->deleteReading($reading_id,$readingvocabulary_id);
            redirect(base_url()."index.php/admin/readingdocument/listReadingVocab");        
        }else{
            return false;     
        }
    }
	function addContent(){
        $reading_id = $this->uri->segment(4);
        $readingvocabulary_id = $this->uri->segment(5);
        $readingvocabulary_id = ($readingvocabulary_id === null) ? "" : $readingvocabulary_id;
        $data['info'] = $this->ReadingDocument_model->getInfoReading($reading_id,$readingvocabulary_id);
        $data['error'] = "";
        if($reading_id != "" && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                       
                    $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]");
		            $this->form_validation->set_rules("reading_title","reading_title","required|max_length[100]");
		            $this->form_validation->set_rules("reading_level","reading_level","required|max_length[10]");                                                      
		            
                    $this->form_validation->set_rules("readingvocabulary_hiragana","readingvocabulary_hiragana","required|max_length[100]");                                          
                    $this->form_validation->set_rules("readingvocabulary_meaning","readingvocabulary_meaning","required|max_length[100]");
                    $this->form_validation->set_rules("readingvocabulary_kanji", "readingvocabulary_kanji", 'trim|max_length[10]');                                                                                
                    $this->form_validation->set_rules("readingvocabulary_type","readingvocabulary_type","required|max_length[50]");
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/readingdocument/addContent_view",$data);                
                }else{
                      $reading = array(                        
                        "reading_id"  => $this->input->post("reading_id"),                        
                        "reading_title"  => $this->input->post("reading_title"),
                        "reading_level"     => $this->input->post("reading_level")                                                                                                                                                                   
               			 );
                      $content = array(          
                      				"reading_id"  => $this->input->post("reading_id"),                                                              
                                    "readingvocabulary_hiragana" => $this->input->post("readingvocabulary_hiragana"),
                                    "readingvocabulary_meaning" => $this->input->post("readingvocabulary_meaning"),
                                    "readingvocabulary_kanji"     => $this->input->post("readingvocabulary_kanji"),                                    
                                    "readingvocabulary_type"     => $this->input->post("readingvocabulary_type")                                    
                                 );                      
                      $this->ReadingDocument_model->addContent($content);
                      redirect(base_url()."index.php/admin/readingdocument/listReadingVocab"); 
                }
            }
            else
            {
                $this->load->view("admin/readingdocument/addContent_view",$data);    
            }            
        }
        else
        {            
            return false;
        }
    }
    function editReading(){
    	$reading_id = $this->uri->segment(4);
    	$readingvocabulary_id = $this->uri->segment(5); 
    	$readingvocabulary_id = ($readingvocabulary_id===null) ? "" : $readingvocabulary_id;   	
        $data['info'] = $this->ReadingDocument_model->getInfoReading($reading_id,$readingvocabulary_id);
        $data['error'] = "";
        if(is_numeric($readingvocabulary_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                        
                        $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]");
                        $this->form_validation->set_rules("reading_title","reading_title","required|max_length[100]");
                        $this->form_validation->set_rules("reading_level","reading_level","required|max_length[10]");                                                    
                        $this->form_validation->set_rules("readingvocabulary_id","readingvocabulary_id","required");
                        $this->form_validation->set_rules("readingvocabulary_hiragana","readingvocabulary_hiragana","required|max_length[100]");                                          
                        $this->form_validation->set_rules("readingvocabulary_meaning","readingvocabulary_meaning","required|max_length[100]");
                        $this->form_validation->set_rules("readingvocabulary_kanji", "readingvocabulary_kanji", 'trim|max_length[10]');                                                              
                        $this->form_validation->set_rules("readingvocabulary_type","readingvocabulary_type","required|max_length[50]");                                                                                                     
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/readingdocument/editReading_view",$data);                
                }else{
                      $reading = array(                        
                        "reading_id"  => $this->input->post("reading_id"),                        
                        "reading_title"  => $this->input->post("reading_title"),
                        "reading_level"     => $this->input->post("reading_level")
               			 );
                      $readingvocabulary = array(                                    
                                    "reading_id"  => $this->input->post("reading_id"),
                                    "readingvocabulary_hiragana" => $this->input->post("readingvocabulary_hiragana"),
                                    "readingvocabulary_meaning" => $this->input->post("readingvocabulary_meaning"),
                                    "readingvocabulary_kanji"     => $this->input->post("readingvocabulary_kanji"),
                                    "readingvocabulary_type"     => $this->input->post("readingvocabulary_type")                                    
                                 );   
                      $this->ReadingDocument_model->updateReading($reading,$reading_id);                 
                      $this->ReadingDocument_model->updateContent($readingvocabulary,$readingvocabulary_id);
                      redirect(base_url()."index.php/admin/readingdocument/listReadingVocab"); 
                }
            }
            else
            {
                $this->load->view("admin/readingdocument/editReading_view",$data);   
            }
        }
        else
        {            
            if(isset($_POST['ok']))
            {                                               
                        $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]");
                        $this->form_validation->set_rules("reading_title","reading_title","required|max_length[100]");
                        $this->form_validation->set_rules("reading_level","reading_level","required|max_length[10]");             
                        if($this->form_validation->run()==FALSE){   
                            $this->load->view("admin/readingdocument/editReading_view",$data);                
                        }else{
                              $reading = array(                        
                                "reading_id"  => $this->input->post("reading_id"),                        
                                "reading_title"  => $this->input->post("reading_title"),
                                "reading_level"     => $this->input->post("reading_level"),
                                
                                 );   
                          $this->ReadingDocument_model->updateReading($reading,$reading_id);                                       
                          redirect(base_url()."index.php/admin/readingdocument/listReadingVocab"); 
                        }    
            }
            else
            {
                $this->load->view("admin/readingdocument/editReading_view",$data);   
            }
        }
    } 

    //List Reading Article
    function listReadingArt(){
		// count record
        $max = $this->ReadingDocument_model->num_rows_ReadingArticle();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/readingdocument/listReadingArt";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
            

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['readingArticle'] = $this->ReadingDocument_model->getAllReadingArticle($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/readingdocument/listReadingArticle_view",$data);
        }else{
            $data['readingArticle'] =null;
            $this->load->view("admin/readingdocument/listReadingArticle_view",$data);
        }
	}
	function addContentArticle(){
        $reading_id = $this->uri->segment(4);
        $readingarticle_id = $this->uri->segment(5);
        $readingarticle_id = ($readingarticle_id === null) ? "" : $readingarticle_id;
        $data['info'] = $this->ReadingDocument_model->getInfoReadingArticle($reading_id,$readingarticle_id);
        $data['error'] = "";
        if($reading_id != "" && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                       
                    $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]");
		            $this->form_validation->set_rules("reading_title","reading_title","required|max_length[100]");
		            $this->form_validation->set_rules("reading_level","reading_level","required|max_length[10]");                                                      
		            
                    $this->form_validation->set_rules("readingarticle_content","readingarticle_content","required|max_length[5000]");                                          
                    $this->form_validation->set_rules("readingarticle_question","readingarticle_question","required|max_length[5000]");
                    $this->form_validation->set_rules("readingarticle_answer","readingarticle_answer","required|max_length[5000]");                                                                                  
                    $this->form_validation->set_rules("readingarticle_meaning","readingarticle_meaning","required|max_length[5000]");
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/readingdocument/addContentArticle_view",$data);                
                }else{
                      $reading = array(                        
                        "reading_id"  => $this->input->post("reading_id"),                        
                        "reading_title"  => $this->input->post("reading_title"),
                        "reading_level"     => $this->input->post("reading_level")                                                                                                                                            
                        
               			 );
                      $contentArticle = array(          
                      				"reading_id"  => $this->input->post("reading_id"),                                                              
                                    "readingarticle_content" => $this->input->post("readingarticle_content"),
                                    "readingarticle_question" => $this->input->post("readingarticle_question"),
                                    "readingarticle_answer"     => $this->input->post("readingarticle_answer"),
                                    "readingarticle_meaning"     => $this->input->post("readingarticle_meaning")                                    
                                 );                      
                      $this->ReadingDocument_model->addContentArticle($contentArticle);
                      redirect(base_url()."index.php/admin/readingdocument/listReadingArt"); 
                }
            }
            else
            {
                $this->load->view("admin/readingdocument/addContentArticle_view",$data);    
            }
            
        }
        else
        {            
            return false;
        }
    }
    function editReadingArticle(){
    	$reading_id = $this->uri->segment(4);
    	$readingarticle_id = $this->uri->segment(5); 
    	$readingarticle_id = ($readingarticle_id===null) ? "" : $readingarticle_id;   	
        $data['info'] = $this->ReadingDocument_model->getInfoReadingArticle($reading_id,$readingarticle_id);
        $data['error'] = "";
        if(is_numeric($readingarticle_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]");
		            $this->form_validation->set_rules("reading_title","reading_title","requiredmax_length[100]");
		            $this->form_validation->set_rules("reading_level","reading_level","requiredmax_length[10]");                                               
		            $this->form_validation->set_rules("readingarticle_id","readingarticle_id","required");
                    $this->form_validation->set_rules("readingarticle_content","readingarticle_content","required|max_length[5000]");                                          
                    $this->form_validation->set_rules("readingarticle_question","readingarticle_question","required|max_length[5000]");
                    $this->form_validation->set_rules("readingarticle_answer","readingarticle_answer","required|max_length[5000]");                                                                                  
                    $this->form_validation->set_rules("readingarticle_meaning","readingarticle_meaning","required|max_length[5000]");
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/readingdocument/editReadingArticle_view",$data);                
                }else{
                      $reading = array(                        
                        "reading_id"  => $this->input->post("reading_id"),                        
                        "reading_title"  => $this->input->post("reading_title"),
                        "reading_level"     => $this->input->post("reading_level"),
                                                                                                                                                                    
               			 );
                      $readingArticle = array(          
                      				"reading_id"  => $this->input->post("reading_id"),                                                              
                                    "readingarticle_content" => $this->input->post("readingarticle_content"),
                                    "readingarticle_question" => $this->input->post("readingarticle_question"),
                                    "readingarticle_answer"     => $this->input->post("readingarticle_answer"),
                                    "readingarticle_meaning"     => $this->input->post("readingarticle_meaning")                                    
                                 );    
                      $this->ReadingDocument_model->updateReadingArticle($reading,$reading_id);                 
                      $this->ReadingDocument_model->updateContentArticle($readingArticle,$readingarticle_id);
                      redirect(base_url()."index.php/admin/readingdocument/listReadingArt"); 
                }
            }
            else
            {
                $this->load->view("admin/readingdocument/editReadingArticle_view",$data);   
            }
        }
        else
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("reading_id","reading_id","required|max_length[20]");
		            $this->form_validation->set_rules("reading_title","reading_title","required|max_length[100]");
		            $this->form_validation->set_rules("reading_level","reading_level","required|max_length[10]");
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/readingdocument/editReadingArticle_view",$data);                
                }else{
                      $reading = array(                        
                        "reading_id"  => $this->input->post("reading_id"),                        
                        "reading_title"  => $this->input->post("reading_title"),
                        "reading_level"     => $this->input->post("reading_level"),                                                                                                                                                                    
               			 );
                      $this->ReadingDocument_model->updateReadingArticle($reading,$reading_id);                 
                      redirect(base_url()."index.php/admin/readingdocument/listReadingArt"); 
                }
            }
            else
            {
                $this->load->view("admin/readingdocument/editReadingArticle_view",$data);   
            }
        }
    } 
    //--- Xoa Reading
    function deleteReadingArticle(){
        $reading_id = $this->uri->segment(4);
        $readingarticle_id = $this->uri->segment(5);
        $readingarticle_id = ($readingarticle_id === null) ? "" : $readingarticle_id;             
        if($reading_id != ""){            
            $this->ReadingDocument_model->deleteReadingArticle($reading_id,$readingarticle_id);
            redirect(base_url()."index.php/admin/readingdocument/listReadingArt");        
        }else{
            return false;     
        }
    }
}
 ?>
<?php 
/**
* 
*/
class Vocabulary extends CI_Controller
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
        $this->load->model("Vocabulary_model");
	}
	//list Vocabulary
	function index(){	
		// count record
        $max = $this->Vocabulary_model->num_rows();
        // so record tren 1 page
        $min = 5;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/vocabulary/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
            

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['vocabulary'] = $this->Vocabulary_model->getAllVocabulary($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/vocabulary/listVocabulary_view",$data);
        }else{
            $data['vocabulary'] =null;
            $this->load->view("admin/vocabulary/listVocabulary_view",$data);
        }
	}
    function getVocabularyByRomaji(){
        $data = "";
        $txtRomaji = "";        
        if (isset($_GET['txtRomaji'])) {
            $txtRomaji = $_GET['txtRomaji'];            
        }

        $txtRomaji = ($txtRomaji===null) ? "" : $txtRomaji;   

        $max = $this->Vocabulary_model->num_rowsBySearch($txtRomaji);
        $min = 5;
        $data['txtRomaji'] = $txtRomaji;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/vocabulary/getVocabularyByRomaji";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['vocabulary'] = $this->Vocabulary_model->getVocabularyByRomaji($txtRomaji,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/vocabulary/listSearchVocab_view",$data);
        }else{
            $data['vocabulary'] = null;            
            $this->load->view("admin/vocabulary/listSearchVocab_view",$data);            
        }
    }
    function addVocabulary(){
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/vocabulary/addVocabulary_view",$data);
        } else {
            $this->form_validation->set_rules("v_hiragana","V_hiragana","required|max_length[32]|callback_checkVocabulary");
            $this->form_validation->set_rules("v_romaji","V_romaji","required");
            //$this->form_validation->set_rules("v_specialized","V_specialized","required");        

        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/vocabulary/addVocabulary_view",array("error"=>""));
        }
        else
        {                
                $vocab = array(                        
                        "v_hiragana"  => $this->input->post("v_hiragana"),                        
                        "v_romaji"  => $this->input->post("v_romaji"),
                        "v_specialized"     => $this->input->post("v_specialized"),                                                                                                                    
                        "v_status"    => 1, // da kich hoat
                );
                try {
                    $this->Vocabulary_model->addVocabulary($vocab);
                    redirect(base_url()."index.php/admin/vocabulary/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }                
                //$this->load->view("admin/vocabulary/addVocabulary_view",$data);
        }                
    }
    function editVocab(){
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
        $data['error'] = "";
        if(is_numeric($v_id) && is_numeric($m_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("v_id","V_ID","required");   
                    $this->form_validation->set_rules("v_hiragana","Hiragana","required");
                    $this->form_validation->set_rules("v_romaji","Romaji","required");                    
                    $this->form_validation->set_rules("m_meaningvn","Meaning","required|max_length[32]");                
                    $this->form_validation->set_rules("m_category","Category","required");                                          
                    $this->form_validation->set_rules("m_kanji","Kanji","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/vocabulary/editVocab_view",$data);                
                }else{
                      $vocab = array(
                                    "v_id" => $this->input->post("v_id"),
                                    "v_hiragana" => $this->input->post("v_hiragana"),
                                    "v_romaji" => $this->input->post("v_romaji"),
                                    "v_specialized" => $this->input->post("v_specialized"),
                                    "v_status" => 1
                                    );
                      $meaning = array(                                    
                                    "v_id"  => $this->input->post("v_id"),
                                    "m_meaningvn" => $this->input->post("m_meaningvn"),
                                    "m_category" => $this->input->post("m_category"),
                                    "m_kanji"     => $this->input->post("m_kanji")
                                 );   
                      $this->Vocabulary_model->updateVocab($vocab,$v_id);                 
                      $this->Vocabulary_model->updateMeaning($meaning,$v_id);
                      redirect(base_url()."index.php/admin/vocabulary"); 
                }
            }
            else
            {
                $this->load->view("admin/vocabulary/editVocab_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
    //--- Xoa Vocabulary
    function deleteVocabulary(){
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id === null) ? "" : $m_id;
        if(is_numeric($v_id)){            
            $this->Vocabulary_model->deleteVocabulary($v_id,$m_id);
            redirect(base_url()."index.php/admin/vocabulary/index");        
        }else{
            return false;     
        }
    }
    function checkVocabulary($v_hiragana)
    {
        $v_id = $this->uri->segment(4);
        if($this->Vocabulary_model->getVocabulary($v_hiragana,$v_id)==TRUE){
            return TRUE;
        }
        else{
            $this->form_validation->set_message("checkVocabulary","This vocabulary is existed, please try again");
            return FALSE;
       }
    }
    function addMeaning(){
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id === null) ? "" : $m_id;
        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
        $data['error'] = "";
        if(is_numeric($v_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                            
                    $this->form_validation->set_rules("m_meaningvn","Meaning","required|max_length[32]");                
                    $this->form_validation->set_rules("m_category","Category","required");                                          
                    $this->form_validation->set_rules("m_kanji","Kanji","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/vocabulary/addMeaning_view",$data);                
                }else{
                      $meaning = array(                                    
                                    "v_id"  => $this->input->post("v_id"),
                                    "m_meaningvn" => $this->input->post("m_meaningvn"),
                                    "m_category" => $this->input->post("m_category"),
                                    "m_kanji"     => $this->input->post("m_kanji")
                                 );                      
                      $this->Vocabulary_model->addMeaning($meaning);
                      redirect(base_url()."index.php/admin/vocabulary"); 
                }
            }
            else
            {
                $this->load->view("admin/vocabulary/addMeaning_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
    function referenceSentence(){
        // count record
        $max = $this->Vocabulary_model->num_rowsReferSentence();
        // so record tren 1 page
        $min = 1;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/vocabulary/referenceSentence";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
            

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['referSentence'] = $this->Vocabulary_model->getReferSentence($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/vocabulary/listReferSentence_view",$data);
        }else{
            $data['referSentence'] = null;
            $this->load->view("admin/vocabulary/listReferSentence_view",$data);
        }
    }
    function getReferByMid(){
        $data = "";
        $txtMid = "";        
        if (isset($_GET['txtMid'])) {
            $txtMid = $_GET['txtMid'];            
        }

        $txtMid = ($txtMid===null) ? "" : $txtMid;   

        $max = $this->Vocabulary_model->num_rowsReferBySearch($txtMid);
        $min = 5;
        $data['txtMid'] = $txtMid;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/vocabulary/getReferByMid";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['referSentence'] = $this->Vocabulary_model->getReferByMid($txtMid,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/vocabulary/listSearchRefer_view",$data);
        }else{
            $data['referSentence'] = null;
            $this->load->view("admin/vocabulary/listSearchRefer_view",$data);
        }
    }
    function addRefer(){
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/vocabulary/addReferSentence_view",$data);
        } else {
            $this->form_validation->set_rules("m_id","M_id","required");
            $this->form_validation->set_rules("s_id","s_id","required");
            //$this->form_validation->set_rules("v_specialized","V_specialized","required");        

        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/vocabulary/addReferSentence_view",array("error"=>""));
        }
        else
        {                
                $refer = array(                        
                        "m_id"  => $this->input->post("m_id"),                        
                        "s_id"  => $this->input->post("s_id"),
                );
                try {
                    $this->Vocabulary_model->addRefer($refer);
                    redirect(base_url()."index.php/admin/vocabulary/referenceSentence");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }
                
               // $this->load->view("admin/vocabulary/addReferSentence_view",$data);
        }
    }
    function editRefer(){
        $m_id = $this->uri->segment(4);
        $s_id = $this->uri->segment(5);
        $data['info'] = $this->Vocabulary_model->getInfoRefer($m_id,$s_id);
        $data['error'] = "";
        if(is_numeric($m_id) && is_numeric($s_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                            
                    $this->form_validation->set_rules("m_id","M_id","required");                
                    $this->form_validation->set_rules("s_id","S_id","required");                                                                                      
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/vocabulary/editRefer_view",$data);                
                }else{
                       $refer = array(                                    
                                    "m_id"  => $this->input->post("m_id"),
                                    "s_id" => $this->input->post("s_id"),
                                 );                      
                      $this->Vocabulary_model->updateRefer($refer,$m_id,$s_id);
                      redirect(base_url()."index.php/admin/vocabulary/referenceSentence"); 
                }
            }
            else
            {
                $this->load->view("admin/vocabulary/editRefer_view",$data);   
            }            
        }
        else
        {            
            return false;
        }
    }
    function deleteRefer(){
        $m_id = $this->uri->segment(4);             
        $s_id = $this->uri->segment(5);
        if(is_numeric($m_id) && is_numeric($s_id)){            
            $this->Vocabulary_model->deleteRefer($m_id,$s_id);
            redirect(base_url()."index.php/admin/vocabulary/referenceSentence");        
        }else{
            return false;     
        }
    }
}
 ?>
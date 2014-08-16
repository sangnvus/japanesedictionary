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
        if (!$this->my_auth->is_Admin()) {            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	//list Vocabulary
	function index() 
    {	
		// count record
        $max = $this->Vocabulary_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if ($max != 0) {    
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
        } else {
            $data['vocabulary'] = null;
            $this->load->view("admin/vocabulary/listVocabulary_view",$data);
        }
	}
    function listContributedVocab() 
    {
        // count record
        $max = $this->Vocabulary_model->num_rows_contributed();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_contributed'] = $max;
        //--- Paging
        if ($max != 0) {    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/vocabulary/listContributedVocab";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['vocabulary'] = $this->Vocabulary_model->getContributedVocab($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/vocabulary/listContributedVocab_view",$data);
        } else {
            $data['vocabulary'] = null;
            $this->load->view("admin/vocabulary/listContributedVocab_view",$data);
        }
    }
    function approvedVocab() 
    {
       $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id === null) ? "" : $m_id;
        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
        $data['error'] = "";
        if (is_numeric($v_id) && is_numeric($m_id) && $data['info'] != NULL) {            
            if (isset($_POST['ok'])) {                         
                $this->form_validation->set_rules("v_id","ID","required");   
                $this->form_validation->set_rules("v_hiragana","Hiragana","required|max_length[200]|is_unique[vocabulary.v_id]");
                $this->form_validation->set_rules("v_romaji","Romaji","required|max_length[200]");                    
                $this->form_validation->set_rules("m_meaningvn","Meaning","required|max_length[500]");                
                $this->form_validation->set_rules("m_category","Category","required|max_length[10]");                                          
                $this->form_validation->set_rules("m_kanji","Kanji","max_length[10]");
                $this->form_validation->set_rules("m_specialized","Specialized","max_length[200]");                     
                if ($this->form_validation->run() == FALSE) {   
                    $this->load->view("admin/vocabulary/approvedVocab_view",$data);                
                } else {
                    $vocab = array("v_id"       => $this->input->post("v_id"),
                                   "v_hiragana" => $this->input->post("v_hiragana"),
                                   "v_romaji"   => $this->input->post("v_romaji"),
                                   "v_status"   => 1
                                  );              
                    $meaning = array("v_id"          => $this->input->post("v_id"),
                                     "m_meaningvn"   => $this->input->post("m_meaningvn"),
                                     "m_category"    => $this->input->post("m_category"),
                                     "m_kanji"       => $this->input->post("m_kanji"),
                                     "m_specialized" => $this->input->post("m_specialized"),
                                    );
                    if ($this->Vocabulary_model->checkApprovedVocab(trim($this->input->post("v_hiragana")),$this->input->post("m_id"),trim($this->input->post("m_meaningvn"))) == TRUE) {
                        $data['error'] = "Meaning existed!";
                        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
                        $this->load->view("admin/vocabulary/editVocab_view",$data);                                                 
                    } else {
                        $this->Vocabulary_model->updateVocab($vocab,$v_id);                 
                        $this->Vocabulary_model->updateMeaning($meaning,$m_id);
                        redirect(base_url()."index.php/admin/vocabulary/listContributedVocab");  
                    }                                                                       
                }
            } else {
                $this->load->view("admin/vocabulary/approvedVocab_view",$data);   
            }    
        } else {            
            $this->load->view("admin/vocabulary/errorApproved_view");
        }
    }
    function getVocabularyByRomaji() 
    {
        $data = "";
        $txtRomaji = "";        
        if (isset($_GET['txtRomaji'])) {
            $txtRomaji = stripslashes(trim($_GET['txtRomaji']));            
        }
        $txtRomaji = ($txtRomaji === null) ? "" : $txtRomaji; 
        if (strpos($txtRomaji,'%') !== false) {                        
            $data['vocabulary'] = null;                        
            $this->load->view("admin/vocabulary/listSearchVocab_view",$data);  
        }
        if ($txtRomaji != "") {                
            $max = $this->Vocabulary_model->num_rowsBySearch($txtRomaji);        
            $min = 10;        
            $data['txtRomaji'] = $txtRomaji;
            $data['num_rows'] = $max;
            //--- Paging
            if ($max != 0) {    
                $this->load->library('pagination');                    
                $config['base_url'] = base_url()."index.php/admin/vocabulary/getVocabularyByRomaji?txtRomaji=".$txtRomaji."&search=Search";
                $config['total_rows'] = $max;
                $config['per_page'] = $min;
                $config['num_link'] = 3; 
                //$config['uri_segment'] = $this->input->get('per_page');
                $config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);                                   
                $data['links'] = $this->pagination->create_links();
                $data['vocabulary'] = $this->Vocabulary_model->getVocabularyByRomaji($txtRomaji,$min,$this->input->get('per_page'));            
                $this->load->view("admin/vocabulary/listSearchVocab_view",$data);
            } else {
                $data['vocabulary'] = null;            
                $this->load->view("admin/vocabulary/listSearchVocab_view",$data);            
            }
        } else {
            $data['vocabulary'] = null;            
            $this->load->view("admin/vocabulary/listSearchVocab_view",$data);            
        }
    }
    function addVocabulary() 
    {
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/vocabulary/addVocabulary_view",$data);
        } else {
            $this->form_validation->set_rules("v_hiragana","Hiragana","required|max_length[200]|callback_checkVocabulary");
            $this->form_validation->set_rules("v_romaji","Romaji","required|max_length[200]");       
            if ($this->form_validation->run() == FALSE) {            
                $this->load->view("admin/vocabulary/addVocabulary_view",array("error" => ""));
            } else {                
                $vocab = array("v_hiragana"  => $this->input->post("v_hiragana"),                        
                               "v_romaji"    => $this->input->post("v_romaji"),                                                                                                                 
                               "v_status"    => 1, // da kich hoat
                              );                               
                try {
                    $this->Vocabulary_model->addVocabulary($vocab);
                    redirect(base_url()."index.php/admin/vocabulary/index");                                                   
                } catch(Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
            }                
        }                
    }
    function editVocab() 
    {
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id===null) ? "" : $m_id;
        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
        $data['error'] = "";
        if (is_numeric($v_id) && is_numeric($m_id) && $data['info'] != NULL) {            
            if (isset($_POST['ok'])) {                         
                $this->form_validation->set_rules("v_id","ID","required");   
                $this->form_validation->set_rules("v_hiragana","Hiragana","required|max_length[200]");
                $this->form_validation->set_rules("v_romaji","Romaji","required|max_length[200]");                    
                $this->form_validation->set_rules("m_meaningvn","Meaning","required|max_length[500]");                
                $this->form_validation->set_rules("m_category","Category","required|max_length[10]");                                          
                $this->form_validation->set_rules("m_kanji","Kanji","max_length[10]");
                $this->form_validation->set_rules("m_specialized","Specialized","max_length[200]");                   
                if ($this->form_validation->run() == FALSE) {   
                    $this->load->view("admin/vocabulary/editVocab_view",$data);                
                } else {
                    $vocab = array("v_id"       => $this->input->post("v_id"),
                                   "v_hiragana" => $this->input->post("v_hiragana"),
                                   "v_romaji"   => $this->input->post("v_romaji"),
                                   "v_status"   => 1
                                  );              
                    $meaning = array("v_id"          => $this->input->post("v_id"),
                                     "m_meaningvn"   => $this->input->post("m_meaningvn"),
                                     "m_category"    => $this->input->post("m_category"),
                                     "m_kanji"       => $this->input->post("m_kanji"),
                                     "m_specialized" => $this->input->post("m_specialized"),
                                    );
                    if ($this->Vocabulary_model->checkMeaningVocab(trim($this->input->post("v_hiragana")),$this->input->post("m_id"),trim($this->input->post("m_meaningvn"))) == TRUE) {
                        $data['error'] = "Meaning existed!";
                        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
                        $this->load->view("admin/vocabulary/editVocab_view",$data);                                                 
                    } else {
                        $this->Vocabulary_model->updateVocab($vocab,$v_id);                 
                        $this->Vocabulary_model->updateMeaning($meaning,$m_id);
                        redirect(base_url()."index.php/admin/vocabulary"); 
                    }                    
                }
            } else {
                $this->load->view("admin/vocabulary/editVocab_view",$data);   
            }   
        } else {            
            if (isset($_POST['ok'])) {                         
                $this->form_validation->set_rules("v_id","ID","required");   
                $this->form_validation->set_rules("v_hiragana","Hiragana","required|max_length[200]");
                $this->form_validation->set_rules("v_romaji","Romaji","required|max_length[200]");                     
                if ($this->form_validation->run() == FALSE) {   
                    $this->load->view("admin/vocabulary/editVocab_view",$data);                
                } else {
                    $vocab = array("v_id"       => $this->input->post("v_id"),
                                   "v_hiragana" => $this->input->post("v_hiragana"),
                                   "v_romaji"   => $this->input->post("v_romaji"),
                                   "v_status"   => 1
                                  );
                    if ($this->Vocabulary_model->checkEditVocabulary(trim($this->input->post("v_hiragana")),$this->input->post("v_id")) == TRUE) {
                        $data['error'] = "Vocabulary existed!";
                        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
                        $this->load->view("admin/vocabulary/editVocab_view",$data);
                    } else {                        
                        $this->Vocabulary_model->updateVocab($vocab,$v_id);                 
                        redirect(base_url()."index.php/admin/vocabulary"); 
                    }                                    
                }
            } else {
                $this->load->view("admin/vocabulary/editVocab_view",$data);   
            }
        }
    }
    //--- Delete Vocabulary
    function deleteVocabulary() 
    {
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id === null) ? "" : $m_id;
        if (is_numeric($v_id)) {            
            $this->Vocabulary_model->deleteVocabulary($v_id,$m_id);
            redirect(base_url()."index.php/admin/vocabulary/index");        
        } else {
            return false;     
        }
    }
    function deleteContributedVocabulary() 
    {
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id===null) ? "" : $m_id;
        if (is_numeric($v_id)) {            
            $this->Vocabulary_model->deleteVocabulary($v_id,$m_id);
            redirect(base_url()."index.php/admin/vocabulary/listContributedVocab");        
        } else {
            return false;     
        }
    }
    function checkVocabulary($v_hiragana) 
    {
        $v_id = $this->uri->segment(4);
        if ($this->Vocabulary_model->getVocabulary($v_hiragana,$v_id) == TRUE) {
            return TRUE;
        } else {
            $this->form_validation->set_message("checkVocabulary","Vocabulary has been existed, please try again!");
            return FALSE;
       }
    }
    function checkMeaning($m_meaningvn) 
    {
        $v_id = $this->uri->segment(4);
        if ($this->Vocabulary_model->checkMeaning(trim($m_meaningvn),$v_id) == TRUE) {
            return TRUE;
        } else {
            $this->form_validation->set_message("checkMeaning","Meaning of vocabulary has been existed, please try again!");
            return FALSE;
       }
    }
    function addMeaning() 
    {
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id === null) ? "" : $m_id;
        $data['info'] = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
        $data['error'] = "";
        if (is_numeric($v_id) && $data['info'] != NULL) {            
            if (isset($_POST['ok'])) {                            
                $this->form_validation->set_rules("m_meaningvn","Meaning","required|max_length[500]|callback_checkMeaning");                
                $this->form_validation->set_rules("m_category","Category","required|max_length[10]");                                          
                $this->form_validation->set_rules("m_kanji","Kanji","max_length[10]");
                $this->form_validation->set_rules("m_specialized","Specialized","max_length[200]");                        
                if ($this->form_validation->run() == FALSE) {   
                    $this->load->view("admin/vocabulary/addMeaning_view",$data);                
                } else {
                    $meaning = array("v_id"          => $this->input->post("v_id"),
                                     "m_meaningvn"   => $this->input->post("m_meaningvn"),
                                     "m_category"    => $this->input->post("m_category"),
                                     "m_kanji"       => $this->input->post("m_kanji"),
                                     "m_specialized" => $this->input->post("m_specialized"),
                                    );                                                                          
                    $this->Vocabulary_model->addMeaning($meaning);
                    redirect(base_url()."index.php/admin/vocabulary"); 
                }
            } else {
                $this->load->view("admin/vocabulary/addMeaning_view",$data);   
            }    
        } else {            
            return false;
        }
    }
    function addRefer() 
    {
        $v_id = $this->uri->segment(4);
        $m_id = $this->uri->segment(5);
        $m_id = ($m_id===null) ? "" : $m_id;
        $vocabulary = $this->Vocabulary_model->getInfoVocab($v_id,$m_id);
        $sentence = $this->Vocabulary_model->getSentenceByHiragana($vocabulary['v_romaji']);
        $data['error'] = "";
        if (is_numeric($v_id) && is_numeric($m_id) && $vocabulary != NULL) {            
            if (isset($_POST['ok'])) {                         
                $this->form_validation->set_rules("s_id","ID","required");                    
                $this->form_validation->set_message("required"," No sentence found!");               
                if ($this->form_validation->run() == FALSE) {   
                    $data = array('vocabulary' => $vocabulary,
                                  'sentence'   => $sentence
                                 ); 
                    $this->load->view("admin/vocabulary/addReferSentence_view",$data);                
                } else {
                    $refer = array('m_id' => $this->input->post("m_id"),
                                   's_id' => $this->input->post("s_id")
                                  );                       
                    if ($this->Vocabulary_model->checkMid_Sid($this->input->post("m_id"),$this->input->post("s_id")) == TRUE) {
                        $data = array('vocabulary' => $vocabulary,
                                      'sentence'   => $sentence,
                                      'error'      =>"Existed!"
                                     );
                        $this->load->view("admin/vocabulary/addReferSentence_view",$data);
                    } else {
                        try{
                            $this->Vocabulary_model->addRefer($refer);
                            redirect(base_url()."index.php/admin/vocabulary");                                                   
                        }catch(Exception $e){
                            show_404();
                            log_message('error', $e->getMessage());
                        }
                    }
                }
            } else {
                $data = array('vocabulary' => $vocabulary,
                              'sentence'   => $sentence
                             );
                $this->load->view("admin/vocabulary/addReferSentence_view",$data);   
            }            
        } else {
            $this->load->view("admin/vocabulary/errorAddRefer_view");
        }      
    }
    function checkExistMid($m_id) 
    {        
        if ($this->Vocabulary_model->checkMid($m_id) == TRUE) {
            $this->form_validation->set_message("checkExistMid","M_id not exist!");
            return FALSE;
        } else {
            return TRUE;
       }
    }
    function checkExistSid($s_id) 
    {        
        if ($this->Vocabulary_model->checkSid($s_id) == TRUE) {
            $this->form_validation->set_message("checkExistSid","S_id not exist!");
            return FALSE;
        } else {
            return TRUE;
       }
    }
    function editRefer() 
    {
        $m_id = $this->uri->segment(4);
        $s_id = $this->uri->segment(5);
        $data['info'] = $this->Vocabulary_model->getInfoRefer($m_id,$s_id);
        $data['error'] = "";
        if (is_numeric($m_id) && is_numeric($s_id) && $data['info'] != NULL) {            
            if (isset($_POST['ok'])) {                            
                $this->form_validation->set_rules("m_id","M_id","required|callback_checkExistMid");                
                $this->form_validation->set_rules("s_id","S_id","required|callback_checkExistSid");                         
                if ($this->form_validation->run() == FALSE) {   
                    $this->load->view("admin/vocabulary/editRefer_view",$data);                
                } else {
                    $refer = array("m_id"  => $this->input->post("m_id"),
                                   "s_id"  => $this->input->post("s_id"),
                                  );                                                          
                    if ($m_id == $this->input->post("m_id") && $s_id == $this->input->post("s_id")) {
                        redirect(base_url()."index.php/admin/vocabulary/referenceSentence");                 
                    } else {
                        if ($this->Vocabulary_model->checkMid_Sid($this->input->post("m_id"),$this->input->post("s_id")) == TRUE) {
                            $this->load->view("admin/vocabulary/editRefer_view",array("error"=>"(M_id,S_id) existed!","m_id" => $m_id,"s_id"=>$s_id));
                        } else {
                            try{
                                $this->Vocabulary_model->updateRefer($refer,$m_id,$s_id);
                                redirect(base_url()."index.php/admin/vocabulary/referenceSentence"); 
                            }catch (Exception $e){
                                show_404();
                                log_message('error', $e->getMessage());
                            }  
                        }            
                    }                      
                }
            } else {
                $this->load->view("admin/vocabulary/editRefer_view",$data);   
            }            
        } else {            
            return false;
        }
    }
    function deleteRefer() 
    {
        $m_id = $this->uri->segment(4);             
        $s_id = $this->uri->segment(5);
        if (is_numeric($m_id) && is_numeric($s_id)) {            
            $this->Vocabulary_model->deleteRefer($m_id,$s_id);
            redirect(base_url()."index.php/admin/vocabulary/referenceSentence");        
        } else {
            return false;     
        }
    }
}
?>
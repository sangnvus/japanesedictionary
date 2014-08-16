<?php 
/**
* 
*/
class Grammar extends CI_Controller
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
        $this->load->model("Grammar_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function index() {
		// count record
        $max = $this->Grammar_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/grammar/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getAllGrammar($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/grammar/listGrammar_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("admin/grammar/listGrammar_view",$data);
        }
	}
    function listContributedGrammar() {
        // count record
        $max = $this->Grammar_model->num_rows_contributed();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_contributed'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/grammar/listContributedGrammar";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getContributedGrammar($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/grammar/listContributedGrammar_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("admin/grammar/listContributedGrammar_view",$data);
        }
    }
    function approvedGrammar() {
        $g_id = $this->uri->segment(4);
        $data['info'] = $this->Grammar_model->getInfoGrammar($g_id);
        $data['error'] = "";
        if(is_numeric($g_id) && $data['info']!=NULL){            
            if(isset($_POST['ok'])){                                               
                $this->form_validation->set_rules("g_hiragana","Hiragana","required|max_length[200]|is_unique[grammar.g_hiragana]");
                $this->form_validation->set_rules("g_romaji","Romaji","required|max_length[200]");
                $this->form_validation->set_rules("g_level","Level","required|max_length[10]");
                $this->form_validation->set_rules("g_meaning","Meaning","required|max_length[200]");
                $this->form_validation->set_rules("g_use","Use","required|max_length[1000]");
                $this->form_validation->set_rules("g_lesson", "Lesson", 'trim|max_length[20]');              
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/grammar/approvedGrammar_view",$data);                
                }else{
                    $grammar = array("g_hiragana" => $this->input->post("g_hiragana"),
                                     "g_romaji"   => $this->input->post("g_romaji"),
                                     "g_level"    => $this->input->post("g_level"),
                                     "g_meaning"  => $this->input->post("g_meaning"),
                                     "g_use"      => $this->input->post("g_use"),
                                     "g_status"   => 1,
                                     "g_lesson"   => $this->input->post("g_lesson")
                                    );                                                     
                    $this->Grammar_model->updateGrammar($grammar,$g_id);
                    redirect(base_url()."index.php/admin/grammar/listContributedGrammar"); 
                }
            }else{
                $this->load->view("admin/grammar/approvedGrammar_view",$data);   
            }    
        }else{            
            return false;
        }
    }
	function getByRomaji() {
		$data = "";
        $txtRomaji = "";        
        if(isset($_GET['txtRomaji'])){
            $txtRomaji = stripslashes(trim($_GET['txtRomaji']));            
        }
        $txtRomaji = ($txtRomaji===null) ? "" : $txtRomaji;   
        if(strpos($txtRomaji,'%')!==false){                        
            $data['grammar'] = null;
            $data['txtRomaji'] = $txtRomaji;
            $this->load->view("admin/grammar/listGrammar_view",$data);
        }
        if($txtRomaji != ""){
        $max = $this->Grammar_model->num_rowsBySearch($txtRomaji);
        $min = 5;
        $data['txtRomaji'] = $txtRomaji;
        $data['num_rows'] = $max;
        //--- Paging
            if($max!=0){    
                $this->load->library('pagination');                    
                $config['base_url'] = base_url()."index.php/admin/grammar/getByRomaji?txtRomaji=".$txtRomaji."&search=Search";
                $config['total_rows'] = $max;
                $config['per_page'] = $min;
                $config['num_link'] = 3; 
                // $config['uri_segment'] = 4;
                $config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);                             
                $data['links'] = $this->pagination->create_links();
                $data['grammar'] = $this->Grammar_model->getByRomaji($txtRomaji,$min,$this->input->get('per_page'));
                $this->load->view("admin/grammar/listGrammar_view",$data);
            }else{
                $data['grammar'] = null;
                $this->load->view("admin/grammar/listGrammar_view",$data);
            }
        }else{
        	$data['grammar'] = null;
            $this->load->view("admin/grammar/listGrammar_view",$data);
        }
	}
	function addGrammar() {
		$data['error'] = "";
        if(isset($_POST['addnew'])){
            $this->load->view("admin/grammar/addGrammar_view",$data);
        }else{
            $this->form_validation->set_rules("g_hiragana","Grammar","required|is_unique[grammar.g_hiragana]|max_length[200]");
            $this->form_validation->set_rules("g_romaji","Romaji","required|max_length[200]");
            $this->form_validation->set_rules("g_level","Level","required|max_length[10]");
            $this->form_validation->set_rules("g_meaning","Meaning","required|max_length[200]");
            $this->form_validation->set_rules("g_use","Use","required|max_length[1000]");
            $this->form_validation->set_rules("g_lesson", "Lesson", 'trim|max_length[20]|alpha_numeric');                          
            if($this->form_validation->run()==FALSE){            
                $this->load->view("admin/grammar/addGrammar_view",array("error" => ""));
            }
            else
            {                
                $grammar = array("g_hiragana"  => $this->input->post("g_hiragana"),                        
                                 "g_romaji"    => $this->input->post("g_romaji"),
                                 "g_level"     => $_POST['g_level'],
                                 "g_meaning"   => $this->input->post("g_meaning"),
                                 "g_use"       => $this->input->post("g_use"),
                                 "g_status"    => 1,
                                 "g_lesson"    => $this->input->post("g_lesson")
                                );                                   
                try{
                    $this->Grammar_model->addGrammar($grammar);
                    redirect(base_url()."index.php/admin/grammar/index");                                                   
                }catch(Exception $e){
                    show_404();
                    log_message('error', $e->getMessage());
                }                
            }        
        }
	}
	function editGrammar() {
		$g_id = $this->uri->segment(4);
        $data['info'] = $this->Grammar_model->getInfoGrammar($g_id);
        $data['error'] = "";
        if(is_numeric($g_id) && $data['info']!=NULL){            
            if(isset($_POST['ok'])){           
                $this->form_validation->set_rules("g_hiragana","Grammar","required|max_length[200]|callback_checkGrammar");
                $this->form_validation->set_rules("g_romaji","Romaji","required|max_length[200]");
                $this->form_validation->set_rules("g_level","Level","required|max_length[10]");
                $this->form_validation->set_rules("g_meaning","Meaning","required|max_length[200]");
                $this->form_validation->set_rules("g_use","Use","required|max_length[1000]");
                $this->form_validation->set_rules("g_lesson", "Lesson", 'trim|max_length[20]|alpha_numeric');                     
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/grammar/editGrammar_view",$data);                
                }else{
                    $grammar = array("g_hiragana" => $this->input->post("g_hiragana"),
                                     "g_romaji"   => $this->input->post("g_romaji"),
                                     "g_level"    => $_POST['g_level'],
                                     "g_meaning"  => $this->input->post("g_meaning"),
                                     "g_use"      => $this->input->post("g_use"),
                                     "g_status"   => 1,
                                     "g_lesson"   => $this->input->post("g_lesson")
                                     );                                                       
                    $this->Grammar_model->updateGrammar($grammar,$g_id);
                    redirect(base_url()."index.php/admin/grammar"); 
                }
            }else{
                $this->load->view("admin/grammar/editGrammar_view",$data);   
            }    
        }else{            
            return false;
        }
	}
    function checkGrammar($g_hiragana) {
        $g_id = $this->uri->segment(4);
        if($this->Grammar_model->getGrammar($g_hiragana,$g_id)==TRUE){
            return TRUE;
        }else{
            $this->form_validation->set_message("checkGrammar","Grammar has been existed, please try again!");
            return FALSE;
       }
    }
	function deleteGrammar() {
		$g_id = $this->uri->segment(4);             
        if(is_numeric($g_id)){            
            $this->Grammar_model->deleteGrammar($g_id);
            redirect(base_url()."index.php/admin/grammar/index");        
        }else{
            return false;     
        }
	}
    function deleteContributedGrammar() {
        $g_id = $this->uri->segment(4);             
        if(is_numeric($g_id)){            
            $this->Grammar_model->deleteGrammar($g_id);
            redirect(base_url()."index.php/admin/grammar/listContributedGrammar");        
        }else{
            return false;     
        }
    }    
    function addRefer() {
        $g_id = $this->uri->segment(4);
        $grammar = $this->Grammar_model->getInfoGrammar($g_id);
        $sentence = $this->Grammar_model->getSentenceByMeaning(explode(",",$grammar['g_romaji']));
        $data['error'] = "";
        if(is_numeric($g_id) && $grammar!=NULL){            
            if(isset($_POST['ok'])){                        
                $this->form_validation->set_rules("g_hiragana","Grammar","required");                        
                $this->form_validation->set_rules("s_id","Sentence","required"); 
                $this->form_validation->set_message("required","Sentence not exits with grammar");
                if($this->form_validation->run()==FALSE){                
                    $data = array('grammar'  => $grammar,
                                  'sentence' => $sentence
                                 );                    
                    $this->load->view("admin/grammar/addReferSentence_view",$data);                
                }else{
                    $refer = array('g_id' => $this->input->post("g_id"),
                                   's_id' => $this->input->post("s_id")
                                  );  
                    if($this->Grammar_model->checkGid_Sid($this->input->post("g_id"),$this->input->post("s_id")) == TRUE){
                        $data = array('grammar'  => $grammar,
                                      'sentence' => $sentence,
                                      'error'    =>"(Gid,Sid) existed!"
                                     );
                        $this->load->view("admin/grammar/addReferSentence_view",$data);
                    }else{
                        try{
                            $this->Grammar_model->addRefer($refer);
                            redirect(base_url()."index.php/admin/grammar");                                                   
                        }catch (Exception $e){
                            show_404();
                            log_message('error', $e->getMessage());
                        }
                    }                                        
                }
            }else{
                $data = array('grammar'  => $grammar,
                              'sentence' => $sentence
                             );
                $this->load->view("admin/grammar/addReferSentence_view",$data);   
            }   
        }
    }   
}
?>
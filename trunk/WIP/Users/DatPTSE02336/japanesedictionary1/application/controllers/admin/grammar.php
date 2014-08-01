<?php 
/**
* 
*/
class Grammar extends CI_Controller
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
        $this->load->model("Grammar_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function index(){
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
    function listContributedGrammar(){
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
    function approvedGrammar(){
        $g_id = $this->uri->segment(4);
        $data['info'] = $this->Grammar_model->getInfoGrammar($g_id);
        $data['error'] = "";
        if(is_numeric($g_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                                               
                    $this->form_validation->set_rules("g_hiragana","g_hiragana","required");
                    $this->form_validation->set_rules("g_romaji","g_romaji","required");
                    $this->form_validation->set_rules("g_level","g_level","required");
                    $this->form_validation->set_rules("g_meaning","g_meaning","required");
                    $this->form_validation->set_rules("g_use","g_use","required");                                                                              
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/grammar/approvedGrammar_view",$data);                
                }else{
                      $grammar = array(
                                    "g_hiragana" => $this->input->post("g_hiragana"),
                                    "g_romaji" => $this->input->post("g_romaji"),
                                    "g_level" => $this->input->post("g_level"),
                                    "g_meaning" => $this->input->post("g_meaning"),
                                    "g_use" => $this->input->post("g_use"),
                                    "g_status" => 1,
                                    "reading_id" => $this->input->post("reading_id")
                                    );                                        
                      $this->Grammar_model->updateGrammar($grammar,$g_id);
                      redirect(base_url()."index.php/admin/grammar/listContributedGrammar"); 
                }
            }
            else
            {
                $this->load->view("admin/grammar/approvedGrammar_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
	function getByRomaji(){
		$data = "";
        $txtRomaji = "";        
        if (isset($_GET['txtRomaji'])) {
            $txtRomaji = $_GET['txtRomaji'];            
        }

        $txtRomaji = ($txtRomaji===null) ? "" : $txtRomaji;   

        $max = $this->Grammar_model->num_rowsBySearch($txtRomaji);
        $min = 5;
        $data['txtRomaji'] = $txtRomaji;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/grammar/getByRomaji";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['grammar'] = $this->Grammar_model->getByRomaji($txtRomaji,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/grammar/listGrammar_view",$data);
        }else{
        	$data['grammar'] = null;
            $this->load->view("admin/grammar/listGrammar_view",$data);
        }
	}
	function addGrammar(){
		$data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/grammar/addGrammar_view",$data);
        } else {
            $this->form_validation->set_rules("g_hiragana","Ngữ pháp","required|is_unique[grammar.g_hiragana]");
            $this->form_validation->set_rules("g_romaji","Romaji","required");
            $this->form_validation->set_rules("g_level","Level","required");
            $this->form_validation->set_rules("g_meaning","Ý nghĩa","required");
            $this->form_validation->set_rules("g_use","Cách dùng","required");                           
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/grammar/addGrammar_view",array("error"=>""));
        }
        else
        {                
                $grammar = array(                        
                        "g_hiragana"  => $this->input->post("g_hiragana"),                        
                        "g_romaji"  => $this->input->post("g_romaji"),
                        "g_level"  => $_POST['g_level'],
                        "g_meaning"  => $this->input->post("g_meaning"),
                        "g_use"  => $this->input->post("g_use"),
                        "g_status"  => 1,
                        "reading_id"  => $this->input->post("reading_id")
                );
                try {
                    $this->Grammar_model->addGrammar($grammar);
                    redirect(base_url()."index.php/admin/grammar/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }                
               // $this->load->view("admin/grammar/addGrammar_view",$data);
        }
	}
	function editGrammar(){
		$g_id = $this->uri->segment(4);
        $data['info'] = $this->Grammar_model->getInfoGrammar($g_id);
        $data['error'] = "";
        if(is_numeric($g_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {           
                    $this->form_validation->set_rules("g_hiragana","Ngữ pháp","required");
                    $this->form_validation->set_rules("g_romaji","Romaji","required");
                    $this->form_validation->set_rules("g_level","Level","required");
                    $this->form_validation->set_rules("g_meaning","Ý nghĩa","required");
                    $this->form_validation->set_rules("g_use","Cách dùng","required");                    
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/grammar/editGrammar_view",$data);                
                }else{
                      $grammar = array(
                                    "g_hiragana" => $this->input->post("g_hiragana"),
                                    "g_romaji" => $this->input->post("g_romaji"),
                                    "g_level" => $_POST['g_level'],
                                    "g_meaning" => $this->input->post("g_meaning"),
                                    "g_use" => $this->input->post("g_use"),
                                    "g_status" => 1,
                                    "reading_id" => $this->input->post("reading_id")
                                    );                                        
                      $this->Grammar_model->updateGrammar($grammar,$g_id);
                      redirect(base_url()."index.php/admin/grammar"); 
                }
            }
            else
            {
                $this->load->view("admin/grammar/editGrammar_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
	}
	function deleteGrammar(){
		$g_id = $this->uri->segment(4);             
        if(is_numeric($g_id)){            
            $this->Grammar_model->deleteGrammar($g_id);
            redirect(base_url()."index.php/admin/grammar/index");        
        }else{
            return false;     
        }
	}
    function deleteContributedGrammar(){
        $g_id = $this->uri->segment(4);             
        if(is_numeric($g_id)){            
            $this->Grammar_model->deleteGrammar($g_id);
            redirect(base_url()."index.php/admin/grammar/listContributedGrammar");        
        }else{
            return false;     
        }
    }

	function referenceSentence(){
        // count record
        $max = $this->Grammar_model->num_rowsReferSentence();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/grammar/referenceSentence";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
            

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $referSentence = $this->Grammar_model->getReferSentence($min,$this->uri->segment($config['uri_segment']));
            if (!is_null($referSentence)) {
            	$data['referSentence'] = $referSentence;
            } else {
            	$referSentence = null;
            	$data['referSentence'] = $referSentence;
            }            
             
            // load view
            $this->load->view("admin/grammar/listReferSentence_view",$data);
        }else{
            return false;
        }
    }
    function getReferByGid(){
        $data = "";
        $txtGid = "";        
        if (isset($_GET['txtGid'])) {
            $txtGid = $_GET['txtGid'];            
        }
        $txtGid = ($txtGid===null) ? "" : $txtGid;   
        $max = $this->Grammar_model->num_rowsReferBySearch($txtGid);
        $min = 10;
        $data['txtGid'] = $txtGid;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/grammar/getReferByGid";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                                   
            $data['links'] = $this->pagination->create_links();
            $referSentence = $this->Grammar_model->getReferByGid($txtGid,$min,$this->uri->segment($config['uri_segment']));
            if (!is_null($referSentence) && $referSentence !== "") {
            	$data['referSentence'] = $referSentence;
            } else {
            	$referSentence = null;
            	$data['referSentence'] = $referSentence;
            }
            $this->load->view("admin/grammar/listSearchRefer_view",$data);
        }else{
            $this->load->view("admin/grammar/listSearchRefer_view",$data);
        }
    }
    function addRefer(){
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/grammar/addReferSentence_view",$data);
        } else {
            $this->form_validation->set_rules("g_id","g_id","required");
            $this->form_validation->set_rules("s_id","s_id","required");                   
        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/grammar/addReferSentence_view",array("error"=>""));
        }
        else
        {                
                $refer = array(                        
                        "g_id"  => $this->input->post("g_id"),                        
                        "s_id"  => $this->input->post("s_id"),
                );
                try {
                    $this->Grammar_model->addRefer($refer);
                    redirect(base_url()."index.php/admin/grammar/referenceSentence");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }
                
               // $this->load->view("admin/vocabulary/addReferSentence_view",$data);
        }
    }
    function editRefer(){
        $g_id = $this->uri->segment(4);
        $s_id = $this->uri->segment(5);
        $data['info'] = $this->Grammar_model->getInfoRefer($g_id,$s_id);
        $data['error'] = "";
        if(is_numeric($g_id) && is_numeric($s_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                            
                    $this->form_validation->set_rules("g_id","g_id","required");                
                    $this->form_validation->set_rules("s_id","s_id","required");                                                                                      
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/grammar/editRefer_view",$data);                
                }else{
                       $refer = array(                                    
                                    "g_id"  => $this->input->post("g_id"),
                                    "s_id" => $this->input->post("s_id"),
                                 );                      
                      $this->Grammar_model->updateRefer($refer,$g_id,$s_id);
                      redirect(base_url()."index.php/admin/grammar/referenceSentence"); 
                }
            }
            else
            {
                $this->load->view("admin/grammar/editRefer_view",$data);   
            }            
        }
        else
        {            
            return false;
        }
    }
    function deleteRefer(){
        $g_id = $this->uri->segment(4);             
        $s_id = $this->uri->segment(5);
        if(is_numeric($g_id) && is_numeric($s_id)){            
            $this->Grammar_model->deleteRefer($g_id,$s_id);
            redirect(base_url()."index.php/admin/grammar/referenceSentence");        
        }else{
            return false;     
        }
    }
  
    
}
 ?>
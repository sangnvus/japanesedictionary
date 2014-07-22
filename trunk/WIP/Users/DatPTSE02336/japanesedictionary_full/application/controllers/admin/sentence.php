<?php 
/**
* 
*/
class Sentence extends CI_Controller
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
        $this->load->model("Sentence_model");
	}
	//list sentence
	function index(){
		// count record
        $max = $this->Sentence_model->num_rows();
        // so record tren 1 page
        $min = 5;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/sentence/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['sentence'] = $this->Sentence_model->getAllSentence($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/sentence/listSentence_view",$data);
        }else{
            $data['sentence'] = null;            
            $this->load->view("admin/sentence/listSearchSentence_view",$data);
        }
	}
    function getByRomaji(){
        $data = "";
        $txtRomaji = "";        
        if (isset($_GET['txtRomaji'])) {
            $txtRomaji = $_GET['txtRomaji'];            
        }

        $txtRomaji = ($txtRomaji===null) ? "" : $txtRomaji;   

        $max = $this->Sentence_model->num_rowsBySearch($txtRomaji);
        $min = 1;
        $data['txtRomaji'] = $txtRomaji;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/sentence/getByRomaji";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['sentence'] = $this->Sentence_model->getByRomaji($txtRomaji,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/sentence/listSearchSentence_view",$data);
        }else{
            $data['sentence'] = null;            
            $this->load->view("admin/sentence/listSearchSentence_view",$data);
        }
    }
    function addSentence(){
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/sentence/addSentence_view",$data);
        } else {
            $this->form_validation->set_rules("s_hiragana","s_hiragana","required");
            $this->form_validation->set_rules("s_romaji","s_romaji","required");
            $this->form_validation->set_rules("s_meaning","s_meaning","required");
            $this->form_validation->set_rules("s_kanji","s_kanji","required");                            
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/sentence/addSentence_view",array("error"=>""));
        }
        else
        {                
                $sentence = array(                        
                        "s_hiragana"  => $this->input->post("s_hiragana"),                        
                        "s_romaji"  => $this->input->post("s_romaji"),
                        "s_meaning"  => $this->input->post("s_meaning"),
                        "s_kanji"  => $this->input->post("s_kanji")
                );
                try {
                    $this->Sentence_model->addSentence($sentence);
                    redirect(base_url()."index.php/admin/sentence/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }
                
              //  $this->load->view("admin/sentence/addSentence_view",$data);
        }
    }
    function editSentence(){
        $s_id = $this->uri->segment(4);
        $data['info'] = $this->Sentence_model->getInfoSentence($s_id);
        $data['error'] = "";
        if(is_numeric($s_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("s_hiragana","s_hiragana","required");
                    $this->form_validation->set_rules("s_romaji","s_romaji","required");
                    $this->form_validation->set_rules("s_meaning","s_meaning","required");
                    $this->form_validation->set_rules("s_kanji","s_kanji","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/sentence/editSentence_view",$data);                
                }else{
                      $sentence = array(                        
                        "s_hiragana"  => $this->input->post("s_hiragana"),                        
                        "s_romaji"  => $this->input->post("s_romaji"),
                        "s_meaning"  => $this->input->post("s_meaning"),
                        "s_kanji"  => $this->input->post("s_kanji")
                        );                                       
                      $this->Sentence_model->updateSentence($sentence,$s_id);
                      redirect(base_url()."index.php/admin/sentence"); 
                }
            }
            else
            {
                $this->load->view("admin/sentence/editSentence_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
    function deleteSentence(){
        $s_id = $this->uri->segment(4);             
        if(is_numeric($s_id)){            
            $this->Sentence_model->deleteSentence($s_id);
            redirect(base_url()."index.php/admin/sentence/index");        
        }else{
            return false;     
        }
    }
}
 ?>
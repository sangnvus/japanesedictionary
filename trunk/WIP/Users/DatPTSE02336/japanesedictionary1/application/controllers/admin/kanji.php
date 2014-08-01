<?php 
/**
* 
*/
class Kanji extends CI_Controller
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
        $this->load->model("Kanji_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function index(){
		// count record
        $max = $this->Kanji_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/kanji/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getAllKanji($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/kanji/listKanji_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("admin/kanji/listKanji_view",$data);
        }
	}
    function listContributedKanji(){
        $max = $this->Kanji_model->num_rows_contributed();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_contributed'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/kanji/listContributedKanji";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getContributedKanji($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/kanji/listContributedKanji_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("admin/kanji/listContributedKanji_view",$data);
        }
    }
	function getByHanViet(){
		$data = "";
        $txtHanViet = "";     
        if (isset($_GET['txtHanViet'])) {
            $txtHanViet = $_GET['txtHanViet'];           
        }

        $txtHanViet = ($txtHanViet===null) ? "" : $txtHanViet; 
        $max = $this->Kanji_model->num_rowsBySearch($txtHanViet);
        $min = 10;
        $data['txtHanViet'] = $txtHanViet;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/kanji/getByHanViet";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['kanji'] = $this->Kanji_model->getByHanViet($txtHanViet,$min,$this->uri->segment($config['uri_segment']));
            $this->load->view("admin/kanji/listKanji_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("admin/kanji/listKanji_view",$data);
        }
	}
	function addKanji(){
		$data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/kanji/addKanji_view",$data);
        } else {
            $this->form_validation->set_rules("k_kanji","k_kanji","required|is_unique[kanji.k_kanji]");
            $this->form_validation->set_rules("k_hanviet","k_hanviet","required");
            $this->form_validation->set_rules("k_meaning","k_meaning","required");
            $this->form_validation->set_rules("k_level","k_level","required");                            
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/kanji/addKanji_view",array("error"=>""));
        }
        else
        {                
                $kanji = array(                        
                        "k_kanji"  => $this->input->post("k_kanji"),                        
                        "k_hanviet"  => $this->input->post("k_hanviet"),
                        "k_onyomi"  => $this->input->post("k_onyomi"),
                        "k_kunyomi"  => $this->input->post("k_kunyomi"),
                        "k_meaning"  => $this->input->post("k_meaning"),
                        "k_level"  => $_POST['k_level'],
                        "k_status" => 1,
                        "reading_id" => $this->input->post("reading_id")
                );
                try {
                    $this->Kanji_model->addKanji($kanji);
                    redirect(base_url()."index.php/admin/kanji/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }
                
              //  $this->load->view("admin/video/addVideo_view",$data);
        }
	}
	function editKanji(){
		$k_id = $this->uri->segment(4);
        $data['info'] = $this->Kanji_model->getInfoKanji($k_id);
        $data['error'] = "";
        if(is_numeric($k_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    //$this->form_validation->set_rules("vi_id","Vi_id","required");   
            $this->form_validation->set_rules("k_kanji","k_kanji","required");
            $this->form_validation->set_rules("k_hanviet","k_hanviet","required");
            $this->form_validation->set_rules("k_meaning","k_meaning","required");
            $this->form_validation->set_rules("k_level","k_level","required");                                                                 
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/kanji/editKanji_view",$data);                
                }else{
                      $kanji = array(
                        "k_id" => $this->input->post("k_id"),
                        "k_kanji"  => $this->input->post("k_kanji"),                        
                        "k_hanviet"  => $this->input->post("k_hanviet"),
                        "k_onyomi"  => $this->input->post("k_onyomi"),
                        "k_kunyomi"  => $this->input->post("k_kunyomi"),
                        "k_meaning"  => $this->input->post("k_meaning"),
                        "k_level"  => $this->input->post("k_level"),
                        "k_status" => 1,
                        "reading_id" => $this->input->post("reading_id")
                                    );                                        
                      $this->Kanji_model->updateKanji($kanji,$k_id);
                      redirect(base_url()."index.php/admin/kanji"); 
                }
            }
            else
            {
                $this->load->view("admin/kanji/editKanji_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
	}
    function approvedKanji(){
        $k_id = $this->uri->segment(4);
        $data['info'] = $this->Kanji_model->getInfoKanji($k_id);
        $data['error'] = "";
        if(is_numeric($k_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    //$this->form_validation->set_rules("vi_id","Vi_id","required");   
            $this->form_validation->set_rules("k_kanji","k_kanji","required");
            $this->form_validation->set_rules("k_hanviet","k_hanviet","required");
            $this->form_validation->set_rules("k_meaning","k_meaning","required");
            $this->form_validation->set_rules("k_level","k_level","required");                                                                 
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/kanji/editKanji_view",$data);                
                }else{
                      $kanji = array(
                        "k_id" => $this->input->post("k_id"),
                        "k_kanji"  => $this->input->post("k_kanji"),                        
                        "k_hanviet"  => $this->input->post("k_hanviet"),
                        "k_onyomi"  => $this->input->post("k_onyomi"),
                        "k_kunyomi"  => $this->input->post("k_kunyomi"),
                        "k_meaning"  => $this->input->post("k_meaning"),
                        "k_level"  => $this->input->post("k_level"),
                        "k_status" => 1,
                        "reading_id" => $this->input->post("reading_id")
                                    );                                        
                      $this->Kanji_model->updateKanji($kanji,$k_id);
                      redirect(base_url()."index.php/admin/kanji/listContributedKanji"); 
                }
            }
            else
            {
                $this->load->view("admin/kanji/approvedKanji_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
	function deleteKanji(){
		$k_id = $this->uri->segment(4);             
        if(is_numeric($k_id)){            
            $this->Kanji_model->deleteKanji($k_id);
            redirect(base_url()."index.php/admin/kanji/index");        
        }else{
            return false;     
        }
	}
    function deleteContributedKanji(){
        $k_id = $this->uri->segment(4);             
        if(is_numeric($k_id)){            
            $this->Kanji_model->deleteKanji($k_id);
            redirect(base_url()."index.php/admin/kanji/listContributedKanji");        
        }else{
            return false;     
        }
    }
}
 ?>
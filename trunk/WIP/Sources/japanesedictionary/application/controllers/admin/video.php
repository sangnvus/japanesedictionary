<?php 
/**
* 
*/
class Video extends CI_Controller
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
        $this->load->model("Video_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function index() {
		// count record
        $max = $this->Video_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/video/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['video'] = $this->Video_model->getAllVideo($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/video/listVideo_view",$data);
        }else{
            $data['video'] = null;            
            $this->load->view("admin/video/listSearchVideo_view",$data);
        }
	}
	function getByTitle() {
		$data = "";
        $txtTitle = "";        
        if(isset($_GET['txtTitle'])){
            $txtTitle = stripslashes(trim($_GET['txtTitle']));            
        }
        $txtTitle = ($txtTitle===null) ? "" : $txtTitle;   
        if(strpos($txtTitle,'%')!==false){                        
            $data['video'] = null;   
            $data['txtTitle'] = $txtTitle;         
            $this->load->view("admin/video/listSearchVideo_view",$data);
        }
        if($txtTitle!=""){
            $max = $this->Video_model->num_rowsBySearch($txtTitle);
            $min = 10;
            $data['txtTitle'] = $txtTitle;
            $data['num_rows'] = $max;
            //--- Paging
            if($max!=0){    
                $this->load->library('pagination');                    
                $config['base_url'] = base_url()."index.php/admin/video/getVideoByTitle?txtTitle=".$txtTitle."&search=Search";
                $config['total_rows'] = $max;
                $config['per_page'] = $min;
                $config['num_link'] = 3; 
                // $config['uri_segment'] = 4;
                $config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);                                
                $data['links'] = $this->pagination->create_links();
                $data['video'] = $this->Video_model->getByTitle($txtTitle,$min,$this->input->get('per_page'));
                $this->load->view("admin/video/listSearchVideo_view",$data);
            }else{
                $data['video'] = null;            
                $this->load->view("admin/video/listSearchVideo_view",$data);
            }
        }else{
            $data['video'] = null;            
            $this->load->view("admin/video/listSearchVideo_view",$data);
        }
	}
	function addVideo() {
		$data['error'] = "";
        if(isset($_POST['addnew'])){
            $this->load->view("admin/video/addVideo_view",$data);
        }else{
            $this->form_validation->set_rules("vi_title","Title","required|max_length[200]");
            $this->form_validation->set_rules("vi_link","Link","required|max_length[200]|is_unique[video.vi_link]");                            
            if($this->form_validation->run()==FALSE){            
                $this->load->view("admin/video/addVideo_view",array("error" => ""));
            }else{                
                $video = array("vi_title"  => $this->input->post("vi_title"),                        
                               "vi_link"   => $this->input->post("vi_link")
                              );                                  
                try{
                    $this->Video_model->addVideo($video);
                    redirect(base_url()."index.php/admin/video/index");                                                   
                }catch(Exception $e){
                    show_404();
                    log_message('error', $e->getMessage());
                }                
            }
        }
	}
	function editVideo() {
		$vi_id = $this->uri->segment(4);
        $data['info'] = $this->Video_model->getInfoVideo($vi_id);
        $data['error'] = "";
        if(is_numeric($vi_id) && $data['info']!=NULL){            
            if(isset($_POST['ok'])){                                               
                $this->form_validation->set_rules("vi_title","Title","required|max_length[200]");
                $this->form_validation->set_rules("vi_link","Link","required|max_length[200]|callback_checkURL");                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/video/editVideo_view",$data);                
                }else{
                    $video = array("vi_id"    => $this->input->post("vi_id"),
                                   "vi_title" => $this->input->post("vi_title"),
                                   "vi_link"  => $this->input->post("vi_link")
                                  );                                                       
                    $this->Video_model->updateVideo($video,$vi_id);
                    redirect(base_url()."index.php/admin/video"); 
                }
            }else{
                $this->load->view("admin/video/editVideo_view",$data);   
            }      
        }else{            
            return false;
        }
	}
    //---- Kiem tra Email
    function checkURL($vi_link) {
        $vi_id = $this->uri->segment(4);
        if($this->Video_model->checkURL($vi_link,$vi_id)==TRUE){
            return TRUE;
        }else{
            $this->form_validation->set_message("checkURL","Link has been exited, please try again");
            return FALSE;
        }
    }
	function deleteVideo() {
		$vi_id = $this->uri->segment(4);             
        if(is_numeric($vi_id)){            
            $this->Video_model->deleteVideo($vi_id);
            redirect(base_url()."index.php/admin/video/index");        
        }else{
            return false;     
        }
	}
}
?>
<?php 
/**
* 
*/
class Traininglistening extends CI_Controller
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
        $this->load->model("Listening_model");
        if(!$this->my_auth->is_Admin()){            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	function index() {
		// count record
        $max = $this->Listening_model->num_rows();
        // so record tren 1 page
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/traininglistening/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['traininglistening'] = $this->Listening_model->getAllListening($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("admin/traininglistening/listTraininglistening_view",$data);
        }else{
            $data['traininglistening'] = null;
            $this->load->view("admin/traininglistening/listTraininglistening_view",$data);
        }
	}
	function getListeningByLevel() {
		$data = "";
        $txtLevel = "";        
        if(isset($_GET['txtLevel'])){
            $txtLevel = $_GET['txtLevel'];            
        }
        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;   
        $max = $this->Listening_model->num_rowsBySearch($txtLevel);
        $min = 10;
        $data['txtLevel'] = $txtLevel;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/traininglistening/getListeningByLevel?txtLevel=".$txtLevel."&search=Search";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            // $config['uri_segment'] = 4;
            $config['page_query_string'] = TRUE;
            $this->pagination->initialize($config);                                 
            $data['links'] = $this->pagination->create_links();
            $data['traininglistening'] = $this->Listening_model->getListeningByLevel($txtLevel,$min,$this->input->get('per_page'));
            $this->load->view("admin/traininglistening/listSearchListening_view",$data);
        }else{
            $data['traininglistening'] = null;            
            $this->load->view("admin/traininglistening/listSearchListening_view",$data);            
        }
	}
	function addTraininglistening() {
        $data['error'] = "";
        if(isset($_POST['addnew'])){
            $this->load->view("admin/traininglistening/addTraininglistening_view",$data);
        }else{
            $this->form_validation->set_rules("lis_title","Title","required|max_length[500]|is_unique[traininglistening.lis_title]"); 
            $this->form_validation->set_rules("lis_level","Level","required|max_length[10]");              
            if($this->form_validation->run()==FALSE){            
                $this->load->view("admin/traininglistening/addTraininglistening_view",array("error" => ""));
            }else{                
                $traininglistening = array("lis_id"     => $this->input->post("lis_id"),  
                                           "lis_title"  => $this->input->post("lis_title"),                       
                                           "lis_level"  => $this->input->post("lis_level"),                                                                                                                             
                                          );                        
                            
                try{
                    $this->Listening_model->addTraininglistening($traininglistening);
                    redirect(base_url()."index.php/admin/traininglistening/index");                                                   
                }catch(Exception $e){
                    show_404();
                    log_message('error', $e->getMessage());
                }                
            }                
        }                
    }
     function addSourcefile() {
        $lis_id = $this->uri->segment(4);
        $data['info'] = $this->Listening_model->getInfoTraininglistening($lis_id);
        $data['error'] = "";
        if(isset($_POST['ok'])){         
            $config['upload_path'] = './public/audio';
            $config['allowed_types'] = 'avi|flv|wmv|mp3';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);                    
            // if (empty($_FILES['userfile']['name'])){
            //     $this->form_validation->set_rules('userfile', 'File', 'required');
            // }
            $this->form_validation->set_rules("sourcefile_question","Question","required|max_length[5000]");                
            $this->form_validation->set_rules("sourcefile_script","Script","required|max_length[5000]");                                          
            $this->form_validation->set_rules("sourcefile_meaning","Meaning","required|max_length[5000]");
            $this->form_validation->set_rules("sourcefile_answer","Answer","required|max_length[100]");             
            if($this->form_validation->run()==FALSE){  
                $f_type = $_FILES['userfile']['type']; 
                if (empty($_FILES['userfile']['name']) OR $f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                }
                $data['info'] = $this->Listening_model->getInfoTraininglistening($this->input->post("lis_id"));
                $this->load->view("admin/traininglistening/addSourcefile_view",$data);                
            }else{
                $f_type = $_FILES['userfile']['type'];

                if (empty($_FILES['userfile']['name']) OR $f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                    $data['info'] = $this->Listening_model->getInfoTraininglistening($this->input->post("lis_id"));
                    $this->load->view("admin/traininglistening/addSourcefile_view",$data);                                    
                } else {
                    if(!$this->upload->do_upload()){                        
                    $sourcefile = array("lis_id"               => $this->input->post("lis_id"),
                                        "sourcefile_question"  => $this->input->post("sourcefile_question"),
                                        "sourcefile_script"    => $this->input->post("sourcefile_script"),
                                        "sourcefile_meaning"   => $this->input->post("sourcefile_meaning"),
                                        "sourcefile_answer"    => $this->input->post("sourcefile_answer")
                                       );                                                                                        
                    $this->Listening_model->addSourcefile($sourcefile);
                    redirect(base_url()."index.php/admin/traininglistening/viewDetailListening/".$this->input->post("lis_id")); 
                    }else{
                        $sourcefile = array("lis_id"               => $this->input->post("lis_id"),
                                            "sourcefile_file"      => $this->upload->data()['file_name'],
                                            "sourcefile_question"  => $this->input->post("sourcefile_question"),
                                            "sourcefile_script"    => $this->input->post("sourcefile_script"),
                                            "sourcefile_meaning"   => $this->input->post("sourcefile_meaning"),
                                            "sourcefile_answer"    => $this->input->post("sourcefile_answer")
                                           );                                                                                                           
                        $this->Listening_model->addSourcefile($sourcefile);
                        redirect(base_url()."index.php/admin/traininglistening/viewDetailListening/".$this->input->post("lis_id")); 
                    }
                }                
            }
        }else{
            $this->load->view("admin/traininglistening/addSourcefile_view",$data);   
        }    
    }
    function editTraininglistening() {
    	$lis_id = $this->uri->segment(4); 	
        $data['info'] = $this->Listening_model->getInfoTraininglistening($lis_id);   
        $data['error'] = "";           
        if(isset($_POST['ok'])){                       
            $this->form_validation->set_rules("lis_level","Level","required|max_length[10]");
            $this->form_validation->set_rules("lis_title","Title","required|max_length[500]");                                                          
            if($this->form_validation->run()==FALSE){   
                $this->load->view("admin/traininglistening/editTraininglistening_view",$data);                
            }else{
                $traininglistening = array("lis_id"     => $this->input->post("lis_id"),
                                           "lis_title"  => $this->input->post("lis_title"),                         
                                           "lis_level"  => $this->input->post("lis_level"),                    
                                          );                               
                $this->Listening_model->updateTraininglistening($traininglistening,$lis_id);             
                redirect(base_url()."index.php/admin/traininglistening"); 
            }
        }else{
            $this->load->view("admin/traininglistening/editTraininglistening_view",$data);   
        }
    } 
    function editSourcefile() {
        $lis_id = $this->uri->segment(5); 
        $sourcefile_id = $this->uri->segment(4);   
        $data['info'] = $this->Listening_model->getDetailSourcefileBySourcefileID($sourcefile_id);   
        $data['error'] = "";       
        if(isset($_POST['ok'])){                                 
            $config['upload_path'] = './public/audio';
            $config['allowed_types'] = 'avi|flv|wmv|mp3';
            $config['max_size'] = '100000';
            $this->load->library('upload', $config);
            $this->form_validation->set_rules("sourcefile_id","ID","required|max_length[100]");                    
            $this->form_validation->set_rules("sourcefile_question","Question","required|max_length[5000]");                
            $this->form_validation->set_rules("sourcefile_script","Script","required|max_length[5000]");                                          
            $this->form_validation->set_rules("sourcefile_meaning","Meaning","required|max_length[5000]");
            $this->form_validation->set_rules("sourcefile_answer","Answer","required|max_length[100]");                                                            
            if($this->form_validation->run()==FALSE){
                $f_type = $_FILES['userfile']['type'];

                if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                }   
                $data['info'] = $this->Listening_model->getDetailSourcefileBySourcefileID($this->input->post("sourcefile_id"));   
                $this->load->view("admin/traininglistening/editSourcefile_view",$data);                
            }else{
                $f_type = $_FILES['userfile']['type'];

                if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                    $data['info'] = $this->Listening_model->getDetailSourcefileBySourcefileID($this->input->post("sourcefile_id"));   
                    $this->load->view("admin/traininglistening/editSourcefile_view",$data);                
                } else {
                    if(!$this->upload->do_upload()){                         
                    $sourcefile = array("sourcefile_id"        => $this->input->post("sourcefile_id"),
                                        "lis_id"               => $this->input->post("lis_id"),
                                        "sourcefile_question"  => $this->input->post("sourcefile_question"),
                                        "sourcefile_script"    => $this->input->post("sourcefile_script"),
                                        "sourcefile_meaning"   => $this->input->post("sourcefile_meaning"),
                                        "sourcefile_answer"    => $this->input->post("sourcefile_answer")
                                       );                     
                    $this->Listening_model->updateSourcefile($sourcefile,$this->input->post("sourcefile_id"));             
                    redirect(base_url()."index.php/admin/traininglistening/viewDetailListening/".$this->input->post("lis_id")); 
                    }else{                    
                        $sourcefile = array("sourcefile_id"        => $this->input->post("sourcefile_id"),
                                            "lis_id"               => $this->input->post("lis_id"),
                                            "sourcefile_file"      => $this->upload->data()['file_name'],
                                            "sourcefile_question"  => $this->input->post("sourcefile_question"),
                                            "sourcefile_script"    => $this->input->post("sourcefile_script"),
                                            "sourcefile_meaning"   => $this->input->post("sourcefile_meaning"),
                                            "sourcefile_answer"    => $this->input->post("sourcefile_answer")
                                           );                                    
                                        
                            
                        $this->Listening_model->updateSourcefile($sourcefile,$this->input->post("sourcefile_id"));             
                        redirect(base_url()."index.php/admin/traininglistening/viewDetailListening/".$this->input->post("lis_id")); 
                    }
                }
                
            }
        }else{                
            $this->load->view("admin/traininglistening/editSourcefile_view",$data);   
        }
    }       
    	//--- Xoa TrainingListening
    function deleteSourcefile() {
        $lis_id = $this->uri->segment(5);
        $sourcefile_id = $this->uri->segment(4);             
        if($lis_id!=""){            
            $this->Listening_model->deleteSourcefile($lis_id,$sourcefile_id);
            redirect(base_url()."index.php/admin/traininglistening/viewDetailListening/$lis_id");        
        }else{
            return false;     
        }
    }
    function deleteListening() {
        $lis_id = $this->uri->segment(4);          
        $this->Listening_model->deleteListening($lis_id);
        if($lis_id!=""){
        redirect(base_url()."index.php/admin/traininglistening/index");        
        }else{
            return false;     
        }
    }
    function viewDetailListening() {
        $lis_id = $this->uri->segment(4);
        $listen = $this->Listening_model->getInfo($lis_id);
        $detailSource = $this->Listening_model->getDetailSourcefileByLisid($lis_id);
        $data = "";
        if(!is_null($detailSource)){
            $data = array('detailSource' => $detailSource,                            
                          'listen'       =>$listen);
            $this->load->view("admin/traininglistening/viewDetailListening_view",$data);
        }else{            
            $detailSource = null;
            $data = array('detailSource' => $detailSource, 
                          'listen'       =>$listen                           
                         );
            $this->load->view("admin/traininglistening/viewDetailListening_view",$data);
        }  
    }   
}
?>
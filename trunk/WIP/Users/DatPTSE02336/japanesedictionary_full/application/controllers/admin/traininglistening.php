<?php 
/**
* 
*/
class Traininglistening extends CI_Controller
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
        $this->load->model("Listening_model");
	}
	function index(){
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
            $data['traininglistening'] =null;
            $this->load->view("admin/traininglistening/listTraininglistening_view",$data);
        }
	}
	function getListeningByLevel(){
		$data = "";
        $txtLevel = "";        
        if (isset($_GET['txtLevel'])) {
            $txtLevel = $_GET['txtLevel'];            
        }

        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;   

        $max = $this->Listening_model->num_rowsBySearch($txtLevel);
        $min = 5;
        $data['txtLevel'] = $txtLevel;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){    
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/traininglistening/getListeningByLevel";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        
                        
            $data['links'] = $this->pagination->create_links();
            $data['traininglistening'] = $this->Listening_model->getListeningByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));

            $this->load->view("admin/traininglistening/listSearchListening_view",$data);
        }else{
            $data['traininglistening'] = null;            
            $this->load->view("admin/traininglistening/listSearchListening_view",$data);            
        }
	}
	function addTraininglistening(){
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/traininglistening/addTraininglistening_view",$data);
        } else {
            $this->form_validation->set_rules("lis_id","Listening ID","required|max_length[32]|is_unique[traininglistening.lis_id]");
            $this->form_validation->set_rules("lis_level","Level","required");                    
        
        if($this->form_validation->run()==FALSE){            
            $this->load->view("admin/traininglistening/addTraininglistening_view",array("error"=>""));
        }
        else
        {                
                $traininglistening = array(                        
                        "lis_id"  => $this->input->post("lis_id"),                        
                        "lis_level"  => $this->input->post("lis_level"),
                        //"c_title"     => $this->input->post("c_title"),                                                                                                                                            
                );
                try {
                    $this->Listening_model->addTraininglistening($traininglistening);
                    redirect(base_url()."index.php/admin/traininglistening/index");                                                   
                } catch (Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
                }                
                //$this->load->view("admin/vocabulary/addVocabulary_view",$data);
        }                
    }
    function editTraininglistening(){
    	$lis_id = $this->uri->segment(4);
    	$sourcefile_id = $this->uri->segment(5); 
    	$sourcefile_id = ($sourcefile_id===null) ? "" : $sourcefile_id;   	
        $data['info'] = $this->Listening_model->getInfoTraininglistening($lis_id,$sourcefile_id);
        $data['error'] = "";
        if(is_numeric($sourcefile_id) && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("lis_id","lis_id","required|max_length[50]");
		            $this->form_validation->set_rules("lis_level","lis_level","required");

		            $this->form_validation->set_rules("sourcefile_id","sourcefile_id","required");                    
                    $this->form_validation->set_rules("sourcefile_question","sourcefile_question","required");                
                    $this->form_validation->set_rules("sourcefile_script","sourcefile_script","required");                                          
                    $this->form_validation->set_rules("sourcefile_meaning","sourcefile_meaning","required");
                    $this->form_validation->set_rules("sourcefile_answer","sourcefile_answer","required");
                                                                            
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/traininglistening/editTraininglistening_view",$data);                
                }else{
                      $traininglistening = array(                        
                        "lis_id"  => $this->input->post("lis_id"),                        
                        "lis_level"  => $this->input->post("lis_level"),                    
               			 );
                      $sourcefile = array(                                    
                                    "sourcefile_id"  => $this->input->post("sourcefile_id"),
                                    "sourcefile_question" => $this->input->post("sourcefile_question"),
                                    "sourcefile_script" => $this->input->post("sourcefile_script"),
                                    "sourcefile_meaning"     => $this->input->post("sourcefile_meaning"),
                                    "sourcefile_answer"     => $this->input->post("sourcefile_answer")
                                 );   
                      $this->Listening_model->updateTraininglistening($traininglistening,$lis_id);                 
                      $this->Listening_model->updateSourcefile($sourcefile,$sourcefile_id);

                      redirect(base_url()."index.php/admin/traininglistening"); 
                }
            }
            else
            {
                $this->load->view("admin/traininglistening/editTraininglistening_view",$data);   
            }
            
        }
        else
        {            
            if(isset($_POST['ok']))
            {                         
                    $this->form_validation->set_rules("lis_id","lis_id","required|max_length[50]");
                    $this->form_validation->set_rules("lis_level","lis_level","required");

                    //$this->form_validation->set_rules("sourcefile_id","sourcefile_id","required");                    
                    //$this->form_validation->set_rules("sourcefile_question","sourcefile_question","required");                
                    //$this->form_validation->set_rules("sourcefile_script","sourcefile_script","required");                                          
                    //$this->form_validation->set_rules("sourcefile_meaning","sourcefile_meaning","required");
                   // $this->form_validation->set_rules("sourcefile_answer","sourcefile_answer","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/traininglistening/editTraininglistening_view",$data);                
                }else{
                      $traininglistening = array(                        
                        "lis_id"  => $this->input->post("lis_id"),                        
                        "lis_level"  => $this->input->post("lis_level"),                    
                         );
                      $sourcefile = array(                                    
                                    "sourcefile_id"  => $this->input->post("sourcefile_id"),
                                    "sourcefile_question" => $this->input->post("sourcefile_question"),
                                    "sourcefile_script" => $this->input->post("sourcefile_script"),
                                    "sourcefile_meaning"     => $this->input->post("sourcefile_meaning"),
                                    "sourcefile_answer"     => $this->input->post("sourcefile_answer")
                                 );   
                      $this->Listening_model->updateTraininglistening($traininglistening,$lis_id);                 
                      //$this->Listening_model->updateSourcefile($sourcefile,$sourcefile_id);
                      redirect(base_url()."index.php/admin/traininglistening"); 
                }
            }
            else
            {
                $this->load->view("admin/traininglistening/editTraininglistening_view",$data);   
            }
        }
    }    
    	//--- Xoa TrainingListening
    function deleteSourcefile(){
        $lis_id = $this->uri->segment(4);
        $sourcefile_id = $this->uri->segment(5);
        $sourcefile_id = ($sourcefile_id === null) ? "" : $sourcefile_id;             
        if($lis_id != ""){            
            $this->Listening_model->deleteSourcefile($lis_id,$sourcefile_id);
            redirect(base_url()."index.php/admin/traininglistening/index");        
        }else{
            return false;     
        }
    }
    function addSourcefile(){
        $lis_id = $this->uri->segment(4);
        $sourcefile_id = $this->uri->segment(5);
        $sourcefile_id = ($sourcefile_id === null) ? "" : $sourcefile_id;
        $data['info'] = $this->Listening_model->getInfoTraininglistening($lis_id,$sourcefile_id);
        $data['error'] = "";
        if($lis_id != "" && $data['info']!=NULL)
        {            
            if(isset($_POST['ok']))
            {                       

                   $this->form_validation->set_rules("lis_id","lis_id","required|max_length[50]");
                    $this->form_validation->set_rules("lis_level","lis_level","required");

                    $this->form_validation->set_rules("sourcefile_id","sourcefile_id","required");                    
                    $this->form_validation->set_rules("sourcefile_question","sourcefile_question","required");                
                    $this->form_validation->set_rules("sourcefile_script","sourcefile_script","required");                                          
                    $this->form_validation->set_rules("sourcefile_meaning","sourcefile_meaning","required");
                    $this->form_validation->set_rules("sourcefile_answer","sourcefile_answer","required");                                                                
                                
                if($this->form_validation->run()==FALSE){   
                    $this->load->view("admin/traininglistening/addSourcefile_view",$data);                
                }else{
                       $traininglistening = array(                        
                        "lis_id"  => $this->input->post("lis_id"),                        
                        "lis_level"  => $this->input->post("lis_level"),                    
                         );
                      $sourcefile = array(                                    
                                    "sourcefile_id"  => $this->input->post("sourcefile_id"),
                                    "lis_id"  => $this->input->post("lis_id"),
                                    "sourcefile_question" => $this->input->post("sourcefile_question"),
                                    "sourcefile_script" => $this->input->post("sourcefile_script"),
                                    "sourcefile_meaning"     => $this->input->post("sourcefile_meaning"),
                                    "sourcefile_answer"     => $this->input->post("sourcefile_answer")
                                 );   
                      $this->Listening_model->addSourcefile($sourcefile);
                      redirect(base_url()."index.php/admin/traininglistening"); 
                }
            }
            else
            {
                $this->load->view("admin/traininglistening/addSourcefile_view",$data);   
            }
            
        }
        else
        {            
            return false;
        }
    }
}
 ?>
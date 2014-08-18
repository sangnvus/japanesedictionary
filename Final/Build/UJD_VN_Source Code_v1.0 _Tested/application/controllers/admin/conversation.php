<?php 
/**
* 
*/
class Conversation extends CI_Controller
{	
	function __construct() 
    {
		parent::__construct();
		// load helper
        //ロード　ヘルパー  
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));
        // load library
        //　ロード　ライブラリ
        $this->load->library(array("input","form_validation","session","my_auth","email"));
        //connect DB
        //　データベース　に　接続する
		$this->load->database();
        //load view
        //　ロード　モデル
        $this->load->model("Conversation_model");
        //check Authentication
        //　認証　を　チェックする
        if (!$this->my_auth->is_Admin()) {            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
    //list conversation
    //　リスト　会話
	function index() 
    {
		// count record
        // レコード　を　カウントする
        $max = $this->Conversation_model->num_rows();
        // number of records on one page
        // ページ　に　レコード　の　番号
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        //　ページング
        if ($max != 0) {    
        	//load library
            //　ロード　ライブラリ
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/admin/conversation/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            //データベース　から　データ　を　得る
            $data['conversation'] = $this->Conversation_model->getAllConversation($min,$this->uri->segment($config['uri_segment']));
            // load view
            // ロード　ビュー
            $this->load->view("admin/conversation/listConversation_view",$data);
        } else {
            $data['conversation'] = null;
            $this->load->view("admin/conversation/listConversation_view",$data);
        }
	}
    // get　Conversation　By　Level
    //　レベルで会話を得る
	function getConversationByLevel() 
    {
		$data = "";
        $txtLevel = "";        
        if (isset($_GET['txtLevel'])) {
            $txtLevel = stripslashes(trim($_GET['txtLevel']));            
        }
        $txtLevel = ($txtLevel===null) ? "" : $txtLevel;           
        if ($txtLevel != "") {
        $max = $this->Conversation_model->num_rowsBySearch($txtLevel);
        $min = 10;
        $data['txtLevel'] = $txtLevel;
        $data['num_rows'] = $max;
        //--- Paging
        //　ページング
            if ($max != 0) {    
                $this->load->library('pagination');                    
                $config['base_url'] = base_url()."index.php/admin/conversation/getConversationByLevel?txtLevel=".$txtLevel."&search=Search";
                $config['total_rows'] = $max;
                $config['per_page'] = $min;
                $config['num_link'] = 3; 
                
                $config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);                                     
                $data['links'] = $this->pagination->create_links();
                $data['conversation'] = $this->Conversation_model->getConversationByLevel($txtLevel,$min,$this->input->get('per_page'));
                $this->load->view("admin/conversation/listConversation_view",$data);
            } else {
                $data['conversation'] = null;            
                $this->load->view("admin/conversation/listConversation_view",$data);            
            }
        } else {
            $data['conversation'] = null;            
            $this->load->view("admin/conversation/listConversation_view",$data);            
        }
	}
    // add　Conversation
    //　会話　を　加える
	function addConversation() 
    {
        $data['error'] = "";
        if (isset($_POST['ok'])) {
            $config['upload_path'] = './public/image';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $this->load->library('upload', $config);
            $this->form_validation->set_rules("c_level","Level","required|max_length[20]");
            $this->form_validation->set_rules("c_title","Title","required|max_length[100]");                     

            $f_type = $_FILES['userfile']['type'];
            if ($f_type == "audio/mp3" OR $f_type == "audio/mp4"){
                $data['error_file'] = "The file is required and must be image file!";                
            }

            if ($this->form_validation->run() == FALSE) {    
                $f_type = $_FILES['userfile']['type'];
                if ($f_type == "audio/mp3" OR $f_type == "audio/mp4"){
                    $data['error_file'] = "The file is required and must be image file!";                    
                }              
                $this->load->view("admin/conversation/addConversation_view",$data);
            } else {     
                $f_type = $_FILES['userfile']['type'];
                if ($f_type == "audio/mp3" OR $f_type == "audio/mp4"){
                    $data['error_file'] = "The file is required and must be image file!";
                    $this->load->view("admin/conversation/addConversation_view",$data);
                } else {
                    if (!$this->upload->do_upload()) {                        
                        $conversation = array("c_level"  => $this->input->post("c_level"),
                                              "c_title"  => $this->input->post("c_title")                                                                                                                                                                 
                                             );                                                            
                        $this->Conversation_model->addConversation($conversation);
                        redirect(base_url()."index.php/admin/conversation/index");                                      
                    } else {                                    
                    $conversation = array(                                               
                            "c_level"  => $this->input->post("c_level"),
                            "c_title"     => $this->input->post("c_title"),
                            "c_image"     => $this->upload->data()['file_name'],                                                                                                                                             
                    );         
                        $this->Conversation_model->addConversation($conversation);
                        redirect(base_url()."index.php/admin/conversation/index");                                                               
                    }
                }                          
            }
        } else {
            $this->load->view("admin/conversation/addConversation_view");               
        }
    }
    // edit　Conversation
    //　会話　を　修正する
    function editConversation()
    {        
    	$c_id = $this->uri->segment(4);
        $data['info'] = $this->Conversation_model->getInfoConversation($c_id);
        $data['error'] = "";         
        if (isset($_POST['ok'])) {                    
            $config['upload_path'] = './public/image';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
                        
            $this->load->library('upload', $config);  
            $this->form_validation->set_rules("c_level","Level","required|max_length[20]");
            $this->form_validation->set_rules("c_title","Title","required|max_length[100]");        
            
            if ($this->form_validation->run() == FALSE) {   
                $f_type = $_FILES['userfile']['type'];

                if ($f_type == "audio/mp3" OR $f_type == "audio/mp4"){                
                    $data['error_file'] = "The file is required and must be image file!";                    
                }
                $data['info'] = $this->Conversation_model->getInfoConversation($this->input->post("c_id"));
                $this->load->view("admin/conversation/editConversation_view",$data);                
            } else {  
                $f_type = $_FILES['userfile']['type'];
                if ($f_type == "audio/mp3" OR $f_type == "audio/mp4"){                    
                    $data['error_file'] = "The file is required and must be image file!";
                    $data['info'] = $this->Conversation_model->getInfoConversation($this->input->post("c_id"));                    
                    $this->load->view("admin/conversation/editConversation_view",$data);                
                } else {
                    if (!$this->upload->do_upload()) {            
                    $conversation = array("c_level"  => $this->input->post("c_level"),
                                          "c_title"  => $this->input->post("c_title")                    
                                         );                                                                                                                                                  
                    $this->Conversation_model->updateConversation($conversation,$this->input->post("c_id"));                 
                    redirect(base_url()."index.php/admin/conversation"); 
                    } else {            
                        $conversation = array("c_level"  => $this->input->post("c_level"),
                                              "c_title"  => $this->input->post("c_title"),
                                              "c_image"  => $this->upload->data()['file_name'],                                                                                                                                           
                                             );                                                                  
                    }                    
                    $this->Conversation_model->updateConversation($conversation,$this->input->post("c_id"));                 
                    redirect(base_url()."index.php/admin/conversation"); 
                }                
            }                                          
        } else {
            $this->load->view("admin/conversation/editConversation_view",$data);   
        }   
    } 
    //--- edit　Content
    //---　会話　の内容　を　修正する
    function editContent() 
    {
        $c_id = $this->uri->segment(5);
        $con_id = $this->uri->segment(4);    
        $data['info']= $this->Conversation_model->getContentById($con_id);
        $data['error'] = "";            
        if (isset($_POST['ok'])) {                  
            $config['upload_path'] = './public/audio';
            $config['allowed_types'] = 'avi|flv|wmv|mp3';
            $config['max_size'] = '10000000';

            $this->load->library('upload', $config);
            $this->form_validation->set_rules("con_title","Sub-title","required|max_length[200]");                                          
            $this->form_validation->set_rules("con_hiragana","Hiragana","required|max_length[5000]");
            $this->form_validation->set_rules("con_romaji","Romaji","required|max_length[5000]");
            $this->form_validation->set_rules("con_meaning","Meaning","required|max_length[5000]");             

            if ($this->form_validation->run() == FALSE) {  
                $f_type = $_FILES['userfile']['type'];

                if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                } 
                $data['info']= $this->Conversation_model->getContentById($this->input->post("con_id"));
                $this->load->view("admin/conversation/editContent_view",$data);                
            } else {                
                $f_type = $_FILES['userfile']['type'];

                if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                    $data['info']= $this->Conversation_model->getContentById($this->input->post("con_id"));
                    $this->load->view("admin/conversation/editContent_view",$data);
                } else {
                    if (!$this->upload->do_upload()) {                  
                    $content = array("con_id"       => $this->input->post("con_id"),
                                     "con_title"    => $this->input->post("con_title"),
                                     "con_hiragana" => $this->input->post("con_hiragana"),
                                     "con_romaji"   => $this->input->post("con_romaji"),
                                     "con_meaning"  => $this->input->post("con_meaning")                                    
                                    );                                                                   
                    $this->Conversation_model->updateContent($content,$this->input->post("con_id"));                    
                    redirect(base_url()."index.php/admin/conversation/viewDetailConversation/".$this->input->post("c_id"));   
                    } else {                   
                        $content = array("con_id"       => $this->input->post("con_id"),
                                         "con_title"    => $this->input->post("con_title"),
                                         "con_hiragana" => $this->input->post("con_hiragana"),
                                         "con_romaji"   => $this->input->post("con_romaji"),
                                         "con_meaning"  => $this->input->post("con_meaning"),                                         "con_file"     => $this->upload->data()['file_name']
                                        );                                                                                          
                        $this->Conversation_model->updateContent($content,$this->input->post("con_id"));
                        redirect(base_url()."index.php/admin/conversation/viewDetailConversation/".$this->input->post("c_id")); 
                    }
                }                
            }
        } else {
            $this->load->view("admin/conversation/editContent_view",$data);   
        }            
    }
    // Delete Conversation
    //　会話を消す
    function deleteConversation() 
    {
        $c_id = $this->uri->segment(4);           
        if ($c_id != "") {            
            $this->Conversation_model->deleteConversation($c_id);
            redirect(base_url()."index.php/admin/conversation/index");        
        } else {
            return false;     
        }
    }
    // Delete Content
    //　会話　の　内容　を消す
    function deleteContent() 
    {
        $c_id = $this->uri->segment(5); 
        $con_id = $this->uri->segment(4);                 
        $this->Conversation_model->deleteContent($con_id);
        redirect(base_url()."index.php/admin/conversation/viewDetailConversation/$c_id");
    }
    // add　Content
    //　会話　の　内容　を　加える
    function addContent() 
    {
        $c_id = $this->uri->segment(4);
        $data['info'] = $this->Conversation_model->getInfoConversation($c_id);
        $data['error'] = "";           
        if (isset($_POST['ok'])) {                    
            $config['upload_path'] = './public/audio';
            $config['allowed_types'] = 'avi|flv|wmv|mp3';
            $config['max_size'] = '1000000';
            $this->load->library('upload', $config);

            $this->form_validation->set_rules("con_title","Sub-title","required|max_length[200]");                                          
            $this->form_validation->set_rules("con_hiragana","Hiragana","required|max_length[5000]");
            $this->form_validation->set_rules("con_romaji","Romaji","required|max_length[5000]");
            $this->form_validation->set_rules("con_meaning","Meaning","required|max_length[5000]");                                                                            
                                            
            if ($this->form_validation->run() == FALSE) { 
                $f_type = $_FILES['userfile']['type'];

                if (empty($_FILES['userfile']['name']) OR $f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                } 
                $data['info'] = $this->Conversation_model->getInfoConversation($this->input->post("c_id")); 
                $this->load->view("admin/conversation/addContent_view",$data);                
            } else {
                $f_type = $_FILES['userfile']['type'];

                if (empty($_FILES['userfile']['name']) OR $f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type == "image/PNG" OR $f_type == "image/GIF"){
                    $data['error_file'] = "The file is required and must be avi,flv,wmv,mp3 file!";
                    $data['info'] = $this->Conversation_model->getInfoConversation($this->input->post("c_id")); 
                    $this->load->view("admin/conversation/addContent_view",$data);   
                    
                } else {
                    if (!$this->upload->do_upload()) {
                    $content = array("c_id"         => $this->input->post("c_id"),                                                              
                                     "con_title"    => $this->input->post("con_title"),
                                     "con_hiragana" => $this->input->post("con_hiragana"),
                                     "con_romaji"   => $this->input->post("con_romaji"),
                                     "con_meaning"  => $this->input->post("con_meaning")                                    
                                    );                                        
                    $this->Conversation_model->addContent($content);
                    redirect(base_url()."index.php/admin/conversation/viewDetailConversation/".$this->input->post("c_id")); 
                    } else {
                        $content = array("c_id"         => $this->input->post("c_id"),                                                              
                                         "con_title"    => $this->input->post("con_title"),
                                         "con_hiragana" => $this->input->post("con_hiragana"),
                                         "con_romaji"   => $this->input->post("con_romaji"),
                                         "con_meaning"  => $this->input->post("con_meaning"),
                                         "con_file"     => $this->upload->data()['file_name']                               
                                        );                                              
                        $this->Conversation_model->addContent($content);
                        redirect(base_url()."index.php/admin/conversation/viewDetailConversation/".$this->input->post("c_id")); 
                    }
                }                
            }
        } else {
            $this->load->view("admin/conversation/addContent_view", $data);   
        }
    } 
    //view Detail Conversation
    //　詳細会話　を　見る
    function viewDetailConversation() 
    {
        $c_id = $this->uri->segment(4);
        $conver = $this->Conversation_model->getInfo($c_id);
        $detailConver = $this->Conversation_model->getDetailContentByCid($c_id);     
        $data = "";
        if (!is_null($detailConver)) {
            $data = array('detailConver' => $detailConver,                            
                          'conver'       =>$conver
                         );
            $this->load->view("admin/conversation/viewConversation_view",$data);
        } else {            
            $detailConver = null;
            $data = array('detailConver' => $detailConver,                            
                          'conver'       =>$conver
                         );
            $this->load->view("admin/conversation/viewConversation_view",$data);
        }  
    }
}
?>
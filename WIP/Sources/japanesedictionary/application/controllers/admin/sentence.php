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
        //ロード　ヘルパー
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));
        // load library
        //　ロード　ライブラリ
        $this->load->library(array("input","form_validation","session","my_auth","email"));
        //connect DB
        //　データベース　に　接続する
		$this->load->database();
        $this->load->model("Sentence_model");
        //check Authentication
        //　認証　を　チェックする
        if (!$this->my_auth->is_Admin()) {            
            redirect(base_url()."index.php/admin/verify/login");
            exit();
        }
	}
	//list sentence
    //　リスト　文章
	function index() 
    {
		// count record
        // レコード　を　カウントする
        $max = $this->Sentence_model->num_rows();
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
            $config['base_url'] = base_url()."index.php/admin/sentence/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);                        
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            //データベース　から　データ　を　得る
            $data['sentence'] = $this->Sentence_model->getAllSentence($min,$this->uri->segment($config['uri_segment']));
            // load view
            // ロード　ビュー
            $this->load->view("admin/sentence/listSentence_view",$data);
        } else {
            $data['sentence'] = null;            
            $this->load->view("admin/sentence/listSearchSentence_view",$data);
        }
	}
    //　get　By　Romaji
    //　Romaji　で　得る
    function getByRomaji() 
    {
        $data = "";
        $txtRomaji = "";        
        if (isset($_GET['txtRomaji'])) {
            $txtRomaji = stripslashes(trim($_GET['txtRomaji']));            
        }
        $txtRomaji = ($txtRomaji === null) ? "" : $txtRomaji;   
        if (strpos($txtRomaji,'%') !== false) {                        
            $data['sentence'] = null;            
            $this->load->view("admin/sentence/listSearchSentence_view",$data);
        }
        if ($txtRomaji != "") {
            $max = $this->Sentence_model->num_rowsBySearch($txtRomaji);
            $min = 10;
            $data['txtRomaji'] = $txtRomaji;
            $data['num_rows'] = $max;
            //--- Paging
            //　ページング
            if ($max != 0) {    
                $this->load->library('pagination');                    
                $config['base_url'] = base_url()."index.php/admin/sentence/getByRomaji?txtRomaji=".$txtRomaji."&search=Search";
                $config['total_rows'] = $max;
                $config['per_page'] = $min;
                $config['num_link'] = 3; 
                
                $config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);                                           
                $data['links'] = $this->pagination->create_links();
                $data['sentence'] = $this->Sentence_model->getByRomaji($txtRomaji,$min,$this->input->get('per_page'));
                $this->load->view("admin/sentence/listSearchSentence_view",$data);
            } else {
                $data['sentence'] = null;            
                $this->load->view("admin/sentence/listSearchSentence_view",$data);
            }
        } else {
            $data['sentence'] = null;            
            $this->load->view("admin/sentence/listSearchSentence_view",$data);
        }
    }
    //　add　Sentence
    //　文章　を　加える
    function addSentence() 
    {
        $data['error'] = "";
        if (isset($_POST['addnew'])) {
            $this->load->view("admin/sentence/addSentence_view",$data);
        } else {
            $this->form_validation->set_rules("s_hiragana","Hiragana","required|max_length[1000]");
            $this->form_validation->set_rules("s_romaji","Romaji","required|max_length[1000]");
            $this->form_validation->set_rules("s_meaning","Meaning","required|max_length[1000]");
            $this->form_validation->set_rules("s_kanji","Kanji","required|max_length[1000]");                            
            if ($this->form_validation->run() == FALSE) {            
                $this->load->view("admin/sentence/addSentence_view",array("error" => ""));
            } else {                
                $sentence = array("s_hiragana" => $this->input->post("s_hiragana"),                        
                                  "s_romaji"   => $this->input->post("s_romaji"),
                                  "s_meaning"  => $this->input->post("s_meaning"),
                                  "s_kanji"    => $this->input->post("s_kanji")
                                 );                            
                try {
                    $this->Sentence_model->addSentence($sentence);
                    redirect(base_url()."index.php/admin/sentence/index");                                                   
                } catch(Exception $e) {
                    show_404();
                    log_message('error', $e->getMessage());
                }                
            }
        }
    }
    //　edit　Sentence
    //　文章　を　修正する
    function editSentence() 
    {
        $s_id = $this->uri->segment(4);
        $data['info'] = $this->Sentence_model->getInfoSentence($s_id);
        $data['error'] = "";
        if (is_numeric($s_id) && $data['info'] != NULL) {            
            if (isset($_POST['ok'])) {                         
                $this->form_validation->set_rules("s_hiragana","Hiragana","required|max_length[1000]");
                $this->form_validation->set_rules("s_romaji","Romaji","required|max_length[1000]");
                $this->form_validation->set_rules("s_meaning","Meaning","required|max_length[1000]");
                $this->form_validation->set_rules("s_kanji","Kanji","required|max_length[1000]");                       
                if ($this->form_validation->run() == FALSE) {   
                    $this->load->view("admin/sentence/editSentence_view",$data);                
                } else {
                    $sentence = array("s_hiragana" => $this->input->post("s_hiragana"),                        
                                      "s_romaji"   => $this->input->post("s_romaji"),
                                      "s_meaning"  => $this->input->post("s_meaning"),
                                      "s_kanji"    => $this->input->post("s_kanji")
                                     );                                                                
                    $this->Sentence_model->updateSentence($sentence,$s_id);
                    redirect(base_url()."index.php/admin/sentence"); 
                }
            } else {
                $this->load->view("admin/sentence/editSentence_view",$data);   
            }    
        } else {            
            return false;
        }
    }
    //　delete　Sentence
    //　文章　を　消す
    function deleteSentence() 
    {
        $s_id = $this->uri->segment(4);             
        if (is_numeric($s_id)) {            
            $this->Sentence_model->deleteSentence($s_id);
            redirect(base_url()."index.php/admin/sentence/index");        
        } else {
            return false;     
        }
    }
}
?>
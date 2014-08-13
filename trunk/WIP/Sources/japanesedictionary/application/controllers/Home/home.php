<?php 
/**
* 
*/
class Home extends CI_Controller 
{	
    // contructor
	function __construct() {
		parent::__construct();				
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));		
		$this->load->library(array("input","form_validation","session","my_auth","email"));
        $this->load->model('Vocabulary_model');
        $this->load->model('Kanji_model');
        $this->load->model('Grammar_model');
        $this->load->model('Listening_model');
        $this->load->model('Test_model');
        $this->load->model('Video_model');
        $this->load->model('Conversation_model');
        $this->load->model('ReadingDocument_model');
        $this->load->library('facebook');
        $this->config->load('facebook');
	}
	public function homepage() {
		redirect(base_url()."index.php/Home/verify/login");		
	}	
	public function introduct() {
		$this->load-> view("user/introduct_view");
	}
	public function keyboard() {
		$this->load-> view("user/keyboard_view");
	}
	public function guide() {
		$this->load-> view("user/guide_view");
	}
	public function alphabet() {
		$this->load->view("user/alphabet_view");
	}
	public function review() {
		$this->load->view("user/review_view");
	}
	public function numberic() {
		$this->load->view("user/numberic_view");
	}
	public function time() {
		$this->load->view("user/time_view");
	}
	public function time1() {
		$this->load->view("user/time1_view");
	}
	public function list50() {
		$max = $this->ReadingDocument_model->num_rows_list50();
        // so record tren 1 page
        $min = 20;
        $data['num_rows_list50'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/list50";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                                    
            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['vocabulary'] = $this->ReadingDocument_model->get50Vocabulary($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/list50_view",$data);
        }else{
            $data['vocabulary'] =null;
            $this->load->view("user/list50_view",$data);
        }
	}
    public function studyKanji() {
        $this->load->view("user/studyKanji_view");
    }
    public function list60boKanji() {
        $this->load->view("user/list60boKanji_view");
    }
	public function listKanjiN1() {
		$max = $this->Kanji_model->num_rows_kanjiN1();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_kanjiN1'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listKanjiN1";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getAllKanjiN1($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listKanjiN1_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("user/listKanjiN1_view",$data);
        }
	}
	public function listKanjiN2() {
		$max = $this->Kanji_model->num_rows_kanjiN2();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_kanjiN2'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listKanjiN2";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getAllKanjiN2($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listKanjiN2_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("user/listKanjiN2_view",$data);
        }
	}
	public function listKanjiN3() {
		$max = $this->Kanji_model->num_rows_kanjiN3();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_kanjiN3'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listKanjiN3";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getAllKanjiN3($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listKanjiN3_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("user/listKanjiN3_view",$data);
        }
	}
	public function listKanjiN4() {
		$max = $this->Kanji_model->num_rows_kanjiN4();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_kanjiN4'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listKanjiN4";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getAllKanjiN4($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listKanjiN4_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("user/listKanjiN4_view",$data);
        }
	}
	public function listKanjiN5() {
		$max = $this->Kanji_model->num_rows_kanjiN5();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_kanjiN5'] = $max;
        //--- Paging
        if($max!=0){    
        	//load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listKanjiN5";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['kanji'] = $this->Kanji_model->getAllKanjiN5($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listKanjiN5_view",$data);
        }else{
            $data['kanji'] = null;            
            $this->load->view("user/listKanjiN5_view",$data);
        }
	}
    public function listGrammarN5() {
        $max = $this->Grammar_model->num_rows_listGrammarN5();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listGrammarN5'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listGrammarN5";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getGrammarN5($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listGrammarN5_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("user/listGrammarN5_view",$data);
        }
    }
    public function listGrammarN4() {
        $max = $this->Grammar_model->num_rows_listGrammarN4();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listGrammarN4'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listGrammarN4";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getGrammarN4($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listGrammarN4_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("user/listGrammarN4_view",$data);
        }
    }

public function listGrammarN3() {
        $max = $this->Grammar_model->num_rows_listGrammarN3();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listGrammarN3'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listGrammarN3";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getGrammarN3($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listGrammarN3_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("user/listGrammarN3_view",$data);
        }
    }

public function listGrammarN2() {
        $max = $this->Grammar_model->num_rows_listGrammarN2();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listGrammarN2'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listGrammarN2";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getGrammarN2($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listGrammarN2_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("user/listGrammarN2_view",$data);
        }
    }

    public function listGrammarN1() {
        $max = $this->Grammar_model->num_rows_listGrammarN1();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listGrammarN1'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listGrammarN1";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['grammar'] = $this->Grammar_model->getGrammarN1($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listGrammarN1_view",$data);
        }else{
            $data['grammar'] = null;
            $this->load->view("user/listGrammarN1_view",$data);
        }
    }
    public function conversationSC() {
        $max = $this->Conversation_model->num_rows_conversationSC();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_conversationSC'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/conversationSC";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['conversation'] = $this->Conversation_model->getconversationSC($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listconversationSC_view",$data);
        }else{
            $data['conversation'] = null;
            $this->load->view("user/listconversationSC_view",$data);
        }
    }
    public function conversationTC1() {
        $max = $this->Conversation_model->num_rows_conversationTC1();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_conversationTC1'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/conversationTC1";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['conversation'] = $this->Conversation_model->getconversationTC1($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listconversationTC1_view",$data);
        }else{
            $data['conversation'] = null;
            $this->load->view("user/listconversationTC1_view",$data);
        }
    }
    public function conversationTC2() {
        $max = $this->Conversation_model->num_rows_conversationTC2();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_conversationTC2'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/conversationTC2";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['conversation'] = $this->Conversation_model->getconversationTC2($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listconversationTC2_view",$data);
        }else{
            $data['conversation'] = null;
            $this->load->view("user/listconversationTC2_view",$data);
        }
    }
    public function listeningN2N3() {
        $max = $this->Listening_model->num_rows_listeningN2N3();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listeningN2N3'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listeningN2N3";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['listening'] = $this->Listening_model->getlisteningN2N3($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listlisteningN2N3_view",$data);
        }else{
            $data['listening'] = null;
            $this->load->view("user/listlisteningN2N3_view",$data);
        }
    }
    public function listeningN4N5() {
        $max = $this->Listening_model->num_rows_listeningN4N5();
        // so record tren 1 page
        $min = 5;
        $data['num_rows_listeningN4N5'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/listeningN4N5";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['listening'] = $this->Listening_model->getlisteningN4N5($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listlisteningN4N5_view",$data);
        }else{
            $data['listening'] = null;
            $this->load->view("user/listlisteningN4N5_view",$data);
        }
    }
	
	// NAMLD
	function listMinna() {
        $this->load->model('ReadingDocument_model');
        $listMinna = $this->ReadingDocument_model->getReadingDocument();
        $data = "";
		if(!is_null($listMinna)){					
				$data = array('listMinna' => $listMinna);
			}
		else {
			$listMinna = null;
			$data = array('listMinna' => $listMinna);
		}
		$this->load->view('user/minna/listMinna_view', $data);
	}
	function detailMinna() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
        $listMinna = $this->ReadingDocument_model->getInfo($reading_id);
        $data ="";
        if(!is_null($listMinna)){
        	$data = array('listMinna' => $listMinna);
        } else {
        	$listMinna = null;
					$data = array('listMinna' => $listMinna);
        }        
        
     	$this->load->view('user/minna/detailMinna_view', $data);   
	}
	function detailVocab() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$listMinna = $this->ReadingDocument_model->getInfo($reading_id);
		$detailVocab = $this->ReadingDocument_model->getReadingVocabById($reading_id);		
		$data ="";
        if(!is_null($detailVocab)){
        	$data = array('detailVocab' => $detailVocab,
        					'listMinna'=>$listMinna);
        } else {        	
        	$detailVocab = null;
					$data = array('detailVocab' => $detailVocab,
									'listMinna'=>$listMinna);
        }        
        
     	$this->load->view('user/minna/detailVocab_view', $data);
	}
	function detailArticle() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$listMinna = $this->ReadingDocument_model->getInfo($reading_id);
		$detailArticle = $this->ReadingDocument_model->getReadingArticleById($reading_id);		
		/*echo "<pre>";
		print_r($detailArticle);
		echo "</pre>";
		die;*/
		$data ="";
        if(!is_null($detailArticle)){
        	$data = array('detailArticle' => $detailArticle,
        					'listMinna'=>$listMinna);
        } else {        	
        	$detailArticle = null;
					$data = array('detailArticle' => $detailArticle,
									'listMinna'=>$listMinna);
        }        
        
     	$this->load->view('user/minna/detailArticle_view', $data);
	}
	function detailGrammar() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$this->load->model('Grammar_model');
		$listMinna = $this->ReadingDocument_model->getInfo($reading_id);
		$detailGrammar = $this->Grammar_model->getGrammarByReadingId($reading_id);
		// echo "<pre>";
		// print_r($detailGrammar);
		// echo "</pre>";
		// die;
		if($detailGrammar!==null){					
		foreach ($detailGrammar as $row) {			
			$detailSentence = $this->Grammar_model->getSentenByGrammarId($row->g_id);					
			$row->detailSentence = $detailSentence;
		    }
		}		
		$data = "";
		if(!is_null($detailGrammar)){
        	$data = array('detailGrammar' => $detailGrammar,        					
        					'listMinna'=>$listMinna);
        }else{        	
        	$detailGrammar = null;
					$data = array('detailGrammar' => $detailGrammar,        					
        					'listMinna'=>$listMinna);
        }  
		$this->load->view('user/minna/detailGrammar_view', $data);	
	}
	function detailKanji() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('Kanji_model');
		$this->load->model('ReadingDocument_model');		
		$listMinna = $this->ReadingDocument_model->getInfo($reading_id);
		$detailKanji = $this->Kanji_model->getKanjiByReadingId($reading_id);
		if(!is_null($detailKanji)){
        	$data = array('detailKanji' => $detailKanji,        					
        					'listMinna'=>$listMinna);
        }else{        	
        	$detailKanji = null;
					$data = array('detailKanji' => $detailKanji,        					
        					'listMinna'=>$listMinna);
        }  
        $this->load->view('user/minna/detailKanji_view', $data);
	}
	function vocabularyN3() {
		$this->load->model('ReadingDocument_model');
        $listVocabN3 = $this->ReadingDocument_model->getVocabularyN3();
        $data = "";
		if(!is_null($listVocabN3)){					
				$data = array('listVocabN3' => $listVocabN3);
		}else{
			$listVocabN3 = null;
			$data = array('listVocabN3' => $listVocabN3);
		}
		$this->load->view('user/intermediate/listVocabularyN3_view', $data);
	}
	function detailVocabN3() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailVocabN3 = $this->ReadingDocument_model->getDetailVocabN3($reading_id);
		if(!is_null($detailVocabN3)){					
			$data = array('detailVocabN3' => $detailVocabN3);
		}else{
			$detailVocabN3 = null;
			$data = array('detailVocabN3' => $detailVocabN3);
	    }
		$this->load->view('user/intermediate/detailVocabularyN3_view', $data);
	}
	function vocabularyN2() {
		$this->load->model('ReadingDocument_model');
        $listVocabN2 = $this->ReadingDocument_model->getVocabularyN2();
        $data = "";
		if(!is_null($listVocabN2)){					
				$data = array('listVocabN2' => $listVocabN2);
			}else{
				$listVocabN2 = null;
				$data = array('listVocabN2' => $listVocabN2);
		    }
		$this->load->view('user/intermediate/listVocabularyN2_view', $data);
	}
	function detailVocabN2() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailVocabN2 = $this->ReadingDocument_model->getDetailVocabN2($reading_id);
		if(!is_null($detailVocabN2)){					
			$data = array('detailVocabN2' => $detailVocabN2);
		}else{
			$detailVocabN2 = null;
			$data = array('detailVocabN2' => $detailVocabN2);
		}
		$this->load->view('user/intermediate/detailVocabularyN2_view', $data);  
	}
	function kanjiN3() {
		$this->load->model('ReadingDocument_model');
        $listKanjiN3 = $this->ReadingDocument_model->getKanjiN3();
        $data = "";
		if(!is_null($listKanjiN3)){					
			$data = array('listKanjiN3' => $listKanjiN3);
		}else{
			$listKanjiN3 = null;
			$data = array('listKanjiN3' => $listKanjiN3);
		}
		$this->load->view('user/intermediate/listKanjiN3_view', $data);
	}
	function detailKanjiN3() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailKanjiN3 = $this->ReadingDocument_model->getDetailKanjiN3($reading_id);
		if(!is_null($detailKanjiN3)){					
			$data = array('detailKanjiN3' => $detailKanjiN3);
		}else{
			$detailKanjiN3 = null;
			$data = array('detailKanjiN3' => $detailKanjiN3);
		}
		$this->load->view('user/intermediate/detailKanjiN3_view', $data);
	}
	function kanjiN2() {
		$this->load->model('ReadingDocument_model');
        $listKanjiN2 = $this->ReadingDocument_model->getKanjiN2();
        $data = "";
		if(!is_null($listKanjiN2)){					
			$data = array('listKanjiN2' => $listKanjiN2);
		}else{
			$listKanjiN2 = null;
			$data = array('listKanjiN2' => $listKanjiN2);
		}
		$this->load->view('user/intermediate/listKanjiN2_view', $data);
	}
	function detailKanjiN2() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailKanjiN2 = $this->ReadingDocument_model->getDetailKanjiN2($reading_id);
		if(!is_null($detailKanjiN2)){					
			$data = array('detailKanjiN2' => $detailKanjiN2);
		}else{
			$detailKanjiN2 = null;
			$data = array('detailKanjiN2' => $detailKanjiN2);
		}
		$this->load->view('user/intermediate/detailKanjiN2_view', $data);
	}
	function grammarN3() {
		$this->load->model('ReadingDocument_model');
        $listGrammarN3 = $this->ReadingDocument_model->getGrammarN3();
        $data = "";
		if(!is_null($listGrammarN3)){					
			$data = array('listGrammarN3' => $listGrammarN3);
		}else{
			$listGrammarN3 = null;
			$data = array('listGrammarN3' => $listGrammarN3);
		}
		$this->load->view('user/intermediate/listGrammarN3_view', $data);
	}
	function detailGrammarN3() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailGrammarN3 = $this->ReadingDocument_model->getDetailGrammarN3($reading_id);
		if(!is_null($detailGrammarN3)){					
			$data = array('detailGrammarN3' => $detailGrammarN3);
		}else{
			$detailGrammarN3 = null;
			$data = array('detailGrammarN3' => $detailGrammarN3);
		}
		$this->load->view('user/intermediate/detailGrammarN3_view', $data);
	}
	function grammarN2() {
		$this->load->model('ReadingDocument_model');
        $listGrammarN2 = $this->ReadingDocument_model->getGrammarN2();
        $data = "";
		if(!is_null($listGrammarN2)){					
			$data = array('listGrammarN2' => $listGrammarN2);
		}else{
			$listGrammarN2 = null;
			$data = array('listGrammarN2' => $listGrammarN2);
		}
		$this->load->view('user/intermediate/listGrammarN2_view', $data);
	}
	function detailGrammarN2() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailGrammarN2 = $this->ReadingDocument_model->getDetailGrammarN2($reading_id);
		if(!is_null($detailGrammarN2)){					
			$data = array('detailGrammarN2' => $detailGrammarN2);
		}else{
    		$detailGrammarN2 = null;
    		$data = array('detailGrammarN2' => $detailGrammarN2);
		}
		$this->load->view('user/intermediate/detailGrammarN2_view', $data);
	}
	function articleN3() {
		$this->load->model('ReadingDocument_model');
        $listArticleN3 = $this->ReadingDocument_model->getArticleN3();
        $data = "";
		if(!is_null($listArticleN3)){					
		  $data = array('listArticleN3' => $listArticleN3);
		}else{
			$listArticleN3 = null;
			$data = array('listArticleN3' => $listArticleN3);
		}
		$this->load->view('user/intermediate/listArticleN3_view', $data);
	}
	function detailArticleN3() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailArticleN3 = $this->ReadingDocument_model->getDetailArticleN3($reading_id);
		if(!is_null($detailArticleN3)){					
			$data = array('detailArticleN3' => $detailArticleN3);
		}else{
			$detailArticleN3 = null;
			$data = array('detailArticleN3' => $detailArticleN3);
		}
    	$this->load->view('user/intermediate/detailArticleN3_view', $data);
	}
	function articleN2() {
		$this->load->model('ReadingDocument_model');
        $listArticleN2 = $this->ReadingDocument_model->getArticleN2();
        $data = "";
		if(!is_null($listArticleN2)){					
			$data = array('listArticleN2' => $listArticleN2);
		}else{
			$listArticleN2 = null;
			$data = array('listArticleN2' => $listArticleN2);
		}
		$this->load->view('user/intermediate/listArticleN2_view', $data);
	}
	function detailArticleN2() {
		$reading_id = $this->uri->segment(4);
		$this->load->model('ReadingDocument_model');
		$detailArticleN2 = $this->ReadingDocument_model->getDetailArticleN2($reading_id);
		if(!is_null($detailArticleN2)){					
			$data = array('detailArticleN2' => $detailArticleN2);
		}else{
			$detailArticleN2 = null;
			$data = array('detailArticleN2' => $detailArticleN2);
		}
		$this->load->view('user/intermediate/detailArticleN2_view', $data);
	}
    //view Detail Conversation
    function viewDetailConversation() {
        $c_id = $this->uri->segment(4);
        $conver = $this->Conversation_model->getInfo($c_id);
        $detailConver = $this->Conversation_model->getDetailContentByCid($c_id);
                
        $data = "";
        if(!is_null($detailConver)){
            $data = array('detailConver' => $detailConver,                            
                            'conver'=>$conver);
        }else{            
            $detailConver = null;
            $data = array('detailConver' => $detailConver,                            
                            'conver'=>$conver);
        }  
        $this->load->view("user/viewDetailConversation_view",$data);
    }
    //view Detail Communication
    function viewDetailCommunication() {
        $c_id = $this->uri->segment(4);
        $Communication = $this->Conversation_model->getInfo($c_id);
        $detailCommunication = $this->Conversation_model->getDetailContentByCid($c_id);
                
        $data = "";
        if(!is_null($detailCommunication)){
            $data = array('detailCommunication' => $detailCommunication,                            
                            'Communication'=>$Communication);
        }else{            
            $detailCommunication = null;
            $data = array('detailCommunication' => $detailCommunication,                            
                            'Communication'=>$Communication);
        }  
        $this->load->view("user/viewDetailCommunication_view",$data);   
    }
     //view Detail Grammar
    function viewDetailGrammar() {
        $g_id = $this->uri->segment(4);
        $grammar = $this->Grammar_model->getGrammarByGrammarId($g_id);
        //$data['info'] = $this->Grammar_model->getSentenceByGrammarId($g_id);
        if(!is_null($grammar)){
            foreach ($grammar as $key => $value) {
                 $g_id = $value->g_id;
                 $sentences = $this->Grammar_model->getSentenceByGrammarId($g_id);
                 $grammar[$key]->sentences = $sentences;
            }
            $data = array('grammar' => $grammar,
                            'sentences' => $sentences,
                            );
        }else{
            $grammar = null;    
            $data = array('grammar' => $grammar, );
        }
        $this->load->view("user/viewDetailGrammar_view",$data);
    } 
    function viewDetailListening() {
        $lis_id = $this->uri->segment(4);
        $listen = $this->Listening_model->getInfo($lis_id);
        $detailSource = $this->Listening_model->getDetailSourcefileByLisid($lis_id);
        //$data['info'] = $this->Conversation_model->getDetailContentByCid($c_id);
        $data = "";
        if(!is_null($detailSource)){
            $data = array('detailSource' => $detailSource,                            
                            'listen'=>$listen);
        }else{            
            $detailSource = null;
            $data = array('detailSource' => $detailSource,                            
                            'listen'=>$listen);
        }  
        $this->load->view("user/viewDetailListening_view",$data);
    }
    function documentN3() {
        $this->load->view('user/documentN3_view');
    }
    function documentN2() {
        $this->load->view('user/documentN2_view');
    }
    function documentN4N5() {
        $this->load->view('user/documentN4&N5_view');
    }
    function minanonihon() {
        $this->load->view('user/minanonihon_view');
    }
    function communicatedNihon() {
        $max = $this->Conversation_model->num_rows_communicatedNihon();
        // so record tren 1 page
        $min = 10;
        $data['num_rows_communicatedNihon'] = $max;
        //--- Paging
        if($max!=0){    
            //load library
            $this->load->library('pagination');                    
            $config['base_url'] = base_url()."index.php/Home/home/communicatedNihon";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);                        

            $data['links'] = $this->pagination->create_links();
            //get data from DB
            $data['communicated'] = $this->Conversation_model->getcommunicatedNihon($min,$this->uri->segment($config['uri_segment']));
            // load view
            $this->load->view("user/listcommunicatedNihon_view",$data);
        }else{
            $data['communicated'] = null;
            $this->load->view("user/listcommunicatedNihon_view",$data);
        }
    }
    function manga() {
        $this->load->view("user/manga_view.php");
    }
}
 ?>
 

<?php 
/**
* 
*/
class Admin_test extends CI_Controller
{
	
	function __construct()
	{
			parent::__construct();
	        $this->load->helper("url");
	        $this->load->helper(array('form', 'url'));
	        // load library
	        $this->load->library(array("input","form_validation","session","my_auth","email"));
            // load library unit test
            $this->load->library('unit_test');
	        $this->load->database(); 
	        $this->load->model('Vocabulary_model'); 
            $this->load->model('Kanji_model');
            $this->load->model('Grammar_model');
            $this->load->model('Listening_model');
            $this->load->model('Test_model');
            $this->load->model('User_model');
            $this->load->model('Video_model');
            $this->load->model('Conversation_model'); 
            $this->load->model('ReadingDocument_model');
            $this->load->model("Sentence_model");
            $this->load->model("Contact_model");
	}
	function index(){
		$totalUnitTest = 0;
		//Run test vocabulary controller
		$this->unit->run($this->testListVocab(),"is_true","Test List Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testListContributedVocab(),"is_true","Test List Contributed Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testGetVocabularyByRomaji(),"is_array","Test Get Vocabulary By Romaji");
		$totalUnitTest++;
		$this->unit->run($this->testAddVocabulary(),"is_true","Test Add Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testEditVocab(),"is_true","Test Edit Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteVocabulary(),"is_true","Test Delete Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteContributedVocabulary(),"is_true","Test Delete Contributed Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testCheckVocabulary(),"is_true","Test Check Vocabulary");
		$totalUnitTest++;
		$this->unit->run($this->testAddMeaning(),"is_true","Test Add Meaning");
		$totalUnitTest++;
		$this->unit->run($this->testReferenceSentence(),"is_array","Test Reference Sentence");
		$totalUnitTest++;
		$this->unit->run($this->testGetReferByMid(),"is_true","Test Get Reference Sentence By Mid");
		$totalUnitTest++;
		$this->unit->run($this->testAddRefer(),"is_true","Test Add Reference");
		$totalUnitTest++;
		$this->unit->run($this->testEditRefer(),"is_true","Test Edit Reference");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteRefer(),"is_true","Test Delete Reference");
		$totalUnitTest++;
		//End Run test vocabulary controller

		//Run test video controller
		$this->unit->run($this->testListVideo(),"is_true","Test List Video");
		$totalUnitTest++;
		$this->unit->run($this->testGetByTitle(),"is_true","Test Get Video By Title");
		$totalUnitTest++;
		$this->unit->run($this->testAddVideo(),"is_true","Test Add Video");
		$totalUnitTest++;
		$this->unit->run($this->testEditVideo(),"is_true","Test Edit Video");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteVideo(),"is_true","Test Delete Video");
		$totalUnitTest++;
		//Edn Run test video controller

		//Run test verify controller
		$this->unit->run($this->testLogin(),"is_true","Test Login Admin");
		$totalUnitTest++;
		$this->unit->run($this->testLogout(),"is_true","Test Logout Admin");
		$totalUnitTest++;
		//End Run test verify controller

		//Run test traininglistening controller
		$this->unit->run($this->testListTrainingListening(),"is_true","Test List Training Listening");
		$totalUnitTest++;
		$this->unit->run($this->testGetListeningByLevel(),"is_true","Test Get Training Listening By Level");
		$totalUnitTest++;
		$this->unit->run($this->testAddTraininglistening(),"is_true","Test Add Training Listening");
		$totalUnitTest++;
		$this->unit->run($this->testEditTraininglistening(),"is_true","Test Edit Training Listening");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteSourcefile(),"is_true","Test Delete Source File");
		$totalUnitTest++;
		$this->unit->run($this->testAddSourcefile(),"is_true","Test Add Source File");
		$totalUnitTest++;
		//End Run test traininglistening controller

		//Run test test controller
		$this->unit->run($this->testListTest(),"is_true","Test List Test");
		$totalUnitTest++;
		$this->unit->run($this->testGetTestByLevel(),"is_true","Test Get List Test By Level");
		$totalUnitTest++;
		$this->unit->run($this->testAddTest(),"is_true","Test Add Test");
		$totalUnitTest++;
		$this->unit->run($this->testEditTest(),"is_true","Test Edit Test");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteTest(),"is_true","Test Delete Test");
		$totalUnitTest++;
		$this->unit->run($this->testAddQuestion(),"is_true","Test Add Question");
		$totalUnitTest++;
		$this->unit->run($this->testAddAnswer(),"is_true","Test Add Answer");
		$totalUnitTest++;
		//End Run test test controller

		//Run test sentence controller
		$this->unit->run($this->testListSentence(),"is_true","Test List Sentence");
		$totalUnitTest++;
		$this->unit->run($this->testGetByRomaji(),"is_true","Test Get Sentence By Romaji");
		$totalUnitTest++;
		$this->unit->run($this->testAddSentence(),"is_true","Test Add Sentence");
		$totalUnitTest++;
		$this->unit->run($this->testEditSentence(),"is_true","Test Edit Sentence");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteSentence(),"is_true","Test Delete Sentence");
		$totalUnitTest++;
		//End Run test sentence controller

		//Run test kanji controller
		$this->unit->run($this->testListKanji(),"is_true","Test List Kanji");
		$totalUnitTest++;
		$this->unit->run($this->testGetByHanViet(),"is_true","Test Get List Kanji By Am Han Viet");
		$totalUnitTest++;
		$this->unit->run($this->testListContributedKanji(),"is_true","Test List Contributed Kanji");
		$totalUnitTest++;
		$this->unit->run($this->testAddKanji(),"is_true","Test Add Kanji");
		$totalUnitTest++;
		$this->unit->run($this->testEditKanji(),"is_true","Test Edit Kanji");
		$totalUnitTest++;
		$this->unit->run($this->testApprovedKanji(),"is_true","Test Approved Kanji");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteKanji(),"is_true","Test Delete Kanji");
		$totalUnitTest++;
		//End Run test kanji controller

		//Run test contact controller
		$this->unit->run($this->testListContact(),"is_true","Test List Contact");
		$totalUnitTest++;
		$this->unit->run($this->testListReplyContact(),"is_true","Test List Reply Contact");
		$totalUnitTest++;
		$this->unit->run($this->testGetContactByContactType(),"is_true","Test Get Contact By Type");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteContact(),"is_true","Test Delete Contact");
		$totalUnitTest++;
		//End Run test contact controller

		//Run test conversation controller
		$this->unit->run($this->testListConversation(),"is_true","Test List Conversation");
		$totalUnitTest++;
		$this->unit->run($this->testGetConversationByLevel(),"is_true","Test Get List Conversation By Level");
		$totalUnitTest++;
		$this->unit->run($this->testAddConversation(),"is_true","Test Add Conversation");
		$totalUnitTest++;
		$this->unit->run($this->testEditConversation(),"is_true","Test Edit Conversation");
		$totalUnitTest++;
		$this->unit->run($this->testDeleteConversation(),"is_true","Test Delete Conversation");
		$totalUnitTest++;
		//End Run test conversation controller
		echo $this->unit->report()."<br>";
        echo "Total Unit Test: ".$totalUnitTest;
	}
	// test vocabulary controller
	function testListVocab(){
		// count record
        $max = $this->Vocabulary_model->num_rows();  
        $min = 10;  
        $config['uri_segment'] = 4;        
            //get data from DB
            $data = $this->Vocabulary_model->getAllVocabulary($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }               
	}
	function testListContributedVocab(){
		// count record
        $max = $this->Vocabulary_model->num_rows_contributed();
        // so record tren 1 page
        	$min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Vocabulary_model->getContributedVocab($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }        
	}
	function testGetVocabularyByRomaji(){
		$data = "";
        $txtRomaji = "benkyou";        
        $max = $this->Vocabulary_model->num_rowsBySearch($txtRomaji);
        $min = 10;  
        $config['uri_segment'] = 4;
        $data = $this->Vocabulary_model->getVocabularyByRomaji($txtRomaji,$min,$this->uri->segment($config['uri_segment']));
        return $data;
	}
	function testAddVocabulary(){		            
        $vocab = array(                        
                "v_hiragana"  => "さがす",                        
                "v_romaji"  => "sagasu",                                                                                                                 
                "v_status"    => 1, // da kich hoat
                );
        if ($this->Vocabulary_model->addVocabulary($vocab)) {
        	return true;
        } else {
        	return false;
        }                                                                           
	}
	function testEditVocab(){
		$v_id = 2;
        $m_id = 1;                
            $vocab = array(
                                    "v_id" => "2",
                                    "v_hiragana" => "さくら",
                                    "v_romaji" => "sakura",
                                    "v_status" => 1
                                    );
            $meaning = array(                                    
                                    "v_id"  => "2",
                                    "m_meaningvn" => "hoa anh dao",
                                    "m_category" => "n",
                                    "m_kanji"     => "さくら",
                                    "m_specialized" => ""
                                 );
        if($this->Vocabulary_model->updateVocab($vocab,$v_id) && $this->Vocabulary_model->updateMeaning($meaning,$m_id)){
        	return true;
        }else{
        	return false;
        }                                   
	}
	function testDeleteVocabulary(){
		$v_id = 2;
        $m_id = 1;
        if($this->Vocabulary_model->deleteVocabulary($v_id,$m_id)){            
            return true;                   
        }else{
            return false;     
        }
	}
	function testDeleteContributedVocabulary(){
		$v_id = 14;
        $m_id = 13;                
        if($this->Vocabulary_model->deleteVocabulary($v_id,$m_id)){            
            return true;
        }else{
            return false;     
        }
	}
	function testCheckVocabulary(){
		$v_id = 8;
		$v_hiragana ="yousu";
        if($this->Vocabulary_model->getVocabulary($v_hiragana,$v_id)==TRUE){
            return TRUE;
        }
        else{            
            return FALSE;
       }
	}
	function testAddMeaning(){
		$v_id = 1;
        $m_id = 1;        
                      $meaning = array(                                    
                                    "v_id"  => 1,
                                    "m_meaningvn" => "hoa anh dao",
                                    "m_category" => "n",
                                    "m_kanji"     => "さくら",
                                    "m_specialized" => ""
                                 );  
        if($this->Vocabulary_model->addMeaning($meaning)==true){
        	return true;
        }else{
        	return false;
        }                                         
	}
	function testReferenceSentence(){
		// count record
        $max = $this->Vocabulary_model->num_rowsReferSentence();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Vocabulary_model->getReferSentence($min,$this->uri->segment($config['uri_segment']));
        return $data;
	}
	function testGetReferByMid(){
		$data = "";
        $txtMid = "1";        

        $max = $this->Vocabulary_model->num_rowsReferBySearch($txtMid);
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Vocabulary_model->getReferByMid($txtMid,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }
	}
	function testAddRefer(){             
                $refer = array(                        
                        "m_id"  => 2,                        
                        "s_id"  => 1
                );
            	if ($this->Vocabulary_model->addRefer($refer)) {
            		return true;
            	} else {
            		return false;
            	}            	                    
	}
	function testEditRefer(){
		$m_id = 1;
        $s_id = 2;                              
                       $refer = array(                                    
                                    "m_id"  => 1,
                                    "s_id" => 3
                                 );
                       if($this->Vocabulary_model->updateRefer($refer,$m_id,$s_id)){
                       		return true;
                       }else{
                       		return false;
                       }                                                                  
	}
	function testDeleteRefer(){
		$m_id = 1;             
        $s_id = 2;                   
        if ($this->Vocabulary_model->deleteRefer($m_id,$s_id)) {
        	return true;
        } else {
        	return false;
        }                                       
	}
	// end test vocabulary controller

	//test video controller
	function testListVideo(){
		// count record
        $max = $this->Video_model->num_rows();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Video_model->getAllVideo($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }        
	}
	function testGetByTitle(){
		$data = "";
        $txtTitle = "hoa anh dao";        
        $max = $this->Video_model->num_rowsBySearch($txtTitle);
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Video_model->getByTitle($txtTitle,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }    
	}
	function testAddVideo(){            
                $video = array(                        
                        "vi_title"  => "[Doraemon] Quyết Chiến!! Chó máy đấu Mèo máy",                        
                        "vi_link"  => "http://www.youtube.com/watch?v=N1-PoMy4phg"
                );
                if ($this->Video_model->addVideo($video)) {
                	return true;
                } else {
                	return false;
                }                                                        
	}
	function testEditVideo(){
		$vi_id = 2;
        $data['info'] = $this->Video_model->getInfoVideo($vi_id);
                      $video = array(
                                    "vi_id" => 2,
                                    "vi_title" => "[Doraemon] Quyết Chiến!! Chó máy đấu Mèo máy",
                                    "vi_link" => "http://www.youtube.com/watch?v=N1-PoMy4phg"
                                    );                                                              
        if ($this->Video_model->updateVideo($video,$vi_id)) {
                	return true;
                } else {
                	return false;
                } 
	}
	function testDeleteVideo(){
		$vi_id = 2;                     
		if ($this->Video_model->deleteVideo($vi_id)) {
			return true;			
		} else {
			return false;
		}      
	}
	//end test video controller

	// test verify controller
	function testLogin(){
			$this->my_auth->is_Admin()==true;
			$u = "datpt";
            $p = "admin";
            $session = $this->User_model->checkLogin($u,$p);
            if(!is_null($session) && $session['u_role'] == 1 && $session['u_status'] ==1)
                 {                                            
                    return true;
                 }
                 else
                 {        
                    return false;   
                 }
	}
	function testLogout(){
		if($this->my_auth->sess_destroy()){
                return true;
            }else{
                return false;
            }
	}
	// end test verify controller

	//test traininglistening controller
	function testListTrainingListening(){
		// count record
        $max = $this->Listening_model->num_rows();
        // so record tren 1 page
        	$min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Listening_model->getAllListening($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }        
	}
	function testGetListeningByLevel(){
		$data = "";
        $txtLevel = "N4N5";        
        $max = $this->Listening_model->num_rowsBySearch($txtLevel);
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Listening_model->getListeningByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }    
	}
	function testAddTraininglistening(){          
                $traininglistening = array(                                                
                        "lis_title"     => "Choukai(これで大丈夫)_N4&N5_絵のある問題_P12",                       
                        "lis_level"  => "N4N5"
                ); 
                if ($this->Listening_model->addTraininglistening($traininglistening)) {
                               	return true;
                               } else {
                               	return false;
                               }
	}
	function testEditTraininglistening(){
		$lis_id = 1;       
    	$sourcefile_id = "N4N5BAI1PHAN2";    	 	        
                      $traininglistening = array(                        
                        "lis_id"  => 1,
                        "lis_title"  => "Choukai(これで大丈夫)_N4&N5_絵のある問題_P12",                         
                        "lis_level"  => "N4&N5"
               			 );
                      $sourcefile = array(                                    
                                    "sourcefile_id"      => "N4N5BAI1PHAN2",
                                    "lis_id"      => 1,
                                    "sourcefile_question"=> "1. なまえは?<br>&nbsp;&nbsp;&nbsp;&nbsp;a.まつだ b.ますだ",
                                    "sourcefile_script"  => "ウクライナ東部で、マレーシア航空の旅客機が撃墜された事件を巡って、国連の安全保障理事会では、原因の究明に向けて国際的な調査を行い、各国に協力を求める決議が、日本時間の２２日未明に採択される見通しです",
                                    "sourcefile_meaning" => "Hội đồng Bảo an Liên Hợp Quốc đã thông qua một nghị quyết để thực hiện một cuộc điều tra quốc tế đối với cuộc điều tra về nguyên nhân, tranh thủ quốc gia, 22 thời gian Nhật Bản nó được dự kiến sẽ được thông qua trong những giờ đầu của ngày.",
                                    "sourcefile_answer"  => "1 .A 2.A"
                                 );
        if($this->Listening_model->updateTraininglistening($traininglistening,$lis_id)
        	 && $this->Listening_model->updateSourcefile($sourcefile,$sourcefile_id)){
        	return true;
        }else{
        	return false;
        }               
	}
	function testDeleteSourcefile(){
		$lis_id = 2;
        $sourcefile_id = "N4N5BAI1PHAN2";                            
        if ($this->Listening_model->deleteSourcefile($lis_id,$sourcefile_id)) {
        	return true;
        } else {
        	return false;
        }                
	}
	function testAddSourcefile(){
		$lis_id = 2;
        $sourcefile_id = "N4N5BAI1PHAN2";                
                       $traininglistening = array(                        
                        "lis_id"  => 2,
                        "lis_title"  => "Choukai(これで大丈夫)_N4&N5_絵のある問題_P10",                         
                        "lis_level"  => "N4N5",                    
                         );
                      $sourcefile = array(                                    
                                    "sourcefile_id"        => "N4N5BAI1PHAN3",
                                    "lis_id"               => 2,
                                    "sourcefile_question"  => "1. なまえは?<br>&nbsp;&nbsp;&nbsp;&nbsp;a.まつだ b.ますだ",
                                    "sourcefile_script"    => "ウクライナ東部で、マレーシア航空の旅客機が撃墜された事件を巡って、国連の安全保障理事会では、原因の究明に向けて国際的な調査を行い、各国に協力を求める決議が、日本時間の２２日未明に採択される見通しです",
                                    "sourcefile_meaning"   => "Hội đồng Bảo an Liên Hợp Quốc đã thông qua một nghị quyết để thực hiện một cuộc điều tra quốc tế đối với cuộc điều tra về nguyên nhân, tranh thủ quốc gia, 22 thời gian Nhật Bản nó được dự kiến sẽ được thông qua trong những giờ đầu của ngày.",
                                    "sourcefile_answer"    => "1 .A 2.A"
                                 );
		if($this->Listening_model->addSourcefile($sourcefile)){
			return true;
		}else{
			return false;
		}                                    
	}
	//end test traininglistening controller

	// test test controller
	function testListTest(){
		// count record
        $max = $this->Test_model->num_rows();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Test_model->getAllTest($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        } 
	}
	function testGetTestByLevel(){
		$data = "";
        $txtLevel = "N3";           
        $max = $this->Test_model->num_rowsBySearch($txtLevel);        
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Test_model->getTestByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
        	return true;
        } else {
        	return false;
        }   
	}
	function testAddTest(){         
                $test = array(                        
                        "test_id"  => "N3_Dokkai_004",                        
                        "test_category"  => "Reading",
                        "test_level"     => "N3",                                                                                                                    
                        "test_content"    => "問題Ⅰ　______の ところに 何を いれますか 。１、２、３、４ から いちばん いい ものを 一つ えらびなさい "
                );
		    	if ($this->Test_model->addTest($test)) {
		                	return true;
		                } else {
		                	return false;
		                }                                            
	}
	function testEditTest(){
		$test_id = "N3_Dokkai_001";
        $question_id = 1;
        $answer_id = 4;
                      $test = array(
                                    "test_id" => "N3_Dokkai_001",
                                    "test_category" => "Reading",
                                    "test_level" => "N3",
                                    "test_content" =>  "問題Ⅰ　______の ところに 何を いれますか 。１、２、３、４ から いちばん いい ものを 一つ えらびなさい "                                   
                                    );
                      $question = array(    
                      				"test_id" => "N3_Dokkai_001",                                                                
                                    "question_content" => "問（2） だれかの ないて いる 声＿＿＿聞こえます"                                     
                                 );
                      $answer = array(
                      				"question_id" => 1,
                      				"answer_content" => "１．か",
                      				"answer_correct" => 1
                      			);
		if($this->Test_model->updateTest($test,$test_id) && 
			$this->Test_model->updateQuestion($question,$test_id) && 
			$this->Test_model->updateAnswer($answer,$question_id)){
				return true;
		}else{
				return false;
		}                      			   
	}
	function testDeleteTest(){
		$test_id = "N3_Dokkai_001";
        $question_id = 2;
        $answer_id = 2;
        if ($this->Test_model->deleteTest($test_id,$question_id,$answer_id)) {
               		return true;
               	} else {
               		return false;
               	}     		        	            
	}
	function testAddQuestion(){
		$test_id = "N3_Dokkai_001";
                      $question = array(                                                                        
                                    "test_id" => "N3_Dokkai_001",
                                    "question_content" => "問題Ⅰ　______の ところに 何を いれますか 。１、２、３、４ から いちばん いい ものを 一つ えらびなさい "                                    
                                 ); 
        if($this->Test_model->addQuestion($question)){
        	return true;
        }else{
        	return false;
        }                                           
	}
	function testAddAnswer(){
		$test_id = "N3_Dokkai_001";
        $question_id = 2;              
                      $answer = array(                                                                        
                                    "question_id" => 2,
                                    "answer_content" => "３．の",
                                    "answer_correct" => 1                                    
                                 );
        if($this->Test_model->addAnswer($answer)){
        	return true;
        }else{
        	return false;
        }                                                                     
	}
	// end test test controller

	//test sentence controller
	function testListSentence(){
		// count record
        $max = $this->Sentence_model->num_rows();
        // so record tren 1 page
        $min = 10; 
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Sentence_model->getAllSentence($min,$this->uri->segment($config['uri_segment']));
        if(!is_null($data)){
        	return true;
        }else{
        	return false;
        }
	}
	function testGetByRomaji(){
        $txtRomaji = "sou";         

        $max = $this->Sentence_model->num_rowsBySearch($txtRomaji);
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Sentence_model->getByRomaji($txtRomaji,$min,$this->uri->segment($config['uri_segment']));
        if(!is_null($data)){
        	return true;
        }else{
        	return false;
        }    
	}
	function testAddSentence(){            
                $sentence = array(                        
                        "s_hiragana"  => "あんきだけのべんきょう",                        
                        "s_romaji"  => "ankidakenobenkyou",
                        "s_meaning"  => "Chỉ học vẹt",
                        "s_kanji"  => "暗記だけの勉強"
                );
                if ($this->Sentence_model->addSentence($sentence)) {
                	return true;
                } else {
                	return false;
                }                    
	}
	function testEditSentence(){
		$s_id = 2;        
                      $sentence = array(                        
                        "s_hiragana"  => "あんきだけのべんきょう",                        
                        "s_romaji"  => "ankidakenobenkyou",
                        "s_meaning"  => "Chỉ học vẹt",
                        "s_kanji"  => "暗記だけの勉強"
                		);
        if ($this->Sentence_model->updateSentence($sentence,$s_id)) {
                	return true;
                } else {
                	return false;
                }                                        
	}
	function testDeleteSentence(){
		$s_id = 3;             
        if ($this->Sentence_model->deleteSentence($s_id)) {
        	return true;
        } else {
        	return false;
        }
    }
	//end test sentence controller

	// test kanji controller
	function testListKanji(){
		// count record
        $max = $this->Kanji_model->num_rows();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Kanji_model->getAllKanji($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
            	return true;
            } else {
            	return false;
            }                
	}
	function testGetByHanViet(){
        $txtHanViet = "Nam";     
        $max = $this->Kanji_model->num_rowsBySearch($txtHanViet);
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Kanji_model->getByHanViet($txtHanViet,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
            	return true;
            } else {
            	return false;
            }    
	}
	function testListContributedKanji(){
		$max = $this->Kanji_model->num_rows_contributed();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Kanji_model->getContributedKanji($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
            	return true;
            } else {
            	return false;
            }    
	}
	function testAddKanji(){          
                $kanji = array(                        
                        "k_kanji"  => "居",                        
                        "k_hanviet"  => "CƯ, KÍ",
                        "k_onyomi"  => "キョ, コ",
                        "k_kunyomi"  => "い.る, -い, お.る",
                        "k_meaning"  => "Ở.Tích chứa",
                        "k_level"  => "N5",
                        "k_status" => 1,
                        "reading_id" => ""
                );
                if ($this->Kanji_model->addKanji($kanji)) {
                	return true;
                } else {
                	return false;
                }
	}
	function testEditKanji(){
		$k_id = 19;
                      $kanji = array( 
                        "k_id"  => 19,                     
                        "k_kanji"  => "居",                        
                        "k_hanviet"  => "CƯ, KÍ",
                        "k_onyomi"  => "キョ, コ",
                        "k_kunyomi"  => "い.る, -い, お.る",
                        "k_meaning"  => "Ở.Tích chứa",
                        "k_level"  => "N5",
                        "k_status" => 1,
                        "reading_id" => ""
                );
        if($this->Kanji_model->updateKanji($kanji,$k_id)){
        	return true;
        }else{
        	return false;
        }                                        
	}
	function testApprovedKanji(){
		$k_id = 22	;
                      $kanji = array(
                        "k_id" => 22,
                        "k_kanji"  => "疲",                        
                        "k_hanviet"  => "BÌ",
                        "k_onyomi"  => "ト",
                        "k_kunyomi"  => "すえ",
                        "k_meaning"  => "Mỏi mệt",
                        "k_level"  => "N3",
                        "k_status" => 1,
                        "reading_id" => ""
                                    );
		if($this->Kanji_model->updateKanji($kanji,$k_id)){
			return true;
		}else{
			return false;
		}                                                                            
	}
	function testDeleteKanji(){
		$k_id = 22;
		if($this->Kanji_model->deleteKanji($k_id)){
			return true;
		}else{
			return false;
		}                                     
	}
	// end test kanji controller

	// test contact controller
	function testListContact(){
		// count record
        $max = $this->Contact_model->num_rows();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Contact_model->getAllContact($min,$this->uri->segment($config['uri_segment']));
		if (!is_null($data)) {
		       	return true;
		       } else {
		       	return false;
		       }

	}
	function testListReplyContact(){
		$max = $this->Contact_model->num_rows_reply();
        // so record tren 1 page
        $min = 10;
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Contact_model->getReplyContact($min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
		       	return true;
		       } else {
		       	return false;
		       }
	}
	function testGetContactByContactType(){
        $txtType = "Opinion";          
        $max = $this->Contact_model->num_rowsBySearch($txtType);
        $min = 1;
            $config['uri_segment'] = 4;
            $data = $this->Contact_model->getContactByType($txtType,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
		       	return true;
		       } else {
		       	return false;
		       }    
	}
	function testDeleteContact(){
		$contact_id = 13;  
		if($this->Contact_model->deleteContact($contact_id)){
			return true;
		}else{
			return false;
		}                                 
	}
	// end test contact controller

	// test conversation controller
	function testListConversation(){
		// count record
        $max = $this->Conversation_model->num_rows();
        // so record tren 1 page
        $min = 10; 
            $config['uri_segment'] = 4;
            //get data from DB
            $data = $this->Conversation_model->getAllConversation($min,$this->uri->segment($config['uri_segment']));
		if (!is_null($data)) {
		       	return true;
		       } else {
		       	return false;
		       }
	}
	function testGetConversationByLevel(){
        $txtLevel = "N3";         
        $max = $this->Conversation_model->num_rowsBySearch($txtLevel);
        $min = 10;
            $config['uri_segment'] = 4;
            $data = $this->Conversation_model->getConversationByLevel($txtLevel,$min,$this->uri->segment($config['uri_segment']));
        if (!is_null($data)) {
		       	return true;
		       } else {
		       	return false;
		       }    
	}
	function testAddConversation(){        
                $conversation = array(                        
                        "c_id"  => "SC_10",                        
                        "c_level"  => "Sơ cấp",
                        "c_title"  => "Hội thoại_sơ cấp_Bài 10",
                        "c_image"  =>  ""                                                                                                                                             
                );
                if ($this->Conversation_model->addConversation($conversation)) {
                	return true;
                } else {
                	return false;
                }                                    
	}
	function testEditConversation(){
		$c_id = "SC_1";
    	$con_id = 1; 
                      $conversation = array(                        
                        "c_id"  => "SC_1",                        
                        "c_level"  => "Sơ cấp",
                        "c_title"  => "Hội thoại_sơ cấp_Bài 1",
                        "c_image"  => "",                                                                                                                                           
               			 );
                      $conversation_content = array(                                    
                                    "con_id"  => "SC_1",
                                    "con_title" => "bbb",
                                    "con_hiragana" => "A:　先生、おはようございます。

		B: 　おはよう。",
                                    "con_romaji"   => "bbb",
                                    "con_meaning"  => "bbb"
                                 ); 
		if($this->Conversation_model->updateConversation($conversation,$c_id) && $this->Conversation_model->updateContent($conversation_content,$con_id)){
			return true;
		}else{
			return false;
		}                                   
	}
	function testDeleteConversation(){
		$c_id = "SC_2";
        $con_id = "2";                
        if($this->Conversation_model->deleteConversation($c_id,$con_id)){
        	return true;
        }
        return false;            
	}
	// end test conversation controller

	// test grammar controller	
	// end test grammar controller

	// test readingdocument controller
	// end test readingdocument controller

	// test home controller
	// end test home controller
}
?>
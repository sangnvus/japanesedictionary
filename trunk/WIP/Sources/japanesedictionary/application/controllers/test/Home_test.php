<?php 
/**
* 
*/
class Home_test extends CI_Controller
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
            $this->load->library('recaptcha');
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
	}
	function index(){
		$totalUnitTest = 0;

		//Run Test Search function
			$this->unit->run($this->testSearchResults("","sentence"),"Không có kết quả trong cơ sở dữ liệu!","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults(null,"sentence"),"Không có kết quả trong cơ sở dữ liệu!","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("fuguai","sentence"),"is_true","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("fuguai\\","sentence"),"Không có kết quả trong cơ sở dữ liệu!","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("fug\uai","sentence"),"is_true","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("ふぐあい","sentence"),"is_true","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("!@#$%%","sentence"),"Không có kết quả trong cơ sở dữ liệu!","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("       fuguai    ","sentence"),"is_true","Test Get Vocabulary By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("おいしい","conversation"),"is_array","Test Get Conversation");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("oishii","conversation"),"is_array","Test Get Conversation");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("oishi\i","conversation"),"is_array","Test Get Conversation");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("Doraemon","video"),"is_array","Test Get Video");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("Dorae\mon","video"),"is_array","Test Get Video");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("によって","grammar"),"is_array","Test Get Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("によ\って","grammar"),"is_array","Test Get Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("ni yotte","grammar"),"is_array","Test Get Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("fuguai","specialized"),"is_true","Test Get Vocabulary Specialized By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("fuguai\\","specialized"),"Không có kết quả trong cơ sở dữ liệu!","Test Get Vocabulary Specialized By Hiragana");
	        $totalUnitTest ++;
	        $this->unit->run($this->testSearchResults("fug\uai","specialized"),"is_true","Test Get Vocabulary Specialized By Hiragana");
	        $totalUnitTest ++;
        //End Run Test Search funtion

        //Run Test registration function
	        $this->unit->run($this->testRegistration(null,null,null,null,null),"Tên đăng nhập không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("","","","",""),"Tên đăng nhập không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("","tuannnse02189@fpt.edu.vn","","",""),"Tên đăng nhập không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("","tuannnse02189@fpt.edu.vn","123456"," ",""),"Tên đăng nhập không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("","tuannnse02189@fpt.edu.vn","123456","1234",""),"Tên đăng nhập không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("","@@@@tuannn","123456","1234",""),"Tên đăng nhập không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","tuannnse02189@fpt.edu.vn","","123456",""),"Mật khẩu không được để trống","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("!@#$%","$%&()%@^","$%&()%@^","$%&()%@^","^$%^&^"),"Tên đăng nhập chỉ chứa chữ hoặc số.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","tuannnse02188@fpt.edu.vn","tuannn","tuannn","Nguyen Tuan"),"Đăng ký thành công","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuann","tuannnse02189@fpt.edu.vn","tuannn","tuannn","Nguyen Tuan"),"Tên đăng nhập phải có ít nhất 6 kí tự","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","tuannnse02189@fpt.edu.vn","","tuannn","Nguyen Tuan"),"Mật khẩu không được để trống","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","tuannnse02189@fpt.edu.vn","tuan","tuannn","Nguyen Tuan"),"Mật khẩu phải có ít nhất 6 kí tự","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","tuannnse02189@fpt.edu.vn","tuancccc","tuannn","Nguyen Tuan"),"Nhập lại mật khẩu sai mật khẩu đã nhập.","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","","tuannn","tuannn","Nguyen Tuan"),"Email không được để trống","Test Registrantion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testRegistration("tuannn","tuannnse02189@fpt.edu.vn","tuannn","tuannn",""),"Họ và tên không được để trống.","Test Registrantion");
	        $totalUnitTest ++;
        //End Run Test registration function
	    // Run Test attributeQA function 
	        $this->unit->run($this->testAttributeQA(null,null,null),"Email không được để trống","Test Attribute Q & A");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeQA("","",""),"Email không được để trống","Test Attribute Q & A");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeQA("tuannnse02189@fpt.edu.vn","Làm sao để đăng ký tài khoản",true),"Đóng góp thành công","Test Attribute Q & A");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeQA("jfsf@@hsf","Làm sao để đăng ký tài khoản",true),"Email không hợp lệ","Test Attribute Q & A");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeQA("tuannnse02189@fpt.edu.vn","#$%^&*",false),"Bạn đã nhập sai mã xác nhận","Test Attribute Q & A");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeQA("tuannnse02189@fpt.edu.vn","",true),"Nội dung không để trống","Test Attribute Q & A");
	        $totalUnitTest ++;
	    // End Run Test attributeQA function
	    // Test login function
	        $this->unit->run($this->testLogin("",""),"Phải điền tên đăng nhập","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin(null,null),"Phải điền tên đăng nhập","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin("datpham","admin1"),"Đăng nhập thành công","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin("datp","admin1"),"Tên đăng nhập hoặc mật khẩu không đúng","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin("datpham","admin"),"Tên đăng nhập hoặc mật khẩu không đúng","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin("datpham",null),"Phải điền mật khẩu","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin("","admin1"),"Phải điền tên đăng nhập","Test Login");
	        $totalUnitTest ++;
	        $this->unit->run($this->testLogin("datpt","amin1"),"Tên đăng nhập hoặc mật khẩu không đúng","Test Login");
	        $totalUnitTest ++;
	    // End Test login function
	    // Run Test attributeOpinion function
	        $this->unit->run($this->testAttributeOpinion(null,null,null),"Email không được để trống","Test Attribute Opinion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeOpinion("","",""),"Email không được để trống","Test Attribute Opinion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeOpinion("tuannnse02189@fpt.edu.vn","#$%^&*()",true),"Đóng góp thành công","Test Attribute Opinion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeOpinion("fshf@@fss","Nên thay màu nên trang web",true),"Email không hợp lệ","Test Attribute Opinion");
	        $totalUnitTest ++;
	        $this->unit->run($this->testAttributeOpinion("tuannnse02189@fpt.edu.vn","",true),"Nội dung không để trống","Test Attribute Opinion");
	        $totalUnitTest ++;
	    // End Run Test attributeOpinion function

	    // Run Test contributedGrammar
	        $this->unit->run($this->testContributedGrammar(null,null,null,null),"Tên ngữ pháp không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("","","",""),"Tên ngữ pháp không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("","N+によって。。。","tùy vào, vì, do…",""),"Tên ngữ pháp không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("","N+によって。。。","tùy vào, vì, do…",true),"Tên ngữ pháp không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("","N+によって。。。","tùy vào, vì, do…",null),"Tên ngữ pháp không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","","",""),"Cấu trúc không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","","tùy vào, vì, do…",""),"Cấu trúc không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","","tùy vào, vì, do…",true),"Cấu trúc không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","N+によって。。。","",""),"Cách dùng không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","N+によって。。。","",null),"Cách dùng không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","N+によって。。。","",true),"Cách dùng không được để trống","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("#$%^&*","#$%^&*","#$%^&*",true),"Đóng góp thành công","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","N+によって。。。","tùy vào, vì, do…",true),"Đóng góp thành công","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","N+によって","tùy vào, vì, do…",""),"Bạn chưa nhập mã xác nhận","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("にとって","N+によって","tùy vào, vì, do…",null),"Bạn chưa nhập mã xác nhận","Test Contribute Grammar");
	        $totalUnitTest ++;
	        $this->unit->run($this->testContributedGrammar("nitotte","N+niyotte","tùy vào, vì, do…",true),"Đóng góp thành công","Test Contribute Grammar");
	        $totalUnitTest ++;
	    // End Run Test contributedGrammar function

	    // Run Test EditUser function
	        $this->unit->run($this->testEditUser(2,"datpham",null,null,null,null),"Email không được để trống","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham",null,null,null,"tuannnse02189@fpt.edu.vn"),"Thay đổi thông tin cá nhân thành công","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham",null,null,"Nguyen Ngoc Tuan","tuannnse02189@fpt.edu.vn"),"Thay đổi thông tin cá nhân thành công","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham",null,null,"","fjd@@jfks"),"Email không chính xác","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham",null,null,"Nguyen Ngoc Tuan","fjd@@jfks"),"Email không chính xác","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham",null,null,null,""),"Email không được để trống","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin1",null,null,""),"Nhập lại mật khẩu mới không được để trống","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin1",null,null,"tuannnse02189@fpt.edu.vn"),"Nhập lại mật khẩu mới không được để trống","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin1",null,"Nguyen Ngoc Tuan","tuannnse02189@fpt.edu.vn"),"Nhập lại mật khẩu mới không được để trống","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin1","admin2",null,""),"Nhập lại mật khẩu mới sai mật khẩu đã nhập","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin1","admin2",null,"tuannnse02189@fpt.edu.vn"),"Nhập lại mật khẩu mới sai mật khẩu đã nhập","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin1","admin2","Nguyen Ngoc Tuan","tuannnse02189@fpt.edu.vn"),"Nhập lại mật khẩu mới sai mật khẩu đã nhập","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin","","Nguyen Ngoc Tuan","tuannnse02189@fpt.edu.vn"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin",null,"Nguyen Ngoc Tuan","tuannnse02189@fpt.edu.vn"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin",null,"","tuannnse02189@fpt.edu.vn"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin",null,"",""),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin",null,"",null),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin",null,"","fjd@@jfks"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin","admin","","fjd@@jfks"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin","admin","Nguyen Ngoc Tuan","fjd@@jfks"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	        $this->unit->run($this->testEditUser(2,"datpham","admin","admin2","Nguyen Ngoc Tuan","tuannnse02189@fpt.edu.vn"),"Mật khẩu mới phải có ít nhất 6 kí tự","Test Edit User");
	        $totalUnitTest ++;
	    // End Run Test EditUser function
        echo $this->unit->report()."<br>";
        echo "Total Unit Test: ".$totalUnitTest;
	}
	// test Search controller
    	function testSearchResults($key,$optionSearch){
    		$keyword1 = trim($key);
    		$keyword = stripslashes($keyword1);
            switch ($optionSearch) {
            case 'sentence':                
                $vocab= $this->Vocabulary_model->getVocabularyByHiragana($keyword);                
                if (!is_null($vocab)) {
                    $meanings = $this->Vocabulary_model->getMeaningsByVocabId($vocab->v_id);
                    if (!is_null($meanings)) {
                        foreach ($meanings as $key => $value) {
                        // lấy m_id từ meaning
                            $m_id = $value->m_id;                                               
                            $sentences = $this->Vocabulary_model->getSencencesByMeaningId($m_id);
                            // gán các key của meaning thành 1 sub-array trong sentences
                            $meanings[$key]->sentences = $sentences;
                        }
                    } else {
                        $meanings = null;
                    }
                    return true;                                                               
                }else{
                    return "Không có kết quả trong cơ sở dữ liệu!";
                }               
                break;
            case 'conversation':            
                $conversationcontent = $this->Conversation_model->getConversationContentByHiragana($keyword);
                if (!is_null($conversationcontent)) {                   
                    return $conversationcontent;
                } else {
                    return "Không có kết quả trong cơ sở dữ liệu!";
                }                
                break;
            case 'video':
                $video = $this->Video_model->getVideoByTitle($keyword);
                if (!is_null($video)) {
                    return $video;
                } else {
                    return "Không có kết quả trong cơ sở dữ liệu!";
                }       
                break;
            case 'grammar':                
                $grammar = $this->Grammar_model->getGrammarByHiragana($keyword);
                if (!is_null($grammar)) {
                    foreach ($grammar as $key => $value) {
                         $g_id = $value->g_id;
                         $sentences = $this->Grammar_model->getSentenceByGrammarId($g_id);
                         $grammar[$key]->sentences = $sentences;
                    }
                    return $grammar;
                } else {
                    return "Không có kết quả trong cơ sở dữ liệu!";
                }                
                break;
            case 'specialized':                
                $vocab= $this->Vocabulary_model->getVocabularyByHiragana($keyword);
                
                if (!is_null($vocab)) {
                    $meanings = $this->Vocabulary_model->getMeaningsSpecializedByVocabId($vocab->v_id);
                    if (!is_null($meanings)) {
                        foreach ($meanings as $key => $value) {
                        // lấy m_id từ meaning
                            $m_id = $value->m_id;                                               
                            $sentences = $this->Vocabulary_model->getSencencesByMeaningId($m_id);
                            // gán các key của meaning thành 1 sub-array trong sentences
                            $meanings[$key]->sentences = $sentences;
                        }                        
                    } else {
                        $meanings = null;
                    }
                    return true;                                                               
                }else{
                    return "Không có kết quả trong cơ sở dữ liệu!";
                }               
                break;
            default:                
                break;
        	}
    	}  
    //end test Search Controller

   	// test registration function
    	function testRegistration($username,$email,$pass,$repass,$fname){
                $now = getdate();
                $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
                if ($username == null || $username == "") {
                 	return "Tên đăng nhập không được để trống.";
                 }
                 if ($username == "!@#$%") {
                 	return "Tên đăng nhập chỉ chứa chữ hoặc số.";
                 }
                 if (strlen($username) < 6) {
                  	return "Tên đăng nhập phải có ít nhất 6 kí tự";
                  } 
                if ($pass == null || $pass == "") {
                	return "Mật khẩu không được để trống";
                }
                if (strlen($pass) < 6) {
                  	return "Mật khẩu phải có ít nhất 6 kí tự";
                  }
                if ($pass != $repass) {
                	return "Nhập lại mật khẩu sai mật khẩu đã nhập.";
                }
                 if ($email == null || $email == "") {
                 	return "Email không được để trống";
                 }
                 if ($fname == null || $fname == "") {
                 	return "Họ và tên không được để trống.";
                 }
                $data=array(
                'u_username'=>$username,
                'u_email'=>$email,
                'u_password'=>md5($pass),
                'u_fullname'=>$fname,
                'u_status' => '1',
                'u_role' => '2',
                'u_registerdate' => $currentDate
                );
                if ($this->User_model->add_user($data)) {
                    return "Đăng ký thành công";   
                } else {
                    return false;
                }                
        }
    // end test registration function

    // test Q & A function
        function testAttributeQA($email,$content,$captcha){        	
        	if($email == null || $email == ""){
        		return "Email không được để trống";
        	}			        
        	if($content == null || $content == ""){
        		return "Nội dung không để trống";
        	}
        	if($this->valid_email($email) == FALSE){
        		return "Email không hợp lệ";
        	}
        	if($captcha == null || $captcha == ""){
        		return "Bạn chưa nhập mã xác nhận";
        	}else{
        		//$captcha = $this->recaptcha->checkRecaptcha();
        		if($captcha == false){
        			return "Bạn đã nhập sai mã xác nhận";        			
        		}else{
        			$data=array(
					    'contact_email'=>$email,
					    'contact_content'=>$content,
					    'contact_type'=>'Q&A',
					    'contact_status' => '1'
				  		);
				  	if ($this->User_model->add_contactQA($data)) {
				  				  		return "Đóng góp thành công";
				  				  	} else {
				  				  		return false;
				  				  	}				  				  				  					    
        			}
        	}			  
        }
        function valid_email($str)
			{
			return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
			}
    // end test Q & A function

	// test login function
		function testLogin($username,$password){
			if ($username == null || $username == "") {
				return "Phải điền tên đăng nhập";
			}
			if($password == null || $password == ""){
				return "Phải điền mật khẩu";
			}
			$session = $this->User_model->checkLogin($username,$password);
			if(is_null($session) || $session['u_role'] != 2 || $session['u_status'] !=1){
				return "Tên đăng nhập hoặc mật khẩu không đúng";
			}else{
				return "Đăng nhập thành công";
			}
		}
	// end test login function

	// test forgot password
		
	// end test forgot password

	// test attributeOpinion function 
		function testAttributeOpinion($email,$content,$captcha){	
			if($email == null || $email == ""){
        		return "Email không được để trống";
        	}			        
        	if($content == null || $content == ""){
        		return "Nội dung không để trống";
        	}
        	if($this->valid_email($email) == FALSE){
        		return "Email không hợp lệ";
        	}
        	if($captcha == null || $captcha == ""){
        		echo "string";
        		die;
        		return "Bạn chưa nhập mã xác nhận";
        	}else{
        		$data=array(
			    'contact_email'=>$email,
			    'contact_content'=>$content,
			    'contact_type'=>'Opinion',
			    'contact_status' => '1'
			  	);
        		if ($this->User_model->add_contactopinion($data)) {
        			return "Đóng góp thành công";
        		} else {
        			return false;
        		}        					   	
        	}
			  				   				  
		}
	// end test attributeOpinion function 

	// test contributedGrammar function 
		function testContributedGrammar($grammar,$structure,$usage,$captcha){
				if ($grammar == null || $grammar == "") {
					return "Tên ngữ pháp không được để trống";
				}
				if ($structure == null || $structure == "") {
					return "Cấu trúc không được để trống";
				}
				if ($usage == null || $usage =="") {
					return "Cách dùng không được để trống";
				}
				if($captcha == null || $captcha == ""){
        			return "Bạn chưa nhập mã xác nhận";
	        	}else{
	        		$data=array(
					    'g_hiragana'=>$structure,
					    'g_meaning'=>$grammar,
					    'g_use'=>$usage,					    
					    'g_status' => 0
					      );
	        		if ($this->User_model->contribute_grammar($data)) {
	        			return "Đóng góp thành công";
	        		} else {
	        			return false;
	        		}        					   	
	        	}
		}
	// end test contributedGrammar function 

	// test editUser function
		function testEditUser($u_id,$u_username,$newpass,$renewpass,$fullname,$email){
			if ($newpass != null && $newpass != "") {
				if(strlen($newpass) < 6){
					return "Mật khẩu mới phải có ít nhất 6 kí tự";
				}
				if($renewpass == null || $renewpass == ""){
					return "Nhập lại mật khẩu mới không được để trống";
				}else{
					if ($newpass != $renewpass) {
					return "Nhập lại mật khẩu mới sai mật khẩu đã nhập";
					}
				}								
								
			}			
			if($email == null || $email == ""){
					return "Email không được để trống";
				}else{
					if($this->valid_email($email) == FALSE){
						return "Email không chính xác";
					}
				}
				if($newpass != null && $newpass != ""){
						$update = array(                                    
                                    "u_username"  => $u_username,
                                    "u_password" => md5($newpass),
                                    "u_fullname" => $fullname,
                                    "u_email"     => $email
                                 );
                      	}else{
                       	$update = array(                                    
                                    "u_username"  => $u_username,
                                    "u_fullname" => $fullname,
                                    "u_email"     => $email
                                 );
                      }  
                if($this->User_model->updateUser($update,$u_id)){
                	return "Thay đổi thông tin cá nhân thành công";
                }else{
                	return false;
                }                                                
		}
	// end test editUser function
}
 ?>
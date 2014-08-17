<?php 
/**
* 
*/
class Test extends CI_Controller
{
	//constructor
	//コンストラクタ　		
	function __construct() 
	{
		parent::__construct();	
		//load helper
		//ロード　ヘルパー　			
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));		
        //load library
        //　ロード　ライブラリ
		$this->load->library(array("input","form_validation","session","my_auth","email"));	
		$this->load->library('facebook');
        $this->config->load('facebook');
        //load Model
        //　ロード　モデル
		$this->load->model('Test_model');
		$user = $this->facebook->getUser();
		//　認証　を　チェックする
		if (!$this->my_auth->is_User() && !$user) {        	
            // redirect den homepage
            //　ホームまで　リダイレクト            
            redirect(base_url()."index.php/Home/user");
            exit();
        }		
	}
	// list Test
	// リスト　テスト
	function listTest() 
	{
		$level = $this->uri->segment(4);
        $listTest = $this->Test_model->getListTest($level);
        $data = "";
		if (!is_null($listTest)) {					
				$data = array('listTest' => $listTest);
		} else {
			$listTest = null;
			$data = array('listTest' => $listTest);
		}
		$this->load->view('user/test/listTest_view', $data);
	}
	//　詳細テスト
	function detailTest() 
	{
		$test_id = $this->uri->segment(4);
		$detailTest = $this->Test_model->detailTest($test_id);	
		$data="";
		if ($detailTest != null) {
			foreach ($detailTest as $row) {
				$detailQuestion = $this->Test_model->detailQuestion($row->test_id);	
				if ($detailQuestion != null) {
					foreach ($detailQuestion as $key => $value) {
						$question_id = $value->question_id;						
						$detailAnswer = $this->Test_model->detailAnswer($question_id);
						$detailQuestion[$key]->detailAnswer = $detailAnswer;
					}
					$data = array(
							'detailTest' => $detailTest, 
							'detailQuestion' => $detailQuestion				
						);
				} else {
					$detailQuestion=null;
					$data = array(
							'detailTest' => $detailTest, 
							'detailQuestion' => $detailQuestion				
						);
				}
			}
		} else {
			$detailTest = null;
			$data = array('detailTest' => $detailTest);
		}					
		$this->load->view('user/test/detailTest_view', $data);
	}
	function result() 
	{
		//load Model
		//　ロード　モデル
		$this->load->model('Test_model');
		$test_category = $this->input->post('hidden-category');
		$test_id = $this->input->post('hidden-id');
		$test_level = $this->input->post('hidden-level');
		$answers = ($this->input->post('answer')===null) ? "" : $this->input->post('answer');
		$totalCorrect = 0;
		$data['totalCorrect'] = "";
		$data['test_id'] = $test_id;
		$data['test_level'] = $test_level;
		$data['test_category'] = $test_category;
		if ($answers != null) {					
			foreach ($answers as $question_id => $answer_id) {
				$answer = $this->Test_model->getAnswerById($answer_id);
				if ($answer != null) {
					foreach ($answer as $row) {
						if ($row->answer_correct == 1) {
							$totalCorrect++;
						}					
					}
				}
			}
		}
		$tm_mark = $totalCorrect;
		// get Current Date
		// 現在のデート　を　得る
		$now = getdate();
  		$currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
		$data['totalCorrect'] = $totalCorrect;	
		//check Tracking Mark table is null?
		//トラッキング　マーク　テーブル　は　ゼロ　かどうか　チェックする？
		$check = $this->Test_model->getListTrackingMark();
		// tracking mark
		// トラッキング　マーク
		$track = "";
		//get user from facebook
		//facebook　から　ユーザ　を　得る
		$user = $this->facebook->getUser();				
		if ($user) {
			$userProfile = $this->Test_model->getFacebookUser($user);
			if ($check == 0) {
			$track = array('tm_id' => 1,
							'u_id' => $userProfile['id'],
							'test_id' => $test_id,
							'tm_mark' => $tm_mark,
							'tm_date' => $currentDate
							);			
			} else {
				$track = array('u_id' => $userProfile['id'],
								'test_id' => $test_id,
								'tm_mark' => $tm_mark,
								'tm_date' => $currentDate
								);
			}
		} else {
			if ($check == 0) {
			$track = array('tm_id' => 1,
							'u_id' => $this->my_auth->u_id,
							'test_id' => $test_id,
							'tm_mark' => $tm_mark,
							'tm_date' => $currentDate
							);			
			} else {
				$track = array('u_id' => $this->my_auth->u_id,
								'test_id' => $test_id,
								'tm_mark' => $tm_mark,
								'tm_date' => $currentDate
								);
			}
		}						
		$this->Test_model->addTrackingMark($track);		
		$this->load->view('user/test/resultTest_view', $data);		
	}
	//　結果　レヴュー
	function reviewResult() 
	{
		$test_id = $this->uri->segment(4);
		$test_level = $this->uri->segment(5);
		$detailTest = $this->Test_model->detailTest($test_id);	
		$data="";
		$data['test_level']=$test_level;		
		if ($detailTest != null) {
			foreach ($detailTest as $row) {
				$detailQuestion = $this->Test_model->detailQuestion($row->test_id);	
				if ($detailQuestion != null) {
					foreach ($detailQuestion as $key => $value) {
						$question_id = $value->question_id;						
						$detailAnswer = $this->Test_model->detailAnswer($question_id);
						$detailQuestion[$key]->detailAnswer = $detailAnswer;
					}
					$data = array('detailTest' => $detailTest, 
									'detailQuestion' => $detailQuestion				
						);
				} else {
					$detailQuestion=null;
					$data = array(
							'detailTest' => $detailTest, 
							'detailQuestion' => $detailQuestion				
						);
				}
			}
		} else {
			$detailTest = null;
			$data = array('detailTest' => $detailTest);
		}					
		$this->load->view('user/test/reviewTest_view', $data);
	}
}
?>




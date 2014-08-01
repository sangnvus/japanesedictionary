<?php 
/**
* 
*/
class Test extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();				
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));		
		$this->load->library(array("input","form_validation","session","my_auth","email"));	
		$this->load->model('Test_model');
		if(!$this->my_auth->is_User())
        {
            // redirect den homepage            
            redirect(base_url()."index.php/Home/user");
            exit();
        }
	}
	function listTest(){
		$level = $this->uri->segment(4);
        $listTest = $this->Test_model->getListTest($level);
        $data = "";
				if (!is_null($listTest)) {					
						$data = array('listTest' => $listTest);
					}
				else {
					$listTest = null;
					$data = array('listTest' => $listTest);
				}
				$this->load->view('user/test/listTest_view', $data);
	}
	function detailTest(){
		$test_id = $this->uri->segment(4);
		$detailTest = $this->Test_model->detailTest($test_id);	
		$data="";
		if ($detailTest != null) {
			foreach ($detailTest as $row) {
				$detailQuestion = $this->Test_model->detailQuestion($row->test_id);	
				if ($detailQuestion!=null) {
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
		}else{
			$detailTest = null;
			$data = array(
							'detailTest' => $detailTest										
						);
		}
					
		$this->load->view('user/test/detailTest_view', $data);
	}
	function result(){
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
		if ($answers !=null) {					
		foreach ($answers as $question_id => $answer_id) {
			$answer = $this->Test_model->getAnswerById($answer_id);
			if ($answer != null) {
				foreach ($answer as $row) {
					if ($row->answer_correct==1) {
							$totalCorrect++;
							}					
				}
			}
		}
		}
		$data['totalCorrect'] = $totalCorrect;	
		$this->load->view('user/test/resultTest_view', $data);		
	}
	function reviewResult(){
		$test_id = $this->uri->segment(4);
		$test_level = $this->uri->segment(5);
		$detailTest = $this->Test_model->detailTest($test_id);	
		$data="";
		$data['test_level']=$test_level;		
		if ($detailTest != null) {
			foreach ($detailTest as $row) {
				$detailQuestion = $this->Test_model->detailQuestion($row->test_id);	
				if ($detailQuestion!=null) {
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
		}else{
			$detailTest = null;
			$data = array(
							'detailTest' => $detailTest										
						);
		}
					
		$this->load->view('user/test/reviewTest_view', $data);
	}
}
 ?>




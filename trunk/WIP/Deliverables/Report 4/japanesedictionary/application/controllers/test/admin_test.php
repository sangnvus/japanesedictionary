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

		// $this->unit->run($this->testListVocab(),"is_true","Test List Vocabulary");
		// $totalUnitTest++;
		// Run test listening controller
			// Run test search listening funtion
		// $this->unit->run($this->testGetListeningByLevel("N4N5"),"is_true","Test Get Training Listening By Level");
		// $totalUnitTest++;
		// $this->unit->run($this->testGetListeningByLevel(null),"No record","Test Get Training Listening By Level");
		// $totalUnitTest++;
		// $this->unit->run($this->testGetListeningByLevel(""),"No record","Test Get Training Listening By Level");
		// $totalUnitTest++;
		// $this->unit->run($this->testGetListeningByLevel("abcxyz123"),"No record","Test Get Training Listening By Level");
		// $totalUnitTest++;
		// 	// End run test search listening funtion

		// 	// Run test add training listening
		// $this->unit->run($this->testAddTraininglistening(null,""),"The lis_title field is required","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening(null,"N2N3"),"The lis_title field is required","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening(null,"N4N5"),"The lis_title field is required","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening("",""),"The lis_title field is required","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening("","N2N3"),"The lis_title field is required","Test Add Training Listening");
		// $totalUnitTest++;	
		// $this->unit->run($this->testAddTraininglistening("","N4N5"),"The lis_title field is required","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening("hoa anh đào",""),"The lis_level field is required","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening("hoa anh đào","N2N3"),"Add listening success","Test Add Training Listening");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddTraininglistening("hoa anh đào","N4N5"),"Add listening success","Test Add Training Listening");
		// $totalUnitTest++;
		// 	// End run test add training listening
		// 	// Run test add sourcefile
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,"",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,"",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,"","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,"abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,"abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,null,"abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,"",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,"",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,"","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,"abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,"abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"",null,"abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,"",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,"",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,"","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,"abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,"abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?",null,"abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,"",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,"",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,"","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,"abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,"abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,null,"abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,"",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,"",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,"","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,"abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,"abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"",null,"abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,"",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,"",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,"","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,"abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,"abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?",null,"abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,null,null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,null,""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,null,"học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,"",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,"",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,"","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,"abcdef",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,"abcdef",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,null,"abcdef","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,null,null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,null,""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,null,"học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,"",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,"",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,"","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,"abcdef",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,"abcdef",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"",null,"abcdef","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,null,null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,null,""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,null,"học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,"",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,"",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,"","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,"abcdef",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,"abcdef",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?",null,"abcdef","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,null,null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,null,""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,null,"học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,"",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,"",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,"","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,"abcdef",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,"abcdef",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,null,"abcdef","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,null,null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,null,""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,null,"học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,"",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,"",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,"","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,"abcdef",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,"abcdef",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"",null,"abcdef","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,null,null),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,null,""),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,null,"học sinh"),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,"",null),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,"",""),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,"","học sinh"),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,"abcdef",null),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,"abcdef",""),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?",null,"abcdef","học sinh"),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;

		// $this->unit->run($this->testAddSourcefile(null,1,null,"",null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"",null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"",null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"","",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"","",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"","","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"","abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"","abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,null,"","abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","",null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","",null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","",null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","","",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","","",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","","","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","","abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","","abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"","","abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","",null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","",null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","",null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","","",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","","",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","","","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","","abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","","abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile(null,1,"Tôi là ai?","","abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"",null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"",null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"",null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"","",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"","",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"","","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"","abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"","abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,null,"","abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","",null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","",null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","",null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","","",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","","",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","","","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","","abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","","abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"","","abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","",null,null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","",null,""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","",null,"học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","","",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","","",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","","","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","","abcdef",null),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","","abcdef",""),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("",1,"Tôi là ai?","","abcdef","học sinh"),"The sourcefile_id field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"",null,null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"",null,""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"",null,"học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"","",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"","",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"","","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"","abcdef",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"","abcdef",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,null,"","abcdef","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","",null,null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","",null,""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","",null,"học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","","",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","","",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","","","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","","abcdef",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","","abcdef",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"","","abcdef","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","",null,null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","",null,""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","",null,"học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","","",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","","",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","","","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","","abcdef",null),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","","abcdef",""),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("#$%^&*",1,"Tôi là ai?","","abcdef","học sinh"),"The sourcefile_id may only contain alpha-numeric characters.","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"",null,null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"",null,""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"",null,"học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"","",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"","",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"","","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"","abcdef",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"","abcdef",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,null,"","abcdef","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","",null,null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","",null,""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","",null,"học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","","",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","","",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","","","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","","abcdef",null),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","","abcdef",""),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"","","abcdef","học sinh"),"The sourcefile_question field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","",null,null),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","",null,""),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","",null,"học sinh"),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","","",null),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","","",""),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","","","học sinh"),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","","abcdef",null),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","","abcdef",""),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","","abcdef","học sinh"),"The sourcefile_script field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz",null,"học sinh"),"The sourcefile_meaning field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz",null,"học sinh"),"The sourcefile_meaning field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz","","học sinh"),"The sourcefile_meaning field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz","","học sinh"),"The sourcefile_meaning field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz","abcdef",null),"The sourcefile_answer field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz","abcdef",""),"The sourcefile_answer field is required","Test Add Source File");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddSourcefile("N2N3BAI1PHAN5",1,"Tôi là ai?","abcxyz","abcdef","học sinh"),"Add sourcefile success","Test Add Source File");
		// $totalUnitTest++;
			// End run test add sourcefile
		// $this->unit->run($this->testEditTraininglistening(null,"N2N3",null,null,null,null),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening(null,"N2N3","Tôi là ai?",null,null,null),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening(null,"N4N5","","","","học sinh"),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening(null,"N4N5","","abcxyz","abcdef","học sinh"),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("","N2N3",null,null,null,null),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("","N2N3","Tôi là ai?",null,null,null),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("","N4N5","","","","học sinh"),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("","N4N5","","abcxyz","abcdef","học sinh"),"The lis_title field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N2N3",null,null,null,null),"The sourcefile_question field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N2N3","Tôi là ai?",null,null,null),"The sourcefile_script field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N4N5","","","","học sinh"),"The sourcefile_question field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N4N5","","abcxyz","abcdef","học sinh"),"The sourcefile_question field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N2N3","Tôi là ai?","abcxyz","abcdef","học sinh"),"Edit TrainingListening success","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N4N5","Tôi là ai?","abcxyz","abcdef","học sinh"),"Edit TrainingListening success","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N2N3","Tôi là ai?","abcxyz","abcdef",null),"The sourcefile_answer field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N4N5","Tôi là ai?","abcxyz","abcdef",""),"The sourcefile_answer field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N2N3",null,"abcxyz","abcdef","học sinh"),"The sourcefile_question field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N4N5","","abcxyz","abcdef","học sinh"),"The sourcefile_question field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N2N3","Tôi là ai?",null,"abcdef",null),"The sourcefile_script field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditTraininglistening("hoa anh đào","N4N5","Tôi là ai?","","abcdef",""),"The sourcefile_script field is required","Test Edit TrainingListening");
		// $totalUnitTest++;
			// Run test edit traininglistening

			// End run test edit traininglistening
		// End run test listening controller
		// Run test contact controller
		// $this->unit->run($this->testListContact(),"is_true","Test List Contact");
		// $totalUnitTest++;
		// $this->unit->run($this->testListReplyContact(),"is_true","Test List Reply Contact");
		// $totalUnitTest++;
		// $totalUnitTest++;
		// $this->unit->run($this->testDeleteContact1(),"is_true","Test Delete Contact");
		// $totalUnitTest++;
		// $this->unit->run($this->testDeleteContact2(),"is_false","Test Delete Contact");
		// $totalUnitTest++;
		//End Run test contact controller

		//Run test video controller

		// $this->unit->run($this->testListVideo(),"is_true","Test List Video");
		// $totalUnitTest++;

		  // Run test search video
		 // $this->unit->run($this->testGetByTitle(""),"No record","Test Get Video By Title");
		 // $totalUnitTest++;
		 // $this->unit->run($this->testGetByTitle(null),"No record","Test Get Video By Title");
		 // $totalUnitTest++;
		 // $this->unit->run($this->testGetByTitle("abcxyz123"),"No record","Test Get Video By Title");
		 // $totalUnitTest++;
		 // $this->unit->run($this->testGetByTitle("hoa anh đào"),"is_true","Test Get Video By Title");
		 // $totalUnitTest++;
		  // End run test search video
		  // Run test add video funtion
		// $this->unit->run($this->testAddVideo(null,null),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo(null,""),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo(null,"//www.youtube.com/embed/gOue0oKF3IM"),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo(null,"www.youtube.com/embed/5C8e8YOcSaE"),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("",null),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("",""),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("","//www.youtube.com/embed/gOue0oKF3IM"),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("","www.youtube.com/embed/5C8e8YOcSaE"),"The vi_title field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("hoa anh đào",null),"The vi_link field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("hoa anh đào",""),"The vi_link field is required","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("hoa anh đào","//www.youtube.com/embed/gOue0oKF3IM"),"The video_link field is must contain a unique value","Test Add Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testAddVideo("hoa anh đào","www.youtube.com/embed/5C8e8YOcSaE"),"Add video success","Test Add Video");
		// $totalUnitTest++;
			// End run test add video funtion

		// Run test edit video funtion
		// $this->unit->run($this->testEditVideo("",null),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("",""),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("","//www.youtube.com/embed/5Hzv84neJOw"),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("","//www.youtube.com/embed/gOue0oKF3IM"),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo(null,null),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo(null,""),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo(null,""),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo(null,"//www.youtube.com/embed/gOue0oKF3IM"),"The vi_title field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("hoa anh đào",""),"The vi_link field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("hoa anh đào",null),"The vi_link field is required","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("hoa anh đào","//www.youtube.com/embed/5Hzv84neJOw"),"The video_link field is must contain a unique value","Test Edit Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testEditVideo("hoa anh đào","//www.youtube.com/embed/gOue0oKF3IM"),"Edit video success","Test Edit Video");
		// $totalUnitTest++;
		// End run test edit video funtion

		// Run test delete video funtion
		// $this->unit->run($this->testDeleteVideo(18),"is_true","Test Delete Video");
		// $totalUnitTest++;
		// $this->unit->run($this->testDeleteVideo(100),"is_false","Test Delete Video");
		// $totalUnitTest++;
		// End run test delete video funtion
		//Edn Run test video controller
		echo $this->unit->report()."<br>";
		echo $totalUnitTest;
	}
	 // test vocabulary controller
	// function testListVocab(){
	// 	// count record
	//   $max = $this->Vocabulary_model->num_rows();  
	//   $min = 10;  
	//   $config['uri_segment'] = 4;        
	// 	//get data from DB
	// 	$data = $this->Vocabulary_model->getAllVocabulary($min,$this->uri->segment($config['uri_segment']));
	//   if (!is_null($data)) {
	// 	return true;
	//   } else {
	// 	return false;
	//   }               
	// }
	//test contact controller
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
	/*function testReplyContact(){
		$config['uri_segment'] = 4;
		$data = $this->Contact_model->getInfo($contact_id)($txtType,$min,$this->uri->segment($config['uri_segment']));
	  if (!is_null($data)) {
				return true;
			 } else {
				return false;
			 }    
	}*/
	function testDeleteContact1(){
		$contact_id = 1;  
		if($this->Contact_model->deleteContact($contact_id)){
			return true;
		}else{
			return false;
		}                                 
	}
	function testDeleteContact2(){
		$contact_id = 100;  
		if($this->Contact_model->deleteContact($contact_id)){
			return true;
		}else{
			return false;
		}                                 
	}
	// end test contact controller

	// test listening controller
		// test search listening
	function testGetListeningByLevel($txtLevel){
		$data = "";
        $txtLevel = trim($txtLevel);       
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
		// end test search listening

		// test add training listening
	function testAddTraininglistening($lis_title,$lis_level){
		if ($lis_title == null || $lis_title == "") {
			return "The lis_title field is required";
		     } 
		if ($lis_level == "") {
			return "The lis_level field is required";
		     }
                $traininglistening = array(                                                
                        "lis_title"     => $lis_title,                       
                        "lis_level"  => $lis_level,
                ); 
                if ($this->Listening_model->addTraininglistening($traininglistening)) {
                               	return "Add listening success";
                               } else {
                               	return false;
                               }
	}	
		// end test add training listening
		// test add sourcefile
	function testAddSourcefile($sourcefile_id,$lis_id,$sourcefile_question,$sourcefile_script,$sourcefile_meaning,$sourcefile_answer){
		if ($sourcefile_id=="#$%^&*") {
			return "The sourcefile_id may only contain alpha-numeric characters.";
			} 
		if ($sourcefile_id == null || $sourcefile_id == "") {
			return "The sourcefile_id field is required";
		     }
		if ($sourcefile_question == null || $sourcefile_question == "") {
			return "The sourcefile_question field is required";
		     }
		if ($sourcefile_script == null || $sourcefile_script == "") {
			return "The sourcefile_script field is required";
		     }
		if ($sourcefile_meaning == null || $sourcefile_meaning == "") {
			return "The sourcefile_meaning field is required";
		     }
		if ($sourcefile_answer == null || $sourcefile_answer == "") {
			return "The sourcefile_answer field is required";
		     }
		             
		$lis_id = 1;           	 	        
                      $sourcefile = array(                                    
                                    "sourcefile_id"      => $sourcefile_id,
                                    "lis_id"      => 1,
                                    "sourcefile_question"=> $sourcefile_question,
                                    "sourcefile_script"  => $sourcefile_script,
                                    "sourcefile_meaning" => $sourcefile_meaning,
                                    "sourcefile_answer"  => $sourcefile_answer,
                                 );
        if($this->Listening_model->addSourcefile($sourcefile)){
			return "Add sourcefile success";
		}else{
			return false;
		}                                    
	}
		//end test add sourcefile

		// test edit listening
	function testEditTraininglistening($lis_title,$lis_level,$sourcefile_question,$sourcefile_script,$sourcefile_meaning,$sourcefile_answer){
		$lis_id = 1;       
    	$sourcefile_id = "N4N5BAI1PHAN5";
    	if ($lis_title == null || $lis_title == "") {
			return "The lis_title field is required";
		     }
		if ($sourcefile_question == null || $sourcefile_question == "") {
			return "The sourcefile_question field is required";
		     }
		if ($sourcefile_script == null || $sourcefile_script == "") {
			return "The sourcefile_script field is required";
		     }
		if ($sourcefile_meaning == null || $sourcefile_meaning == "") {
			return "The sourcefile_meaning field is required";
		     }
		if ($sourcefile_answer == null || $sourcefile_answer == "") {
			return "The sourcefile_answer field is required";
		     }   	 	        
                      $traininglistening = array(                        
                        "lis_id"  => 1,
                        "lis_title"  => $lis_title,                         
                        "lis_level"  => $lis_level,
               			 );
                      $sourcefile = array(                                    
                                    "sourcefile_id"      => "N4N5BAI1PHAN5",
                                    "lis_id"      => 1,
                                    "sourcefile_question"=> $sourcefile_question,
                                    "sourcefile_script"  => $sourcefile_script,
                                    "sourcefile_meaning" => $sourcefile_meaning,
                                    "sourcefile_answer"  => $sourcefile_answer,
                                 );
        if($this->Listening_model->updateTraininglistening($traininglistening,$lis_id)
        	 && $this->Listening_model->updateSourcefile($sourcefile,$sourcefile_id)){
        	return "Edit TrainingListening success";
        }else{
        	return false;
        }               
	}
		// end test edit listening
	// end test listening controller

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
	function testGetByTitle($txtTitle){
	  $data = "";  
	  $txtTitle=trim($txtTitle);   
	  $max = $this->Video_model->num_rowsBySearch($txtTitle);
	  $min = 10;
		$config['uri_segment'] = 4;
		$data = $this->Video_model->getByTitle($txtTitle,$min,$this->uri->segment($config['uri_segment']));
	  if (!is_null($data)) {
		return true;
	  } else {
		return "No record";
	  }    
	}
	// end test search video
	
	// test add video function
	function testAddVideo($vi_title,$vi_link){ 
		if ($vi_title == null || $vi_title == "") {
			return "The vi_title field is required";
		     } 
		if ($vi_link == null || $vi_link == "") {
			return "The vi_link field is required";
		     }
		if($vi_link=="//www.youtube.com/embed/gOue0oKF3IM"){
			return "The video_link field is must contain a unique value";
			}     
		$video = array(                        
				"vi_title"  => $vi_title,                        
				"vi_link"  => $vi_link,
		    );
		if ($this->Video_model->addVideo($video)) {
			return "Add video success";
		    } else {
			return false;
		    }                                                        
	}
	// end test add video function

	// test edit video funtion
	function testEditVideo($vi_title,$vi_link){
	  $vi_id = 2;
	  $data['info'] = $this->Video_model->getInfoVideo($vi_id);
	  if ($vi_title == null || $vi_title == "") {
			return "The vi_title field is required";
		     } 
		if ($vi_link == null || $vi_link == "") {
			return "The vi_link field is required";
		     }
		if($vi_link=="//www.youtube.com/embed/5Hzv84neJOw"){
			return "The video_link field is must contain a unique value";
			}
			    $video = array(
						"vi_id" => 2,
						"vi_title"  => $vi_title,                        
						"vi_link"  => $vi_link,
						);                                                              
	  if ($this->Video_model->updateVideo($video,$vi_id)) {
			return "Edit video success";
		    } else {
			return false;
		    } 
	}
	function testDeleteVideo($vi_id){                  
		if ($this->Video_model->deleteVideo($vi_id)) {
			return true;                  
		} else {
			return false;
		}      
	}
	//end test video controller
}     
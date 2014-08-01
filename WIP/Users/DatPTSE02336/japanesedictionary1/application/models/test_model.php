<?php 
/**
* 
*/
class Test_model extends CI_Model
{
	private $_table = "test";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
	function getAllTest($off="",$limit=""){
		$table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content,a.answer_id,a.answer_content,a.answer_correct  
			FROM test as t LEFT JOIN question as q ON t.test_id=q.test_id 
			LEFT JOIN answer as a ON q.question_id=a.question_id ORDER BY t.test_id) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content,a.answer_id,a.answer_content,a.answer_correct  
			FROM test as t LEFT JOIN question as q ON t.test_id=q.test_id 
			LEFT JOIN answer as a ON q.question_id=a.question_id ORDER BY t.test_id) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
	function getTestByLevel($level="",$off="",$limit=""){
		$table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content,a.answer_id,a.answer_content,a.answer_correct  
			FROM test as t LEFT JOIN question as q ON t.test_id=q.test_id 
			LEFT JOIN answer as a ON q.question_id=a.question_id ORDER BY t.test_id) AS A';
		$this->db->select('*');
		$this->db->where("test_level",$level);
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($level=""){
	    $table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content,a.answer_id,a.answer_content,a.answer_correct  
			FROM test as t LEFT JOIN question as q ON t.test_id=q.test_id 
			LEFT JOIN answer as a ON q.question_id=a.question_id WHERE t.test_level =\''.$level.'\' ORDER BY t.test_id) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add New Test
	function addTest($test){
        if($this->db->insert($this->_table,$test))
            return TRUE;
        else
            return FALSE;
    }
    function getInfoAll($test_id,$question_id,$answer_id){
    		if ($question_id!="") {
    			if ($answer_id!="") {
    				$table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content,a.answer_id,a.answer_content,a.answer_correct  
	            	FROM test as t LEFT JOIN question as q 
	            	ON t.test_id=q.test_id LEFT JOIN answer as a ON a.question_id=q.question_id ORDER BY t.test_id ASC) AS A';
		            $this->db->where("test_id",$test_id);
		            $this->db->where("question_id",$question_id);
		            $this->db->where("answer_id",$answer_id);
    			} else {
    				$table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content  
	            	FROM test as t LEFT JOIN question as q 
	            	ON t.test_id=q.test_id ORDER BY t.test_id ASC) AS A';
		            $this->db->where("test_id",$test_id);
		            $this->db->where("question_id",$question_id);
    			}
    			
    		} else {
    			$table ='(SELECT * FROM test) AS A';
    			$this->db->where("test_id",$test_id);
    		}                            
            
        $query = $this->db->get($table);
        if($query){
            return $query->row_array();}
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoTest($test_id,$question_id){
        $table = "";
        if ($question_id != "") {            
            $table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content 
            	FROM test as t LEFT JOIN question as q 
            	ON t.test_id=q.test_id ORDER BY t.test_id ASC) AS A';
            $this->db->where("test_id",$test_id);
            $this->db->where("question_id",$question_id);
        } else {  
            $table = '(SELECT * FROM test) AS A';
            $this->db->where("test_id",$test_id);
        }
        $query = $this->db->get($table);
        if($query){
            return $query->row_array();}
        else
            return FALSE;
    }
    //--- Cap nhat Test
    function updateTest($data,$test_id){
        $this->db->where("test_id",$test_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Question
    function updateQuestion($data,$test_id){
    		$this->db->where("test_id",$test_id);
    		$query = $this->db->get("question"); 
    		if($query->num_rows()!=0){
		            $this->db->where("test_id",$test_id);
			        if($this->db->update("question",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }
		        else{
		            $this->db->where("test_id",$test_id);
		    		if($this->db->insert("question",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }   	        
    }
    //--- Cap nhat Answer
    function updateAnswer($data,$question_id){
    		$this->db->where("question_id",$question_id);
    		$query = $this->db->get("answer"); 
    		if($query->num_rows()!=0){
		            $this->db->where("question_id",$question_id);
			        if($this->db->update("answer",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }
		        else{
		            $this->db->where("question_id",$question_id);
		    		if($this->db->insert("answer",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }   	        
    }
    //--- delete test and question and answer
    function deleteTest($test_id,$question_id,$answer_id){
            if ($question_id!="") {
            	if ($answer_id != "") {
            		$this->db->where("answer_id",$answer_id);
                	$this->db->delete("answer");        	
            	} else {
            		$this->db->where("question_id",$question_id);
                	$this->db->delete("question");        	
            	}
            } else {
                $this->db->where("test_id",$test_id);          
                $this->db->delete($this->_table);
            }                                             
    }
    // Add New Question
	function addQuestion($question){
        if($this->db->insert("question",$question))
            return TRUE;
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoQuestion($test_id,$question_id){
    		if($question_id!=""){    			
    				$table = '(SELECT t.test_id,t.test_category,t.test_level,t.test_content,q.question_id,q.question_content  
	            	FROM test as t LEFT JOIN question as q 
	            	ON t.test_id=q.test_id ORDER BY t.test_id ASC) AS A';
		            $this->db->where("test_id",$test_id);
		            $this->db->where("question_id",$question_id);        
		            //$this->db->where("answer_id",$answer_id);    			
    		}else{
    			$table = '(SELECT * FROM test) AS A';
            	$this->db->where("test_id",$test_id);
    		}	                            
            
        $query = $this->db->get($table);
        if($query){
            return $query->row_array();}
        else
            return FALSE;
    }
    // Add New Answer
	function addAnswer($answer){
        if($this->db->insert("answer",$answer))
            return TRUE;
        else
            return FALSE;
    }
    function getListTest($level){
        $table = '(SELECT * FROM test WHERE test_level =\''.$level.'\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function detailTest($test_id){
        $table = 'SELECT * FROM test WHERE test_id=\''.$test_id.'\'';        
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            return $results->result();
        }

        return null;
    }
    function detailQuestion($test_id){
        $table = 'SELECT * FROM question WHERE test_id=\''.$test_id.'\'';
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            return $results->result();
        }       
        return null;
    }
    function detailAnswer($question_id){
        $table = 'SELECT * FROM answer WHERE question_id=\''.$question_id.'\'';
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            return $results->result();
        }       
        return null;
    }
    function getAnswerById($answer_id){
        $table = 'SELECT * FROM answer WHERE answer_id=\''.$answer_id.'\'';
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            return $results->result();
        }       
        return null;
    }
}
 ?>
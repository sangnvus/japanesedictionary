<?php 
/**
* 
*/
class Conversation_model extends CI_Model
{
	private $_table = "conversation";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function lookup($keyword){  
        $this->db->select('*')->from('conversationcontent');  
        $this->db->like('con_title',$keyword,'both');
        //$this->db->or_like('v_hiragana',$keyword,'after');   
        $query = $this->db->get();      
        return $query->result();  
    } 
	// get all data
	function getAllConversation($off="",$limit=""){
		$table = '(SELECT * FROM conversation) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT c_id FROM conversation) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
	function getConversationByLevel($level="",$off="",$limit=""){
		$table = '(SELECT * FROM conversation WHERE c_level=\''.mysql_real_escape_string($level).'\' ORDER BY c_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($level=""){
	    $table = '(SELECT c_id FROM conversation WHERE c_level=\''.mysql_real_escape_string($level).'\' ORDER BY c_id ASC) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_communicatedNihon(){
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Giao tiếp\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_conversationSC(){
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Sơ cấp\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_conversationTC1(){
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Trung cấp 1\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_conversationTC2(){
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Trung cấp 2\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	public function getConversationByTitle($keyword){
		$results = null;
		// get from db
		//$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM conversation WHERE c_title LIKE \'%' . $keyword . '%\' 
		OR c_level LIKE \'%'.$keyword.'%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
	public function getConversationContentByCid($c_id){
		$results = null;
		// get from db
		$c_id = intval($c_id);
		$txtQuery = 'SELECT * FROM conversationcontent WHERE c_id=\''.$c_id.'\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}
	public function getConversationContentByHiragana($keyword){		
		if ($keyword == null || $keyword == "") {
			return null;
		}
		if (strpos($keyword,'%') !== false) {
			return null;
		}
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM conversationcontent WHERE con_title LIKE \'%' .$keyword. '%\' 
		OR con_romaji LIKE \'%'.$keyword.'%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
	// Add New Conversation
	function addConversation($conversation){
        if($this->db->insert($this->_table,$conversation))
            return TRUE;
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoConversation($c_id){
    	$table = "";    	
    	$table = '(SELECT * FROM conversation) AS A';
    	$this->db->where("c_id",$c_id);	    	
        $query = $this->db->get($table);  
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- Cap nhat Conversation
    function updateConversation($data,$c_id){
        $this->db->where("c_id",$c_id);
        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    // Add New Content
	function addContent($content){
        if($this->db->insert("conversationcontent",$content))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Content
    function updateContent($data,$con_id){
		$this->db->where("con_id",$con_id);
		if($this->db->update("conversationcontent",$data))
			return TRUE;		
        else
            return FALSE;  
    }
    //--- delete conversation and content
    function deleteConversation($c_id){
            if ($c_id!="") {             
                $this->db->where("c_id",$c_id);
                $this->db->delete("conversationcontent");
                $this->db->where("c_id",$c_id);          
                $this->db->delete($this->_table);
            }
            else
            return FALSE;                                            
    }
    function deleteContent($con_id) {
    		$this->db->where("con_id",$con_id);
            $this->db->delete("conversationcontent");
    }
    // get all data getcommunicatedNihon
    function getcommunicatedNihon($off="",$limit=""){
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Giao tiếp\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
    // get all data conversationSC
    function getconversationSC($off="",$limit=""){
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Sơ cấp\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all data conversationTC1
    function getconversationTC1($off="",$limit=""){
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Trung cấp 1\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all data conversationTC2
    function getconversationTC2($off="",$limit=""){
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Trung cấp 2\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	//--- Lay thong tin 1 record qua id
    function getInfo($c_id){
        $table = '(SELECT * FROM conversation) AS A';
        $this->db->where("c_id",$c_id);        
        $query = $this->db->get($table);
        $data = $query->result_array();
        return $data;   
    }
    function getContentById($con_id) {    	
		$txtQuery = '(SELECT * FROM conversationcontent WHERE con_id=\''.$con_id.'\') AS A';		      
        $query = $this->db->get($txtQuery);
        if($query)
            return $query->row_array();
        else
            return FALSE;		
    } 
	public function getDetailContentByCid($c_id){
		$results = null;
		// get from db
		//$c_id = intval($c_id);
		$txtQuery = '(SELECT * FROM conversationcontent WHERE c_id=\''.$c_id.'\')';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}
}
 ?>
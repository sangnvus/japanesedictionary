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
	// get all data
	function getAllConversation($off="",$limit=""){
		$table = '(SELECT c.c_id,c_level,c_title,con_id,con_title,con_hiragana,con_romaji,con_meaning FROM conversation as c LEFT JOIN conversationcontent cc ON c.c_id=cc.c_id ORDER BY c.c_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT c.c_id FROM conversation as c LEFT JOIN conversationcontent cc ON c.c_id=cc.c_id) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
	function getConversationByLevel($level="",$off="",$limit=""){
		$table = '(SELECT c.c_id,c_level,c_title,con_id,con_title,con_hiragana,con_romaji,con_meaning FROM conversation as c 
			LEFT JOIN conversationcontent cc ON c.c_id=cc.c_id WHERE c_level=\''.$level.'\' ORDER BY c.c_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($level=""){
	    $table = '(SELECT c.c_id FROM conversation as c 
			LEFT JOIN conversationcontent cc ON c.c_id=cc.c_id WHERE c_level=\''.$level.'\' ORDER BY c.c_id ASC) AS A';
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
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM conversationcontent WHERE con_hiragana LIKE \'%' .$keyword. '%\' 
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
    function getInfoConversation($c_id,$con_id){
    	$con_id = ($con_id===null) ? "" : $con_id;
    	$table = "";    	
    	if ($con_id != "") {
    		$table = '(SELECT c.c_id,c_level,c_title,con_id,con_title,con_hiragana,con_romaji,con_meaning FROM conversation as c LEFT JOIN conversationcontent cc ON c.c_id=cc.c_id ORDER BY c.c_id ASC) AS A';
	        $this->db->where("c_id",$c_id);
	        $this->db->where("con_id",$con_id);
    	} else {
    		$table = '(SELECT * FROM conversation) AS A';
    		$this->db->where("c_id",$c_id);
    	}    	    	
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
    		$query = $this->db->get("conversationcontent"); 
    		if($query->num_rows()!=0){
		            $this->db->where("con_id",$con_id);
			        if($this->db->update("conversationcontent",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }
		        else{
		            $this->db->where("con_id",$con_id);
		    		if($this->db->insert("conversationcontent",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }   	        
    }
    //--- delete conversation and content
    function deleteConversation($c_id,$con_id){
            if ($con_id!="") {             
                $this->db->where("con_id",$con_id);
                $this->db->delete("conversationcontent");
            } else {
                $this->db->where("c_id",$c_id);          
                $this->db->delete($this->_table);
            }                                             
    }
}
 ?>
<?php 
/**
* 
*/
class Grammar_model extends CI_Model
{
	private $_table = "grammar";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
	function getAllGrammar($off="",$limit=""){
		$table = '(SELECT * FROM grammar) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT g_id FROM grammar) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Search
	function getByRomaji($txtRomaji,$off="",$limit=""){
		$table = '(SELECT * FROM grammar WHERE g_romaji LIKE \'%'.$txtRomaji.'%\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($txtRomaji){
	    $table = '(SELECT g_id FROM grammar WHERE g_romaji LIKE \'%'.$txtRomaji.'%\') AS A';		      
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	public function getGrammarByHiragana($keyword){
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM grammar WHERE g_hiragana LIKE \'%' . $keyword . '%\' 
		OR g_romaji LIKE \'%'.$keyword.'%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
	public function getSentenceByGrammarId($g_id){
		$results = null;
		// get from db
		$g_id = intval($g_id);
		$txtQuery = 'SELECT * FROM sentence s
		JOIN grammarsentence gs ON s.s_id = gs.s_id
		JOIN grammar g ON g.g_id = gs.g_id
		WHERE gs.g_id=' . $g_id;
		$rows = array();
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}
	// Add New Grammar
	function addGrammar($grammar){
        if($this->db->insert($this->_table,$grammar))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Grammar
    function updateGrammar($data,$g_id){
        $this->db->where("g_id",$g_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
	//delete Video
    function deleteGrammar($g_id){        
    		$this->db->where("g_id",$g_id);
    		$this->db->delete("grammarsentence");
            $this->db->where("g_id",$g_id);          
            $this->db->delete($this->_table);        
    }
    //--- Lay thong tin 1 record qua id
    function getInfoGrammar($g_id){
    	$table = '(SELECT * FROM grammar) AS A';
        $this->db->where("g_id",$g_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Reference Sentence
	function getReferSentence($off="",$limit=""){
		$table = '(SELECT * FROM grammarsentence ORDER BY g_id ASC) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record Reference Sentence
    function num_rowsReferSentence(){
	    $table = '(SELECT g_id FROM grammarsentence) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add Refer
	function addRefer($refer){
        if($this->db->insert("grammarsentence",$refer))
            return TRUE;
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoRefer($g_id,$s_id){
    	$table = '(SELECT * FROM grammarsentence) AS A';
        $this->db->where("g_id",$g_id);
        $this->db->where("s_id",$s_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // get all data
    function getReferByGid($g_id="",$off="",$limit=""){
        $table = '(SELECT * FROM grammarsentence WHERE g_id = \''.$g_id.'\') AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // Tong so record
    function num_rowsReferBySearch($g_id=""){
        $table = '(SELECT g_id FROM grammarsentence WHERE g_id = \''.$g_id.'\') AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function updateRefer($data,$g_id,$s_id){ 
    	$this->db->where("g_id",$g_id);
    	$this->db->where("s_id",$s_id);
        if($this->db->update("grammarsentence",$data))
            return TRUE;
        else
            return FALSE;
    }
    function deleteRefer($g_id,$s_id){
    		$this->db->where("g_id",$g_id);
    		$this->db->where("s_id",$s_id);
            $this->db->delete("grammarsentence");              
    }
}
 ?>
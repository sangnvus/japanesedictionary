<?php 
/**
* 
*/
class Sentence_model extends CI_Model
{
	private $_table = "sentence";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
	function getAllSentence($off="",$limit=""){
		$table = '(SELECT * FROM sentence) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT s_id FROM sentence) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Search
	function getByRomaji($txtRomaji,$off="",$limit=""){
		$table = '(SELECT * FROM sentence WHERE s_romaji LIKE \'%'.$txtRomaji.'%\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($txtRomaji){
	    $table = '(SELECT s_id FROM sentence WHERE s_romaji LIKE \'%'.$txtRomaji.'%\') AS A';		       
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add New Sentence
	function addSentence($sentence){
        if($this->db->insert($this->_table,$sentence))
            return TRUE;
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoSentence($s_id){
    	$table = '(SELECT * FROM sentence) AS A';
        $this->db->where("s_id",$s_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- Cap nhat Sentence
    function updateSentence($data,$s_id){
        $this->db->where("s_id",$s_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
	//delete Video
    function deleteSentence($s_id){   
         	$this->db->where("s_id",$s_id);
         	$this->db->delete("vocabularysentence");        
            $this->db->where("s_id",$s_id);          
            $this->db->delete($this->_table);        
    }
}
 ?>
<?php 
/**
* 
*/
class Kanji_model extends CI_Model
{
	private $_table = "kanji";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
	function getAllKanji($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_status = 1) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	//get kanji contributed
	function getContributedKanji($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_status = 0) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N1
	function getAllKanjiN1($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_level = \'N1\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N2
	function getAllKanjiN2($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_level = \'N2\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N3
	function getAllKanjiN3($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_level = \'N3\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N4
	function getAllKanjiN4($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_level = \'N4\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N5
	function getAllKanjiN5($off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_level = \'N5\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT k_id FROM kanji WHERE k_status=1) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
     function num_rows_kanjiN1(){
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N1\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_kanjiN2(){
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N2\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_kanjiN3(){
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N3\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_kanjiN4(){
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N4\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_kanjiN5(){
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N5\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_contributed(){
	    $table = '(SELECT k_id FROM kanji WHERE k_status= 0) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Search
	function getByHanViet($txtHanViet,$off="",$limit=""){
		$table = '(SELECT * FROM kanji WHERE k_status = 1 AND k_hanviet LIKE \'%'.$txtHanViet.'%\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($txtHanViet){
	    $table = '(SELECT k_id FROM kanji WHERE k_status = 1 AND k_hanviet LIKE \'%'.$txtHanViet.'%\') AS A';       
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	public function getKanjiByHanViet($keyword){
		$results = null;
		// get from db
		//$keyword = trim($keyword);
		// chống SQL Injection
		$keyword = mysql_real_escape_string($keyword);
		if($keyword === " "){
			return null;
		}else {
		$txtQuery = 'SELECT * FROM kanji WHERE k_hanviet LIKE \'%' . $keyword . '%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
		}
	}
	//--- Lay thong tin 1 record qua id
    function getInfoKanji($k_id){
    	$table = '(SELECT * FROM kanji) AS A';
        $this->db->where("k_id",$k_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Add New Video
	function addKanji($kanji){
        if($this->db->insert($this->_table,$kanji))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Video
    function updateKanji($data,$k_id){
        $this->db->where("k_id",$k_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
	//delete Video
    function deleteKanji($k_id){        
            $this->db->where("k_id",$k_id);          
            $this->db->delete($this->_table);        
    }
    function getKanjiByReadingId($reading_id){
    	$table = '(SELECT * FROM kanji) AS A';
        $this->db->where("reading_id",$reading_id);
        $this->db->from($table);				
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
 ?>
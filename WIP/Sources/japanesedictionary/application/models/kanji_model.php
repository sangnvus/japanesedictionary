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
	// 全て　の　データ　を　得る
	function getAllKanji($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_status = 1) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	//get kanji contributed
	//　寄付した漢字　を　得る
	function getContributedKanji($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_status = 0) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N1
	// 全て　の　漢字N1　を　得る
	function getAllKanjiN1($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_level = \'N1\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N2
	// 全て　の　漢字N２　を　得る
	function getAllKanjiN2($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_level = \'N2\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N3
	// 全て　の　漢字N３　を　得る
	function getAllKanjiN3($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_level = \'N3\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N4
	// 全て　の　漢字N４　を　得る
	function getAllKanjiN4($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_level = \'N4\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all Kanji N5
	// 全て　の　漢字N５　を　得る
	function getAllKanjiN5($off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_level = \'N5\') AS A'; 		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// total of rows
    function num_rows()
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_status=1) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows　kanjiN1
     function num_rows_kanjiN1()
     {
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N1\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows　kanjiN2
    function num_rows_kanjiN2()
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N2\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows　kanjiN3
    function num_rows_kanjiN3()
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N3\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows　kanjiN4
    function num_rows_kanjiN4()
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N4\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows　kanjiN５
    function num_rows_kanjiN5()
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_level = \'N5\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_contributed()
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_status= 0) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Search
    //　HanViet　で　全てのデータを得る
	function getByHanViet($txtHanViet, $off="", $limit="")
	{
		$table = '(SELECT * FROM kanji WHERE k_status = 1 AND k_hanviet =\''.mysql_real_escape_string($txtHanViet).'\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// total of rows　
    function num_rowsBySearch($txtHanViet)
    {
	    $table = '(SELECT k_id FROM kanji WHERE k_status = 1 AND k_hanviet =\''.mysql_real_escape_string($txtHanViet).'\') AS A';       
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	public function getKanjiByHanViet($keyword)
	{
		$results = null;
		// get from db
		// データバース　から　得る		
		// SQL Injection
		$keyword = mysql_real_escape_string($keyword);
		if ($keyword === " ") {
			return null;
		} else {
		$txtQuery = 'SELECT * FROM kanji WHERE k_hanviet LIKE \'%' . $keyword . '%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
		}
	}
	//--- get information by id
	//--- id で　情報　を得る
    function getInfoKanji($k_id)
    {
    	$table = '(SELECT * FROM kanji) AS A';
        $this->db->where("k_id",$k_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Add New Video
    // 新しいビデオ　を　加える
	function addKanji($kanji)
	{
        if($this->db->insert($this->_table,$kanji))
            return TRUE;
        else
            return FALSE;
    }
    //--- update Video
    //---　ビデオ　を　修正する
    function updateKanji($data, $k_id)
    {
        $this->db->where("k_id",$k_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
	//delete Video
	//　ビデオ　を　消す
    function deleteKanji($k_id)
    {        
            $this->db->where("k_id",$k_id);          
            $this->db->delete($this->_table);        
    }
    // get Kanji by reading id
    // reading id　で　漢字　を　得る
    function getKanjiByReadingId($reading_id)
    {
    	$table = '(SELECT * FROM kanji as k LEFT JOIN readingdocument as r ON k.k_lesson=r.reading_code WHERE r.reading_id = \''.$reading_id.'\') AS A';        
        $this->db->from($table);				
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
 ?>
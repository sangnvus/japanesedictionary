<?php 
/**
* 
*/
class Vocabulary_model extends CI_Model
{
	private $_table = "vocabulary";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
	function getAllVocabulary($off="",$limit=""){
		$table = '(SELECT v.v_id,v_hiragana,v_romaji,v_status,m.m_id,m_meaningvn,m_category,m_kanji,m_specialized FROM vocabulary as v LEFT JOIN meaning as m ON v.v_id=m.v_id WHERE v_status=1 ORDER BY v.v_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
     function get50Vocabulary($off="",$limit=""){
        $table = '(SELECT rd.reading_id,readingvocabulary_hiragana,readingvocabulary_meaning,readingvocabulary_kanji 
            FROM readingdocument as rd LEFT JOIN readingvocabulary as rv ON rd.reading_id=rv.reading_id
             WHERE rd.reading_id LIKE \'%'.'SC_'.'%\'  ORDER BY rd.reading_title ASC) AS A';
        //$this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    //get all data deactive
    function getContributedVocab($off="",$limit=""){
        $table = '(SELECT v.v_id,v_hiragana,v_romaji,
            v_status,m.m_id,m_meaningvn,m_category,m_kanji,m_specialized FROM vocabulary 
            as v LEFT JOIN meaning as m ON v.v_id=m.v_id WHERE v_status= 0 ORDER BY v.v_id ASC) AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
	// Tong so record
    function num_rows(){
	    $table = '(SELECT v.v_id FROM vocabulary as v LEFT JOIN meaning as m ON v.v_id=m.v_id WHERE v_status=1) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
     // tong số 50 bài
    function num_rows_list50(){
        $table = '(SELECT readingvocabulary_id FROM readingdocument as rd LEFT JOIN 
            readingvocabulary as rv ON rd.reading_id=rv.reading_id 
            WHERE rd.reading_id LIKE \'%'.'SC_'.'%\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Tong so record deactived
    function num_rows_contributed(){
        $table = '(SELECT v.v_id FROM vocabulary as v LEFT JOIN meaning as m ON v.v_id=m.v_id WHERE v_status=0) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
	function getVocabularyByRomaji($romaji="",$off="",$limit=""){
		$table = '(SELECT v.v_id,v_hiragana,v_romaji,v_status,m.m_id,m_meaningvn,m_category,m_kanji,m_specialized 
			FROM vocabulary as v LEFT JOIN meaning as m ON v.v_id=m.v_id WHERE v_romaji LIKE \'%'.$romaji.'%\'
			ORDER BY v.v_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($romaji=""){
	    $table = '(SELECT v.v_id FROM vocabulary as v LEFT JOIN meaning as m ON v.v_id=m.v_id WHERE v_romaji LIKE \'%'.$romaji.'%\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	//--- Lay du lieu    
	public function getVocabularyByHiragana($keyword) // camel
	{
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM vocabulary WHERE v_hiragana=\'' . $keyword . '\' 
					OR v_romaji=\''.$keyword.'\' LIMIT 0, 1';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			foreach ($results->result() as $row)
			{
			  return $row;
			}
		}
		return null;
	}
    
	public function getMeaningsByVocabId($v_id) 
	{
		$results = null;
		// get from db
		$v_id = intval($v_id);
		$txtQuery = 'SELECT * FROM meaning WHERE v_id=' . $v_id;
		$rows = array();
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}		
		return null;	
	}
    public function getMeaningsSpecializedByVocabId($v_id) 
    {
        $results = null;
        $null = null;
        // get from db
        $v_id = intval($v_id);
        $null = ($null === null) ? "" : $null;
        $txtQuery = 'SELECT * FROM meaning WHERE v_id=' . $v_id.' AND m_specialized != \'\'';
        $rows = array();
        $results = $this->db->query($txtQuery);
        // echo $results->num_rows();
        // die;
        if ($results->num_rows() > 0) {
            return $results->result();
        }       
        return null;    
    }
	public function getSencencesByMeaningId($m_id) {
		$results = null;
		// get from db
		$m_id = intval($m_id);
		$txtQuery = 'SELECT * FROM sentence s
		JOIN vocabularysentence vs ON s.s_id = vs.s_id
		JOIN meaning m ON m.m_id = vs.m_id
		WHERE vs.m_id=' . $m_id;
		$rows = array();
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;	
	}
	// Add New Vocabulary
	function addVocabulary($vocab){
        if($this->db->insert($this->_table,$vocab))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Vocabulary
    function updateVocab($data,$v_id){
        $this->db->where("v_id",$v_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Meaning
    function updateMeaning($data,$m_id){
    		$this->db->where("m_id",$m_id);
    		$query = $this->db->get("meaning"); 
    		if($query->num_rows()!=0){
		            $this->db->where("m_id",$m_id);
                    //$this->db->where("v_id",$m_id);
			        if($this->db->update("meaning",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }
		        else{
		            $this->db->where("v_id",$v_id);
		    		if($this->db->insert("meaning",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }   	        
    }
    //--- delete vocabulary and meaning and reference 
    function deleteVocabulary($v_id,$m_id){
            if ($m_id!="") {
                $this->db->where("m_id",$m_id);
                $this->db->delete("vocabularysentence");        
                $this->db->where("m_id",$m_id);
                $this->db->delete("meaning");
            } else {
                $this->db->where("v_id",$v_id);          
                $this->db->delete($this->_table);
            }                                             
    }
    //---- Kiem tra vocabulary hop le
    function getVocabulary($v_hiragana,$v_id){
        if(isset($v_id)){ //vocab for update
           $this->db->where("v_hiragana",$v_hiragana);
           $this->db->where("v_id !=",$v_id);
           $query = $this->db->get($this->_table);
        }
        else{ //vocab for add
            $this->db->where("v_hiragana",$v_hiragana);
            $query = $this->db->get($this->_table);
        }        
        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    //--- Lay thong tin 1 record qua id
    function getInfoVocab($v_id,$m_id){
        $table = "";
        if ($m_id != "") {            
            $table = '(SELECT v.v_id,v_hiragana,v_romaji,v_status,m.m_id,m_meaningvn,m_category,m_kanji,m_specialized FROM vocabulary as v LEFT JOIN meaning as m ON v.v_id=m.v_id ORDER BY v.v_id ASC) AS A';
            $this->db->where("v_id",$v_id);
            $this->db->where("m_id",$m_id);
        } else {            
            $table = '(SELECT * FROM vocabulary) AS A';
            $this->db->where("v_id",$v_id);
        }
        $query = $this->db->get($table);
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Add New Meaning
	function addMeaning($meaning){
        if($this->db->insert("meaning",$meaning))
            return TRUE;
        else
            return FALSE;
    }


    // Reference Sentence
	function getReferSentence($off="",$limit=""){
		$table = '(SELECT * FROM vocabularysentence ORDER BY m_id ASC) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record Reference Sentence
    function num_rowsReferSentence(){
	    $table = '(SELECT m_id FROM vocabularysentence) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
    function getReferByMid($m_id="",$off="",$limit=""){
        $table = '(SELECT * FROM vocabularysentence WHERE m_id = \''.$m_id.'\') AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // Tong so record
    function num_rowsReferBySearch($m_id=""){
        $table = '(SELECT m_id FROM vocabularysentence WHERE m_id = \''.$m_id.'\') AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add Refer
	function addRefer($refer){
        if($this->db->insert("vocabularysentence",$refer))
            return TRUE;
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoRefer($m_id,$s_id){
    	$table = '(SELECT * FROM vocabularysentence) AS A';
        $this->db->where("m_id",$m_id);
        $this->db->where("s_id",$s_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    function updateRefer($data,$m_id,$s_id){ 
    	$this->db->where("m_id",$m_id);
    	$this->db->where("s_id",$s_id);
        if($this->db->update("vocabularysentence",$data))
            return TRUE;
        else
            return FALSE;
    }
    function deleteRefer($m_id,$s_id){
    		$this->db->where("m_id",$m_id);
    		$this->db->where("s_id",$s_id);
            $this->db->delete("vocabularysentence");              
    }
    function getId(){
        $table = 'SELECT max(v_id) as max FROM vocabulary';
        //$this->db->select('*');
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            foreach ($results->result() as $row)
            {
              return $row;
            }
        }
        return null;
    }
}
 ?>
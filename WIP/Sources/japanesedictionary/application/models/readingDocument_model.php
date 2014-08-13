<?php 
/**
* 
*/
class ReadingDocument_model extends CI_Model
{
	private $_table = "readingdocument";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    function getReadingDocument(){

        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'SC'.'%\') AS A';
        $this->db->select('*');
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    //--- Lay thong tin 1 record qua id
    function getInfo($reading_id){
        $table = '(SELECT * FROM readingdocument) AS A';
        $this->db->where("reading_id",$reading_id);        
        $query = $this->db->get($table);
        $data = $query->result_array();
        return $data;   
    }
    // get all readingdocument
    function getAllReadingDocument($off="",$limit=""){

        $table = '(SELECT * FROM readingdocument ORDER BY reading_code) AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);              
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
     // count readingdocument
    function num_rows_ReadingDocument() {
        $table = '(SELECT reading_id FROM readingdocument) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }    
	// get all data
	function getAllReadingVocab($reading_id,$off="",$limit=""){
		$table = '(SELECT * FROM readingvocabulary WHERE reading_id = \''.$reading_id.'\' ORDER BY readingvocabulary_id ASC) AS A';
		$this->db->select('*');
		//$this->db->where("reading_type",'vocabulary');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
    //get 50 mina
    function get50Vocabulary($off="",$limit=""){
        $table = '(SELECT rv.readingvocabulary_hiragana,rv.readingvocabulary_meaning,rv.readingvocabulary_kanji,rv.readingvocabulary_type 
             FROM readingvocabulary as rv LEFT JOIN readingdocument as rd ON rv.reading_id=rd.reading_id WHERE rd.reading_code LIKE \'%'.'SC'.'%\') AS A';
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
 // tong số 50 bài
    function num_rows_list50(){
        $table = '(SELECT rv.readingvocabulary_id FROM readingvocabulary as rv LEFT JOIN readingdocument as rd ON rv.reading_id=rd.reading_id WHERE rd.reading_code LIKE \'%'.'SC'.'%\') AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	// Tong so record cua 1 bai
    function num_rows_ReadingVocab($reading_id){
	    $table = '(SELECT readingvocabulary_id FROM readingvocabulary WHERE reading_id = \''.$reading_id.'\' ORDER BY readingvocabulary_id ASC) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add New ReadingDocument
	function addReading($reading){
        if($this->db->insert($this->_table,$reading))
            return TRUE;
        else
            return FALSE;
    }
    // Delete ReadingDocument
    function deleteReadingDocument($reading_id) {
        $this->db->where("reading_id",$reading_id);
        $this->db->delete("readingvocabulary");
        $this->db->where("reading_id",$reading_id);
        $this->db->delete("readingarticle");
        $this->db->where("reading_id",$reading_id);
        $this->db->delete("readingdocument");  
    }
    // get all data
	function getReadingByLevel($txtlevel="",$off="",$limit=""){
		$table = '(SELECT * FROM readingdocument WHERE reading_level= \''.mysql_real_escape_string(stripslashes($txtlevel)).'\' ORDER BY reading_id ASC) AS A';
		
		$this->db->select('*');
		//$this->db->where("reading_type",'vocabulary');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($txtlevel=""){
	    $table = '(SELECT reading_id FROM readingdocument WHERE reading_level= \''.mysql_real_escape_string(stripslashes($txtlevel)).'\' ORDER BY reading_id ASC) AS A';
		//$this->db->where("reading_type",'vocabulary');
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //--- Lay thong tin 1 record qua id
    function getInfoReading($reading_id,$readingvocabulary_id){
    	$readingvocabulary_id = ($readingvocabulary_id===null) ? "" : $readingvocabulary_id;
    	$table = "";    	
    	if ($readingvocabulary_id != "") {
    		$table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,rv.readingvocabulary_id,rv.readingvocabulary_hiragana,rv.readingvocabulary_meaning,rv.readingvocabulary_kanji,rv.readingvocabulary_type 
			FROM readingdocument as rd LEFT JOIN readingvocabulary rv ON rd.reading_id=rv.reading_id ORDER BY rd.reading_id ASC) AS A';
	        $this->db->where("reading_id",$reading_id);
	        $this->db->where("readingvocabulary_id",$readingvocabulary_id);
    	} else {
    		$table = '(SELECT * FROM readingdocument) AS A';
    		$this->db->where("reading_id",$reading_id);
    	}    	    	
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();            
        else
            return FALSE;
    }
    function getInfoVocab($readingvocabulary_id){
        $table = '(SELECT * FROM readingvocabulary) AS A';
        $this->db->where("readingvocabulary_id",$readingvocabulary_id);        
        $query = $this->db->get($table);
        $data = $query->result_array();
        return $data;   
    }
    // Add New Content
	function addReadingVocab($vocab){
        if($this->db->insert("readingvocabulary",$vocab))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Reading
    function updateReading($reading,$reading_id){
        $this->db->where("reading_id",$reading_id);
        //$this->db->where("reading_type",'vocabulary');
        if($this->db->update($this->_table,$reading))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Content
    function updateVocab($readingvocabulary,$readingvocabulary_id){  		 
        $this->db->where("readingvocabulary_id",$readingvocabulary_id);
        if($this->db->update("readingvocabulary",$readingvocabulary))
            return TRUE;
        else 
            return FALSE;       
    }
    //--- delete readingdocument and vocabulary
    function deleteVocab($reading_id,$readingvocabulary_id){             
            $this->db->where("readingvocabulary_id",$readingvocabulary_id);
            $this->db->delete("readingvocabulary");                                         
    }

    //Reading Article
    // get all data
    function getInfoReadingArticle($reading_id,$readingarticle_id){
        $readingarticle_id = ($readingarticle_id===null) ? "" : $readingarticle_id;
        $table = "";        
        if ($readingarticle_id != "") {
            $table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,ra.readingarticle_id,ra.readingarticle_content,ra.readingarticle_question,ra.readingarticle_answer,ra.readingarticle_meaning 
            FROM readingdocument as rd LEFT JOIN readingarticle ra ON rd.reading_id=ra.reading_id ORDER BY rd.reading_id ASC) AS A';
            $this->db->where("reading_id",$reading_id);
            //$this->db->where("reading_type",'article');
            $this->db->where("readingarticle_id",$readingarticle_id);
        } else {
            $table = '(SELECT * FROM readingdocument) AS A';
            $this->db->where("reading_id",$reading_id);
            //$this->db->where("reading_type",'article');
        }               
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Add New Content Article
    function addArticle($contentArticle){
        if($this->db->insert("readingarticle",$contentArticle))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Content Article
    function updateContentArticle($data,$readingarticle_id){ 
        $this->db->where("readingarticle_id",$readingarticle_id);
            if($this->db->update("readingarticle",$data))
                return TRUE;
            else
                return FALSE;        
    }
    //--- delete readingdocument and article
    function deleteReadingArticle($readingarticle_id){
        $this->db->where("readingarticle_id",$readingarticle_id);
        $this->db->delete("readingarticle");                                     
    }
    function getReadingVocabById($reading_id){
        $table = '(SELECT * FROM readingvocabulary ORDER BY readingvocabulary_id ASC) AS A';  
        $this->db->select('*');        
        $this->db->where("reading_id",$reading_id);
        $this->db->from($table);             
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getReadingArticleById($reading_id){
        $table = '(SELECT * FROM readingarticle WHERE reading_id = \''.$reading_id.'\') AS A';        
        $this->db->select('*');        
        $this->db->where("reading_id",$reading_id);
        $this->db->from($table);             
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getInfoArticle($readingarticle_id){
        $table = '(SELECT * FROM readingarticle) AS A';
        $this->db->where("readingarticle_id",$readingarticle_id);        
        $query = $this->db->get($table);
        $data = $query->result_array();
        return $data;   
    }
    function getVocabularyN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N3_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailVocabN3($reading_id){
        $table = '(SELECT * FROM readingvocabulary WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getVocabularyN2(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N2_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailVocabN2($reading_id){
        $table = '(SELECT * FROM readingvocabulary WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getKanjiN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N3_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailKanjiN3($reading_id){
        $table = '(SELECT * FROM kanji as k LEFT JOIN readingdocument as r ON k.k_lesson=r.reading_code WHERE r.reading_id = \''.$reading_id.'\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getKanjiN2(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N2_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailKanjiN2($reading_id){
        $table = '(SELECT * FROM kanji as k LEFT JOIN readingdocument as r ON k.k_lesson=r.reading_code WHERE r.reading_id = \''.$reading_id.'\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getGrammarN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N3_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailGrammarN3($reading_id){
        $table ='(SELECT * FROM grammar as g LEFT JOIN readingdocument as r ON g.g_lesson=r.reading_code WHERE reading_id = \''.mysql_real_escape_string($reading_id).'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getGrammarN2(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N2_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailGrammarN2($reading_id){
        $table ='(SELECT * FROM grammar as g LEFT JOIN readingdocument as r ON g.g_lesson=r.reading_code WHERE reading_id = \''.mysql_real_escape_string($reading_id).'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getArticleN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N3_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailArticleN3($reading_id){
        $table = '(SELECT * FROM readingarticle WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getArticleN2(){
        $table = '(SELECT * FROM readingdocument WHERE reading_code LIKE \'%'.'N2_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailArticleN2($reading_id){
        $table = '(SELECT * FROM readingarticle WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
 ?>
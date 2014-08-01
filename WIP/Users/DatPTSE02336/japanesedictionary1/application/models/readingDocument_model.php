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

        $table = '(SELECT * FROM readingdocument) AS A';
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
	// get all data
	function getAllReadingVocab($off="",$limit=""){
		$table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,rv.readingvocabulary_id,rv.readingvocabulary_hiragana,rv.readingvocabulary_meaning,rv.readingvocabulary_kanji,rv.reading_type 
			FROM readingdocument as rd LEFT JOIN readingvocabulary rv ON rd.reading_id=rv.reading_id ORDER BY rd.reading_id ASC) AS A';
		$this->db->select('*');
		//$this->db->where("reading_type",'vocabulary');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows_ReadingVocab(){
	    $table = '(SELECT rd.reading_id FROM readingdocument as rd LEFT JOIN readingvocabulary rv ON rd.reading_id=rv.reading_id ORDER BY rd.reading_id ASC) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add New Reading
	function addReading($reading){
        if($this->db->insert($this->_table,$reading))
            return TRUE;
        else
            return FALSE;
    }
    // get all data
	function getReadingByLevel($level="",$off="",$limit=""){
		$table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,rv.readingvocabulary_id,rv.readingvocabulary_hiragana,rv.readingvocabulary_meaning,rv.readingvocabulary_kanji,rv.reading_type 
			FROM readingdocument as rd LEFT JOIN readingvocabulary rv ON rd.reading_id=rv.reading_id WHERE reading_level= \''.$level.'\' ORDER BY rd.reading_id ASC) AS A';
		
		$this->db->select('*');
		//$this->db->where("reading_type",'vocabulary');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($level=""){
	    $table = '(SELECT rd.reading_id
			FROM readingdocument as rd LEFT JOIN readingvocabulary rv ON rd.reading_id=rv.reading_id WHERE reading_level= \''.$level.'\' ORDER BY rd.reading_id ASC) AS A';
		//$this->db->where("reading_type",'vocabulary');
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //--- Lay thong tin 1 record qua id
    function getInfoReading($reading_id,$readingvocabulary_id){
    	$readingvocabulary_id = ($readingvocabulary_id===null) ? "" : $readingvocabulary_id;
    	$table = "";    	
    	if ($readingvocabulary_id != "") {
    		$table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,rv.readingvocabulary_id,rv.readingvocabulary_hiragana,rv.readingvocabulary_meaning,rv.readingvocabulary_kanji,rv.reading_type 
			FROM readingdocument as rd LEFT JOIN readingvocabulary rv ON rd.reading_id=rv.reading_id ORDER BY rd.reading_id ASC) AS A';
	        $this->db->where("reading_id",$reading_id);
	        //$this->db->where("reading_type",'vocabulary');
	        $this->db->where("readingvocabulary_id",$readingvocabulary_id);
    	} else {
            // echo "string";
            // die;
    		$table = '(SELECT * FROM readingdocument) AS A';
    		$this->db->where("reading_id",$reading_id);
    		//$this->db->where("reading_type",'vocabulary');
    	}    	    	
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();            
        else
            return FALSE;
    }
    
    // Add New Content
	function addContent($content){
        if($this->db->insert("readingvocabulary",$content))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Reading
    function updateReading($data,$reading_id){
        $this->db->where("reading_id",$reading_id);
        //$this->db->where("reading_type",'vocabulary');
        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Content
    function updateContent($data,$readingvocabulary_id){
    		$this->db->where("readingvocabulary_id",$readingvocabulary_id);    		
    		$query = $this->db->get("readingvocabulary"); 
    		if($query->num_rows()!=0){
		            $this->db->where("readingvocabulary_id",$readingvocabulary_id);
			        if($this->db->update("readingvocabulary",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }
		        else{
		            $this->db->where("readingvocabulary_id",$readingvocabulary_id);
		    		if($this->db->insert("readingvocabulary",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }   	        
    }
    //--- delete readingdocument and vocabulary
    function deleteReading($reading_id,$readingvocabulary_id){
            if ($readingvocabulary_id!="") {             
                $this->db->where("readingvocabulary_id",$readingvocabulary_id);
                $this->db->delete("readingvocabulary");
            } else {
                $this->db->where("reading_id",$reading_id);          
                $this->db->delete($this->_table);
            }                                             
    }

    //Reading Article
    // get all data
	function getAllReadingArticle($off="",$limit=""){
		$table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,ra.readingarticle_id,ra.readingarticle_content,ra.readingarticle_question,ra.readingarticle_answer,ra.reading_type 
			FROM readingdocument as rd LEFT JOIN readingarticle ra ON rd.reading_id=ra.reading_id ORDER BY rd.reading_id ASC) AS A';
		
		$this->db->select('*');
		//$this->db->where("reading_type",'article');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows_ReadingArticle(){
	    $table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,ra.readingarticle_id,ra.readingarticle_content,ra.readingarticle_question,ra.readingarticle_answer,ra.reading_type 
			FROM readingdocument as rd LEFT JOIN readingarticle ra ON rd.reading_id=ra.reading_id ORDER BY rd.reading_id ASC) AS A';		
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
	function getReadingArticleByLevel($level="",$off="",$limit=""){
		$table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,ra.readingarticle_id,ra.readingarticle_content,ra.readingarticle_question,ra.readingarticle_answer,ra.reading_type 
			FROM readingdocument as rd LEFT JOIN readingarticle ra ON rd.reading_id=ra.reading_id ORDER BY rd.reading_id ASC) AS A';
		
		$this->db->select('*');
		$this->db->where("reading_level",$level);
		//$this->db->where("reading_type",'article');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsArticleBySearch($level=""){
	    $table = '(SELECT rd.reading_id
			FROM readingdocument as rd LEFT JOIN readingarticle ra ON rd.reading_id=ra.reading_id WHERE reading_level= \''.$level.'\' ORDER BY rd.reading_id ASC) AS A';
		//$this->db->where("reading_type",'vocabulary');
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function getInfoReadingArticle($reading_id,$readingarticle_id){
        $readingarticle_id = ($readingarticle_id===null) ? "" : $readingarticle_id;
        $table = "";        
        if ($readingarticle_id != "") {
            $table = '(SELECT rd.reading_id,rd.reading_title,rd.reading_level,ra.readingarticle_id,ra.readingarticle_content,ra.readingarticle_question,ra.readingarticle_answer,ra.reading_type 
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
    function addContentArticle($content){
        if($this->db->insert("readingarticle",$content))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Reading Article
    function updateReadingArticle($data,$reading_id){
        $this->db->where("reading_id",$reading_id);
        //$this->db->where("reading_type",'article');
        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Content Article
    function updateContentArticle($data,$readingarticle_id){
            $this->db->where("readingarticle_id",$readingarticle_id);         
            $query = $this->db->get("readingarticle"); 
            if($query->num_rows()!=0){
                    $this->db->where("readingarticle_id",$readingarticle_id);
                    if($this->db->update("readingarticle",$data))
                        return TRUE;
                    else
                        return FALSE;
                }
                else{
                    $this->db->where("readingarticle_id",$readingarticle_id);
                    if($this->db->insert("readingarticle",$data))
                        return TRUE;
                    else
                        return FALSE;
                }               
    }
    //--- delete readingdocument and article
    function deleteReadingArticle($reading_id,$readingarticle_id){
            if ($readingarticle_id!="") {             
                $this->db->where("readingarticle_id",$readingarticle_id);
                $this->db->delete("readingarticle");
            } else {
                $this->db->where("reading_id",$reading_id);          
                $this->db->delete($this->_table);
            }                                             
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
        $table = '(SELECT * FROM readingarticle ORDER BY readingarticle_id ASC) AS A';        
        $this->db->select('*');        
        $this->db->where("reading_id",$reading_id);
        $this->db->from($table);             
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getVocabularyN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N3_soumatome'.'%\') AS A';        
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
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N2_soumatome'.'%\') AS A';        
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
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N3_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailKanjiN3($reading_id){
        $table = '(SELECT * FROM kanji WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getKanjiN2(){
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N2_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailKanjiN2($reading_id){
        $table = '(SELECT * FROM kanji WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getGrammarN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N3_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailGrammarN3($reading_id){
        $table = '(SELECT * FROM grammar WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getGrammarN2(){
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N2_soumatome'.'%\') AS A';        
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getDetailGrammarN2($reading_id){
        $table = '(SELECT * FROM grammar WHERE reading_id = \''.$reading_id.'\') AS A';
        $this->db->from($table);            
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function getArticleN3(){
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N3_soumatome'.'%\') AS A';        
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
        $table = '(SELECT * FROM readingdocument WHERE reading_id LIKE \'%'.'N2_soumatome'.'%\') AS A';        
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
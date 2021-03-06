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
    //--- lookup autocomplete search
    //---　探し
    function lookup($keyword)
    {  
        $this->db->select('*')->from('grammar');  
        $this->db->like('g_romaji',$keyword,'after');
        $this->db->or_like('g_hiragana',$keyword,'after');   
        $query = $this->db->get();      
           
        return $query->result();  
    }
    // get all grammar actived
    // 全て　の　文法　を　得る
    function getAllGrammar($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_status = 1 ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // get contributed grammar
    // 全て　の　寄付した文法　を　得る
    function getContributedGrammar($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_status = 0 ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // get all data level N5
    // 全て　の　レベルN5　の　データ　を　得る
    function getGrammarN5($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_level = \''.'N5'.'\' ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
     // get all data level N4
    // 全て　の　レベルN４　の　データ　を　得る
    function getGrammarN4($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_level = \''.'N4'.'\' ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
     // get all data level N3
    // 全て　の　レベルN３　の　データ　を　得る
    function getGrammarN3($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_level = \''.'N3'.'\' ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
     // get all data level N2
    // 全て　の　レベルN２　の　データ　を　得る
    function getGrammarN2($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_level = \''.'N2'.'\' ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
     // get all data level N１
    // 全て　の　レベルN１　の　データ　を　得る
    function getGrammarN1($off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_level = \''.'N1'.'\' ORDER BY g_hiragana ASC) AS A';     
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // total of rows grammar
    function num_rows()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_status = 1 ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //total of rows contributed grammar
    function num_rows_contributed()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_status = 0) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows grammar N5
    function num_rows_listGrammarN5()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_level = \''.'N5'.'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows grammar N4
    function num_rows_listGrammarN4()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_level = \''.'N4'.'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows grammar N3
    function num_rows_listGrammarN3()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_level = \''.'N3'.'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows grammar N2
    function num_rows_listGrammarN2()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_level = \''.'N2'.'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows grammar N1
    function num_rows_listGrammarN1()
    {
        $table = '(SELECT g_id FROM grammar WHERE g_level = \''.'N1'.'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by romaji
    function getByRomaji($txtRomaji, $off="", $limit="")
    {
        $table = '(SELECT * FROM grammar WHERE g_romaji LIKE \'%'.mysql_real_escape_string($txtRomaji).'%\' ORDER BY g_hiragana ASC) AS A';       
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // total of rows search by romaji
    function num_rowsBySearch($txtRomaji)
    {
        $table = '(SELECT g_id FROM grammar WHERE g_status = 1 AND g_romaji LIKE \'%'.mysql_real_escape_string($txtRomaji).'%\') AS A';             
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get grammar by hiragana
    public function getGrammarByHiragana($keyword)
    {        
        if ($keyword == null || $keyword == "" || trim($keyword) == "") {
            return null;
        }                
        if (strpos($keyword,'%') !== false) {                        
            return null;
        }
        $results = null;
        // get from db
        $keyword = trim($keyword);
        $keyword = mysql_real_escape_string($keyword);        
        $txtQuery = 'SELECT * FROM grammar WHERE g_hiragana LIKE \'%'.$keyword.'%\' 
        OR g_romaji LIKE \'%'.$keyword.'%\' AND g_status=1 ORDER BY g_hiragana ASC';
        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {         
            return $results->result();
        }
        return null;
    }
    // get grammar by grammar id
    public function getGrammarByGrammarId($g_id)
    {
        $results = null;
        // get from db
        $txtQuery = 'SELECT * FROM grammar WHERE g_id=\''.mysql_real_escape_string($g_id).'\' ORDER BY g_hiragana ASC';
        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {         
            return $results->result();
        }
        return null;
    }
    // get grammar by id
    public function getGrammarById($keyword)
    {
        $results = null;
        // get from db
        $keyword = trim($keyword);
        $keyword = mysql_real_escape_string($keyword);
        $txtQuery = 'SELECT * FROM grammar WHERE g_hiragana LIKE \'%' . $keyword . '%\' 
        OR g_romaji LIKE \'%'.$keyword.'%\' ORDER BY g_hiragana ASC';
        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {         
            return $results->result();
        }
        return null;
    }
    // get sentence by grammar id
    public function getSentenceByGrammarId($g_id)
    {
        $results = null;
        // get from db
        $g_id = intval($g_id);
        $txtQuery = 'SELECT * FROM sentence s
        JOIN grammarsentence gs ON s.s_id = gs.s_id
        JOIN grammar g ON g.g_id = gs.g_id
        WHERE gs.g_id=' . mysql_real_escape_string($g_id);
        $rows = array();
        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {
            return $results->result();
        }
        return null;
    }
    // Add New Grammar
    function addGrammar($grammar)
    {
        if($this->db->insert($this->_table,$grammar))
            return TRUE;
        else
            return FALSE;
    }
    //--- update Grammar
    function updateGrammar($data,$g_id)
    {
        $this->db->where("g_id",$g_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //delete Video
    function deleteGrammar($g_id)
    {        
            $this->db->where("g_id",$g_id);
            $this->db->delete("grammarsentence");
            $this->db->where("g_id",$g_id);          
            $this->db->delete($this->_table);        
    }
    //--- get information grammar by id
    function getInfoGrammar($g_id)
    {
        $table = '(SELECT * FROM grammar ORDER BY g_hiragana ASC) AS A';
        $this->db->where("g_id",$g_id);
        $query = $this->db->get($table);        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Reference Sentence
    function getReferSentence($off="", $limit="")
    {
        $table = '(SELECT * FROM grammarsentence ORDER BY g_id ASC) AS A';      
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // total of records Reference Sentence
    function num_rowsReferSentence()
    {
        $table = '(SELECT g_id FROM grammarsentence) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // Add Refer
    function addRefer($refer)
    {
        if($this->db->insert("grammarsentence",$refer))
            return TRUE;
        else
            return FALSE;
    }
    //--- get information reference by id
    function getInfoRefer($g_id, $s_id)
    {
        $table = '(SELECT * FROM grammarsentence ORDER BY g_hiragana ASC) AS A';
        $this->db->where("g_id",$g_id);
        $this->db->where("s_id",$s_id);
        $query = $this->db->get($table);        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // get data reference by Gid
    function getReferByGid($g_id="", $off="", $limit="")
    {
        $table = '(SELECT * FROM grammarsentence WHERE g_id = \''.mysql_real_escape_string($g_id).'\' ORDER BY g_hiragana ASC) AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // total of records reference
    function num_rowsReferBySearch($g_id="")
    {
        $table = '(SELECT g_id FROM grammarsentence WHERE g_id = \''.mysql_real_escape_string($g_id).'\') AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // update reference
    function updateRefer($data, $g_id, $s_id)
    { 
        $this->db->where("g_id",$g_id);
        $this->db->where("s_id",$s_id);
        if($this->db->update("grammarsentence",$data))
            return TRUE;
        else
            return FALSE;
    }
    // delete reference
    function deleteRefer($g_id, $s_id)
    {
            $this->db->where("g_id",$g_id);
            $this->db->where("s_id",$s_id);
            $this->db->delete("grammarsentence");              
    }
    // get grammar by reading id
    function getGrammarByReadingId($reading_id)
    {        
        $table ='SELECT * FROM grammar as g LEFT JOIN readingdocument as r ON g.g_lesson=r.reading_code WHERE reading_id = \''.mysql_real_escape_string($reading_id).'\'';        
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            return $results->result();
        }       
        return null;
    }
    // get sentence by grammar id
    function getSentenByGrammarId($g_id)
    {
        $table = 'SELECT * FROM grammarsentence as gs JOIN sentence as s ON gs.s_id=s.s_id WHERE gs.g_id=\''.mysql_real_escape_string($g_id).'\'';        
        $results = $this->db->query($table);
        if ($results->num_rows() > 0) {
            return $results->result();
        }
        return null;
    }
    // check Gid
    function checkGid($g_id)
    {
        $this->db->where("g_id",$g_id);
        $query = $this->db->get("grammar");        
        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    // check Sid
    function checkSid($s_id)
    {
        $this->db->where("s_id",$s_id);
        $query = $this->db->get("sentence");

        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    // check gid, sid
    function checkGid_Sid($g_id,$s_id)
    {
        $this->db->where("g_id",$g_id);
        $this->db->where("s_id",$s_id);
        $query = $this->db->get("grammarsentence");

        if($query->num_rows()!=0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    // get sentence by meaning
    function getSentenceByMeaning($g_romaji)
    {
        $data = "";  
        foreach ($g_romaji as $key => $value) {
             $this->db->like("s_romaji",$value);        
             $query = $this->db->get("sentence");             
             $data[] = $query->result_array();
        }   
        return $data;
    }
    //---- Check vocabulary valid
    function getGrammar($g_hiragana,$g_id)
    {
        if (isset($g_id)) { //vocab for update
           $this->db->where("g_hiragana",$g_hiragana);
           $this->db->where("g_id !=",$g_id);
           $query = $this->db->get($this->_table);
        } else { //vocab for add
            $this->db->where("g_hiragana",$g_hiragana);
            $query = $this->db->get($this->_table);
        }        
        if ($query->num_rows() != 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
 ?>
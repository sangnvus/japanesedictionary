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
    //--- lookup autocomplete search
    //---　探し
	function lookup($keyword)
	{  
        $this->db->select('*')->from('conversationcontent');  
        $this->db->like('con_title',$keyword,'both');
        //$this->db->or_like('v_hiragana',$keyword,'after');   
        $query = $this->db->get();      
        return $query->result();  
    } 
	// get all data
    // 全てのデータ　を　得る
	function getAllConversation($off="", $limit="")
	{
		$table = '(SELECT * FROM conversation) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// total of rows
    // 全てのロー
    function num_rows()
    {
	    $table = '(SELECT c_id FROM conversation) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Level
    // レベルで全てのデータを得る
	function getConversationByLevel($level="", $off="", $limit="")
	{
		$table = '(SELECT * FROM conversation WHERE c_level=\''.mysql_real_escape_string($level).'\' ORDER BY c_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// total of rows search
    // 全てのローの探し
    function num_rowsBySearch($level="")
    {
	    $table = '(SELECT c_id FROM conversation WHERE c_level=\''.mysql_real_escape_string($level).'\' ORDER BY c_id ASC) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows communication
    // 全てのローのコミュニケイション
    function num_rows_communicatedNihon()
    {
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Giao tiếp\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows conversation SC
    // 全てのローの会話SC
    function num_rows_conversationSC()
    {
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Sơ cấp\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows conversation TC1
    // 全てのローの会話TC1
    function num_rows_conversationTC1()
    {
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Trung cấp 1\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of rows conversation TC2
    // 全てのローの会話TC2
    function num_rows_conversationTC2()
    {
	    $table = '(SELECT c_id FROM conversation WHERE c_level = \'Trung cấp 2\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get conversation by title
    // タイトル　で　会話　を　得る
	public function getConversationByTitle($keyword)
	{
		$results = null;
		// get from db	
        // データベース　から	得る
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM conversation WHERE c_title LIKE \'%' . $keyword . '%\' 
		OR c_level LIKE \'%'.$keyword.'%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
    // get conversation content by conversation id
    // 会話id　で　会話の内容を得る
	public function getConversationContentByCid($c_id)
	{
		$results = null;
		// get from db
        // データベース　から    得る
		$c_id = intval($c_id);
		$txtQuery = 'SELECT * FROM conversationcontent WHERE c_id=\''.$c_id.'\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}
    // get conversation content by hiragana
    // ひらがな　で　会話の内容を得る
	public function getConversationContentByHiragana($keyword)
	{		
		if ($keyword == null || $keyword == "") {
			return null;
		}
		if (strpos($keyword,'%') !== false) {
			return null;
		}
		$results = null;
		// get from db
        // データベース　から    得る
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
    // 新しい会話　を　加える
	function addConversation($conversation)
	{
        if($this->db->insert($this->_table,$conversation))
            return TRUE;
        else
            return FALSE;
    }
    //--- get Information by conversation id
    //---会話id　で　情報　を　える
    function getInfoConversation($c_id)
    {
    	$table = "";    	
    	$table = '(SELECT * FROM conversation) AS A';
    	$this->db->where("c_id",$c_id);	    	
        $query = $this->db->get($table);  
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- update Conversation
    //---　会話　を　修正する
    function updateConversation($data,$c_id)
    {
        $this->db->where("c_id",$c_id);
        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    // Add New Content
    // 新しい内容　を　加える
	function addContent($content)
	{
        if($this->db->insert("conversationcontent",$content))
            return TRUE;
        else
            return FALSE;
    }
    //--- Update Content
    //---　内容　を　修正する
    function updateContent($data,$con_id)
    {
		$this->db->where("con_id",$con_id);
		if($this->db->update("conversationcontent",$data))
			return TRUE;		
        else
            return FALSE;  
    }
    //--- delete conversation and content
    //---　会話　を　消す
    function deleteConversation($c_id)
    {
            if ($c_id!="") {             
                $this->db->where("c_id",$c_id);
                $this->db->delete("conversationcontent");
                $this->db->where("c_id",$c_id);          
                $this->db->delete($this->_table);
            }
            else
            return FALSE;                                            
    }
    //---　内容　を　消す
    function deleteContent($con_id)
    {
    		$this->db->where("con_id",$con_id);
            $this->db->delete("conversationcontent");
    }
    // get all data getcommunicatedNihon
    // 全て　の　データ　をえる
    function getcommunicatedNihon($off="", $limit="")
    {
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Giao tiếp\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
    // get all data conversationSC
    // 会話SCのデータを得る
    function getconversationSC($off="", $limit="")
    {
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Sơ cấp\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all data conversationTC1
    // 会話TC1のデータを得る
    function getconversationTC1($off="", $limit="")
    {
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Trung cấp 1\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// get all data conversationTC2
    // 会話TC2のデータを得る
    function getconversationTC2($off="",$limit="")
    {
		$table = '(SELECT c_id,c_title FROM conversation WHERE c_level = \'Trung cấp 2\' ) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	//--- Get information by id
    //---　id　で　情報　を得る
    function getInfo($c_id)
    {
        $table = '(SELECT * FROM conversation) AS A';
        $this->db->where("c_id",$c_id);        
        $query = $this->db->get($table);
        $data = $query->result_array();
        return $data;   
    }
    //--- get Content by content id
    //---　内容id　で　内容を得る
    function getContentById($con_id)
    {    	
		$txtQuery = '(SELECT * FROM conversationcontent WHERE con_id=\''.$con_id.'\') AS A';		      
        $query = $this->db->get($txtQuery);
        if($query)
            return $query->row_array();
        else
            return FALSE;		
    } 
    //--- get Detail Content By conversation id
    //---　会話id　で　詳細内容を得る
	public function getDetailContentByCid($c_id)
	{
		$results = null;
		// get from db		
        // データベースから得る
		$txtQuery = '(SELECT * FROM conversationcontent WHERE c_id=\''.$c_id.'\')';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}
}
 ?>
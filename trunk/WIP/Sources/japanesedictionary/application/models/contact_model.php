<?php 
/**
* 
*/
class Contact_model extends CI_Model
{
	private $_table = "contact";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
    // 全てのデータ　を　得る
	function getAllContact($off="",$limit="")
    {
		$table = '(SELECT * FROM contact WHERE contact_status = 1) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
    // get　Reply　Contact
    // 返事コンタクト　を得る
    function getReplyContact($off="",$limit="")
    {
        $table = '(SELECT * FROM contact WHERE contact_status = 0) AS A';       
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
	// total of records
    // 全て　の　レコード
    function num_rows()
    {
	    $table = '(SELECT contact_id FROM contact) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // total of reply contact records
    // 全て　の　返事コンタクト　レコード
    function num_rows_reply()
    {
        $table = '(SELECT contact_id FROM contact WHERE contact_status= 0 ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Type
    // タイプ　で　全て　の　データ　を　得る
	function getContactByType($txtType,$off="",$limit="")
    {
		$table = '(SELECT * FROM contact WHERE contact_type = \''.mysql_real_escape_string(stripslashes($txtType)).'\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// total of records search
    //　全て　の　探しのレコード　
    function num_rowsBySearch($txtType)
    {
	    $table = '(SELECT contact_id FROM contact WHERE contact_type = \''.mysql_real_escape_string(stripslashes($txtType)).'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //　delete Contact
    //　コンタクト　を　消す
    function deleteContact($contact_id)
    {        
            $this->db->where("contact_id",$contact_id);          
            $this->db->delete($this->_table);        
    }
    
    //--- Get Info by contact id
    //---　コンタクトid　で　情報を得る
    function getInfo($contact_id)
    {
    	$table = '(SELECT * FROM contact) AS A';
        $this->db->where("contact_id",$contact_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- update Contact
    //---　コンタクト　を　修正する
    function updateContact($contact, $contact_id)
    {
    	$this->db->where("contact_id",$contact_id);
        if($this->db->update($this->_table,$contact))
            return TRUE;
        else
            return FALSE;
    }
    }
 ?>
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
	function getAllContact($off="",$limit=""){
		$table = '(SELECT * FROM contact) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
    function getReplyContact($off="",$limit=""){
        $table = '(SELECT * FROM contact WHERE contact_status = 0) AS A';       
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
	// Tong so record
    function num_rows(){
	    $table = '(SELECT contact_id FROM contact) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function num_rows_reply(){
        $table = '(SELECT contact_id FROM contact WHERE contact_status= 0 ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Search
	function getContactByType($txtType,$off="",$limit=""){
		$table = '(SELECT * FROM contact WHERE contact_type = \''.mysql_real_escape_string(stripslashes($txtType)).'\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($txtType){
	    $table = '(SELECT contact_id FROM contact WHERE contact_type = \''.mysql_real_escape_string(stripslashes($txtType)).'\') AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //delete Contact
    function deleteContact($contact_id){        
            $this->db->where("contact_id",$contact_id);          
            $this->db->delete($this->_table);        
    }

    //DATPT
//--- Lay thong tin 1 record qua id
    function getInfo($contact_id){
    	$table = '(SELECT * FROM contact) AS A';
        $this->db->where("contact_id",$contact_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    function updateContact($contact, $contact_id){
    	$this->db->where("contact_id",$contact_id);
        if($this->db->update($this->_table,$contact))
            return TRUE;
        else
            return FALSE;
    }
    }
 ?>
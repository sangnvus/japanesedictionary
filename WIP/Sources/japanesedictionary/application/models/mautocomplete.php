<?php  
class MAutocomplete extends CI_Model{  
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    function lookup($keyword){  
        $this->db->select('*')->from('country');  
        $this->db->like('printable_name',$keyword,'after');  
        $query = $this->db->get();      
           
        return $query->result();  
    }  
}  
?>
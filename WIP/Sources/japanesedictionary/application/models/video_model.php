<?php 
/**
* 
*/
class Video_model extends CI_Model
{
	private $_table = "video";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    function lookup($keyword){  
        $this->db->select('*')->from('video');  
        $this->db->like('vi_title',$keyword,'after');
        //$this->db->or_like('v_hiragana',$keyword,'after');   
        $query = $this->db->get();      
           
        return $query->result();  
    }
	// get all data
	function getAllVideo($off="",$limit=""){
		$table = '(SELECT * FROM video) AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT vi_id FROM video) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data by Search
	function getByTitle($txtTitle,$off="",$limit=""){
		$table = '(SELECT * FROM video WHERE vi_title LIKE \'%'.mysql_real_escape_string($txtTitle).'%\') AS A';		
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rowsBySearch($txtTitle){
	    $table = '(SELECT vi_id FROM video WHERE vi_title LIKE \'%'.mysql_real_escape_string($txtTitle).'%\') AS A';       
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	public function getVideoByTitle($keyword){
		if ($keyword == null || $keyword == "") {
			return null;
		}
		$results = null;
		// get from db
		//$keyword = trim($keyword);
		// chống SQL Injection
		$keyword = mysql_real_escape_string($keyword);
		if($keyword === " "){
			return null;
		}else {
		$txtQuery = 'SELECT * FROM video WHERE vi_title LIKE \'%' . $keyword . '%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
		}
	}
	//--- Lay thong tin 1 record qua id
    function getInfoVideo($vi_id){
    	$table = '(SELECT * FROM video) AS A';
        $this->db->where("vi_id",$vi_id);
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    // Add New Video
	function addVideo($video){
        if($this->db->insert($this->_table,$video))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Video
    function updateVideo($data,$vi_id){
        $this->db->where("vi_id",$vi_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
	//delete Video
    function deleteVideo($vi_id){        
            $this->db->where("vi_id",$vi_id);          
            $this->db->delete($this->_table);        
    }
    //--- Kiem tra Email
    function checkURL($vi_link,$vi_id=""){
        
        if(isset($vi_id) && $vi_id!="")
        { //use for update
           $this->db->where("vi_link",$vi_link);
           $this->db->where("vi_id !=",$vi_id);
           $query = $this->db->get($this->_table);
        }
        else
        { //user for add
            $this->db->where("vi_link",$vi_link);
            $query = $this->db->get($this->_table);
        }
        
        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
        
    }
}
 ?>
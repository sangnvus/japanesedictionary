<?php 
/**
* 
*/
class Video_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getVideoByTitle($keyword){
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
}
 ?>
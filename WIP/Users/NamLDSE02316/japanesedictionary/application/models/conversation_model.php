<?php 
/**
* 
*/
class Conversation_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getConversationByTitle($keyword){
		$results = null;
		// get from db
		//$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM conversation WHERE c_title LIKE \'%' . $keyword . '%\' 
		OR c_level LIKE \'%'.$keyword.'%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
	public function getConversationContentByCid($c_id){
		$results = null;
		// get from db
		$c_id = intval($c_id);
		$txtQuery = 'SELECT * FROM conversationcontent WHERE c_id=\''.$c_id.'\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}
	public function getConversationContentByHiragana($keyword){
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM conversationcontent WHERE con_hiragana LIKE \'%' .$keyword. '%\' 
		OR con_romaji LIKE \'%'.$keyword.'%\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
}
 ?>
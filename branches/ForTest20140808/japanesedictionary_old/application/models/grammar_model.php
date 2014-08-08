<?php 
/**
* 
*/
class Grammar_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getGrammarByHiragana($keyword){
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM grammar WHERE g_hiragana LIKE \'%' . $keyword . '%\' 
					OR g_romaji=\'%'.$keyword.'%\' LIMIT 0, 1';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
	public function getSentenceByGrammarId($g_id){
		$results = null;
		// get from db
		$g_id = intval($g_id);
		$txtQuery = 'SELECT * FROM sentence s
		JOIN grammarsentence gs ON s.s_id = gs.s_id
		JOIN grammar g ON g.g_id = gs.g_id
		WHERE gs.g_id=' . $g_id;
		$rows = array();
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;
	}

}
 ?>
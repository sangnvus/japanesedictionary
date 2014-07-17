<?php 
/**
* 
*/
class Vocabulary_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getVocabularyByHiragana($keyword) // camel
	{
		$results = null;
		// get from db
		$keyword = trim($keyword);
		$keyword = mysql_real_escape_string($keyword);
		$txtQuery = 'SELECT * FROM vocabulary WHERE v_hiragana=\'' . $keyword . '\' 
					OR v_romaji=\''.$keyword.'\' LIMIT 0, 1';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			foreach ($results->result() as $row)
			{
			  return $row;
			}
		}
		return null;
	}

	public function getMeaningsByVocabId($v_id) 
	{
		$results = null;
		// get from db
		$v_id = intval($v_id);
		$txtQuery = 'SELECT * FROM meaning WHERE v_id=' . $v_id;
		$rows = array();
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}		
		return null;	
	}

	public function getSencencesByMeaningId($m_id) {
		$results = null;
		// get from db
		$m_id = intval($m_id);
		$txtQuery = 'SELECT * FROM sentence s
		JOIN vocabularysentence vs ON s.s_id = vs.s_id
		JOIN meaning m ON m.m_id = vs.m_id
		WHERE vs.m_id=' . $m_id;
		$rows = array();
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {
			return $results->result();
		}
		return null;	
	}
}
 ?>
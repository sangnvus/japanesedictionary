<?php 
/**
* 
*/
class Listening_model extends CI_Model
{
	private $_table = "traininglistening";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// get all data
	function getAllListening($off="",$limit=""){
		$table = '(SELECT l.lis_id,l.lis_title,l.lis_level,sc.sourcefile_id,sc.sourcefile_question,sc.sourcefile_script,sc.sourcefile_meaning,sc.sourcefile_answer FROM traininglistening as l LEFT JOIN sourcefile sc ON l.lis_id=sc.lis_id ORDER BY l.lis_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record
    function num_rows(){
	    $table = '(SELECT l.lis_id FROM traininglistening as l LEFT JOIN sourcefile sc ON l.lis_id=sc.lis_id ORDER BY l.lis_id ASC) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //đếm N2&N3
    function num_rows_listeningN2N3(){
        $table = '(SELECT lis_id FROM traininglistening WHERE lis_level = \'N2N3\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //đếm N4&N5
    function num_rows_listeningN4N5(){
        $table = '(SELECT lis_id FROM traininglistening WHERE lis_level = \'N4N5\' ) AS A';        
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    // get all data
	function getListeningByLevel($level="",$off="",$limit=""){
		$table = '(SELECT l.lis_id,l.lis_title,l.lis_level,sc.sourcefile_id,sc.sourcefile_question,sc.sourcefile_script,sc.sourcefile_meaning,sc.sourcefile_answer FROM traininglistening as l LEFT JOIN sourcefile sc ON l.lis_id=sc.lis_id WHERE lis_level=\''.$level.'\' ORDER BY l.lis_id ASC) AS A';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($off,$limit);		
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}
	// Tong so record search
    function num_rowsBySearch($level=""){
	    $table = '(SELECT l.lis_id FROM traininglistening as l LEFT JOIN sourcefile sc ON l.lis_id=sc.lis_id WHERE lis_level=\''.$level.'\' ORDER BY l.lis_id ASC) AS A';
        $this->db->from($table);
        return $this->db->count_all_results();
    }
	// Add New Traininglistening
	function addTraininglistening($traininglistening){
        if($this->db->insert($this->_table,$traininglistening))
            return TRUE;
        else
            return FALSE;
    }
    //--- Lay thong tin 1 record qua id
    function getInfoTraininglistening($lis_id,$sourcefile_id){
    	$sourcefile_id = ($sourcefile_id===null) ? "" : $sourcefile_id;
    	$table = "";    	
    	if ($sourcefile_id != "") {
    		$table = '(SELECT l.lis_id,l.lis_title,l.lis_level,sc.sourcefile_id,sc.sourcefile_question,sc.sourcefile_script,sc.sourcefile_meaning,sc.sourcefile_answer FROM traininglistening as l LEFT JOIN sourcefile sc ON l.lis_id=sc.lis_id ORDER BY l.lis_id ASC) AS A';
	        $this->db->where("lis_id",$lis_id);
	        $this->db->where("sourcefile_id",$sourcefile_id);
    	} else {
    		$table = '(SELECT * FROM traininglistening) AS A';
    		$this->db->where("lis_id",$lis_id);
    	}    	    	
        $query = $this->db->get($table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- Cap nhat Traininglistening
    function updateTraininglistening($data,$lis_id){
        $this->db->where("lis_id",$lis_id);

        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    // Add New Sourcefile
	function addSourcefile($sourcefile){
        if($this->db->insert("sourcefile",$sourcefile))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat Sourcefile
    function updateSourcefile($data,$sourcefile_id){
    		$this->db->where("sourcefile_id",$sourcefile_id);
    		$query = $this->db->get("sourcefile"); 

    		if($query->num_rows()!=0){

		            $this->db->where("sourcefile_id",$sourcefile_id);
			        if($this->db->update("sourcefile",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }
		        else{
		            //$this->db->where("sourcefile_id",$sourcefile_id);
		    		if($this->db->insert("sourcefile",$data))
			            return TRUE;
			        else
			            return FALSE;
		        }   	        
    }
    //--- delete Sourcefile and listening
    function deleteSourcefile($lis_id,$sourcefile_id){
            if ($sourcefile_id!="") {             
                $this->db->where("sourcefile_id",$sourcefile_id);
                $this->db->delete("sourcefile");
            } else {
                $this->db->where("lis_id",$lis_id);          
                $this->db->delete($this->_table);
            }                                             
    }
    // get all data listeningN2N3
    function getlisteningN2N3($off="",$limit=""){
        $table = '(SELECT lis_id,lis_title FROM traininglistening WHERE lis_level = \'N2N3\' ) AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // get all data listeningN4N5
    function getlisteningN4N5($off="",$limit=""){
        $table = '(SELECT lis_id,lis_title FROM traininglistening WHERE lis_level = \'N4N5\' ) AS A';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($off,$limit);      
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    //--- Lay thong tin 1 record qua id
    function getInfo($lis_id){
        $table = '(SELECT * FROM traininglistening) AS A';
        $this->db->where("lis_id",$lis_id);        
        $query = $this->db->get($table);
        $data = $query->result_array();
        return $data;   
    }   
    public function getDetailSourcefileByLisid($lis_id){
        $results = null;
        // get from db
        $txtQuery = '(SELECT l.lis_id,l.lis_title,l.lis_level,sc.sourcefile_id,sc.sourcefile_question,sc.sourcefile_script,sc.sourcefile_meaning,sc.sourcefile_answer FROM traininglistening as l LEFT JOIN sourcefile sc ON l.lis_id=sc.lis_id WHERE l.lis_id=\''.$lis_id.'\')';
        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {
            return $results->result();
        }
        return null;
    }
}
 ?>
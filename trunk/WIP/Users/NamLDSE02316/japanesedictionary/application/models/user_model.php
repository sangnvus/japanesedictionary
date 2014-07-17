<?php 
/**
* 
*/
class User_model extends CI_Model
{
	private $_table = "user";
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getListAdmin(){
		$results = null;
		// get from db				
		$txtQuery = 'SELECT * FROM user WHERE u_role = \'1\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}

	function getListUser(){
		$results = null;
		// get from db				
		$txtQuery = 'SELECT * FROM user WHERE u_role = \'2\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
    function getUserByUsername($username,$email){
        $results = null;        
        // get from db                
        if ($username !== null && $username !=="" && $email === null && $email === "") {            
            $txtQuery = 'SELECT * FROM user WHERE u_username LIKE \'%' . $username.'%\'';    
        } 
        if ($username === null && $username ==="" && $email !== null && $email !== "") {            
            $txtQuery = 'SELECT * FROM user WHERE u_email LIKE \'%' . $email.'%\'';
        }
        if ($username !== null && $username !=="" && $email !== null && $email !== "") {            
            $txtQuery = 'SELECT * FROM user WHERE u_username LIKE \'%'.$username.'%\' AND u_email LIKE \'%'.$email.'%\'';
        }      
                
        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {
            return $results->result();
        }
        return null;
    }
    //--- Lay du lieu
    function getAllUser($off="",$limit=""){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('u_role','2');
        $this->db->limit($off,$limit);
        $this->db->order_by("u_id","asc");
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    // Tong so record
    function num_rows(){
        $this->db->where('u_role', '2');
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }
	//--- Lay thong tin 1 record qua id
    function getInfo($u_id){
        $this->db->where("u_id",$u_id);
        $query = $this->db->get($this->_table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- Kiem tra dang nhap
    //----------------------------- CHECK LOGIN
    function checkLogin($username,$password){
        $u = $username;
        $p = $password;
        $this->db->where("u_username",$u);
        $this->db->where("u_password",$p);
        $query = $this->db->get($this->_table);
        if($query->num_rows()==0){
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
    //--- Kiem tra Email
    function checkEmail($email,$id=""){
        
        if(isset($id) && $id!="")
        { //use for update
           $this->db->where("u_email",$email);
           $this->db->where("u_id !=",$id);
           $query = $this->db->get($this->_table);
        }
        else
        { //user for add
            $this->db->where("u_email",$email);
            $query = $this->db->get($this->_table);
        }
        
        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
        
    }
    //--- da kich hoat 
    function actived($u_id){
        $this->db->select("u_id,u_status");
        $this->db->where("u_id",$u_id);
        $query = $this->db->get($this->_table);
        $info  = $query->row_array();
        if($info){
            if($info['u_status']==1)
            return TRUE;
        else
            return FALSE;
        }
        else
        {
            return FALSE;
        }
    }
	// Add New Admin
	function addNewAdmin($user){
        if($this->db->insert($this->_table,$user))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat user
    function updateUser($data,$id){
        $this->db->where("u_id",$id);
        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //--- Xoa user
    function deleteUser($u_id){
        if($u_id!=1){
            $this->db->where("u_id",$u_id);
            $this->db->delete($this->_table);
        }
    }
    //---- Kiem tra username hop le
    function getUser($username,$id){
        if(isset($id)){ //use for update
           $this->db->where("u_username",$username);
           $this->db->where("u_id !=",$id);
           $query = $this->db->get($this->_table);
        }
        else{ //user for add
            $this->db->where("u_username",$username);
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
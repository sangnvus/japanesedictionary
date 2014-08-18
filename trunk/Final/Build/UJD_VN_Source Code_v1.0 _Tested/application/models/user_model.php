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
	function getListAdmin()
    {
		$results = null;
		// get from db				
		$txtQuery = 'SELECT * FROM user WHERE u_role = \'1\' AND u_id != \'1\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}

	function getListUser()
    {
		$results = null;
		// get from db				
		$txtQuery = 'SELECT * FROM user WHERE u_role = \'2\'';
		$results = $this->db->query($txtQuery);
		if ($results->num_rows() > 0) {			
			return $results->result();
		}
		return null;
	}
    function getUserByUsername($username, $email)
    {

        $username = ($username===null) ? "" : $username;
        $email = ($email===null) ? "" : $email;
        if (strpos($username,'%') !== false) {                        
            return null;
        }
        if (strpos($email,'%') !== false) {                        
            return null;
        }
        if ($username === "" && $email === "") {
            return null;
        }
        $results = null; 
        $txtQuery = '';        
        // get from db                
        if ($username !=="" && $email === "") {                        
            $txtQuery = 'SELECT * FROM user WHERE u_username LIKE \'%' . mysql_real_escape_string($username).'%\' AND u_role=\'2\'';    
        } 
        if ($username ==="" && $email !== "") {                    
            $txtQuery = 'SELECT * FROM user WHERE u_email LIKE \'%' . mysql_real_escape_string($email).'%\' AND u_role=\'2\'';
        }
        if ($username !=="" && $email !== "") {            
            $txtQuery = 'SELECT * FROM user WHERE u_username LIKE \'%'.mysql_real_escape_string($username).'%\' AND u_email LIKE \'%'.mysql_real_escape_string($email).'%\' AND u_role=\'2\'';
        }

        $results = $this->db->query($txtQuery);
        if ($results->num_rows() > 0) {
            return $results->result();
        }
        return null;
    }
    //--- Lay du lieu
    function getAllUser($off="", $limit="")
    {
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
    function num_rows()
    {
        $this->db->where('u_role', '2');
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }
	//--- Lay thong tin 1 record qua id
    function getInfo($u_id)
    {
        $this->db->where("u_id",$u_id);
        $query = $this->db->get($this->_table);
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    function getInfoTrackingMark($u_id)
    {
        $this->db->where("u_id",$u_id);
        $query = $this->db->get($this->_table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
    //--- Kiem tra dang nhap
    //----------------------------- CHECK LOGIN
    function checkLogin($username, $password)
    {
        
        $u = $username;
        $p = md5($password);
        $this->db->where("u_username",$u);
        $this->db->where("u_password",$p);
        $query = $this->db->get($this->_table);
        if ($query->num_rows()==0) {
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
    //--- Kiem tra Email
    function checkEmail($email, $id="")
    {
        
        if (isset($id) && $id!="") { //use for update
           $this->db->where("u_email",$email);
           $this->db->where("u_id !=",$id);
           $query = $this->db->get($this->_table);
        } else { //user for add
            $this->db->where("u_email",$email);
            $query = $this->db->get($this->_table);
        }
        
        if ($query->num_rows()!=0) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    //--- da kich hoat 
    function actived($u_id)
    {
        $this->db->select("u_id,u_status");
        $this->db->where("u_id",$u_id);
        $query = $this->db->get($this->_table);
        $info  = $query->row_array();
        if ($info) {
            if ($info['u_status'] == 1)
            return TRUE;
        else
            return FALSE;
        } else {
            return FALSE;
        }
    }
	// Add New Admin
	function addNewAdmin($user)
    {
        if($this->db->insert($this->_table,$user))
            return TRUE;
        else
            return FALSE;
    }
    //--- Cap nhat user
    function updateUser($data,$u_id)
    {
        $this->db->where("u_id",$u_id);
        if($this->db->update($this->_table,$data))
            return TRUE;
        else
            return FALSE;
    }
    //--- Xoa user
    function deleteUser($u_id)
    {
        if ($u_id != 1) {
            if ($this->checkTrackingMark($u_id) == true) {
                $this->db->where("u_id",$u_id);
                $this->db->delete("trackingmark");
                $this->db->where("u_id",$u_id);
                $this->db->delete($this->_table);
            } else { 
                $this->db->where("u_id",$u_id);
                $this->db->delete($this->_table);         
            }                        
        }
    }
    function checkTrackingMark($u_id)
    {
        if (!is_null($u_id)) {
            $this->db->where("u_id",$u_id);
            $query = $this->db->get("trackingmark");
            if ($query->num_rows() != 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }        
    }
    //---- Kiem tra username hop le
    function getUser($username, $id)
    {
        if (isset($id)) { //use for update
           $this->db->where("u_username",$username);
           $this->db->where("u_id !=",$id);
           $query = $this->db->get($this->_table);
        } else { //user for add
            $this->db->where("u_username",$username);
            $query = $this->db->get($this->_table);
        }
        
        if ($query->num_rows() != 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //DatPT
    function addUser($user)
    {
    if($this->db->insert($this->_table,$user))
            return TRUE;
        else
            return FALSE;
    }

    // add opinion
    function add_contactopinion($data)
    {
        if($this->db->insert('contact',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function add_contactQA($data)
    {
        if($this->db->insert('contact',$data))
                return TRUE;
            else
                return FALSE;
    }
    public function contribute_vocab($vocab)
    {
            if($this->db->insert('vocabulary',$vocab))
                return TRUE;
            else
                return FALSE;
    }
    public function contribute_mean($mean)
    {
        
        if($this->db->insert('meaning',$mean))
            return TRUE;
        else
            return FALSE;
    }
    public function contribute_kanji($kanji)
    {
        if($this->db->insert('kanji',$kanji))
            return TRUE;
        else
            return FALSE;
    }
    public function contribute_grammar($grammar)
    {
        if($this->db->insert('grammar',$grammar))
            return TRUE;
        else
            return FALSE;
    }
    public function resetpassword($user)
    {
        date_default_timezone_set('GMT');
        $this->load->helper('string');
        $password= random_string('alnum', 16);
        $this->db->where('u_id', $user->u_id);
        $this->db->update('user',array('u_password'=>MD5($password)));
        $this->load->library('email');
        $this->email->from('datptse02336@gmail.com', 'Japanese Dictionary');
        $this->email->to($user->u_email);   
        $this->email->subject('Password reset');
        $this->email->message('---------You have requested the new password, Here is you new password:'. $password); 
        $this->email->send();
        }
    // Add Facebook User To Database
    function addUserFacebook($user)
    {
        if($this->db->insert("user_facebook",$user))
            return TRUE;
        else
            return FALSE;
    }
    function checkFacebookId($facebook_id)
    {        
        $this->db->where("facebook_id",$facebook_id);
        $query = $this->db->get("user_facebook");
        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function getFacebookInfo($facebook_id)
    {
        $this->db->where("facebook_id",$facebook_id);
        $query = $this->db->get("user_facebook");
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
}
?>

<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_Auth extends CI_Session
{
    var $CI;
    var $_model;
    
    function __construct(){
        parent::__construct();
        $CI =& get_instance();
        
        $this->_model = $CI;
        $this->_model->load->database();
        $this->_model->load->model("User_model");
    }
    
    function is_Admin(){
        
        $info = $this->_model->User_model->getInfo($this->userdata("u_id"));
        
        if($this->is_Login() && $info['u_role']==1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    function is_Active($u_id)
    {
        if($this->_model->User_model->actived($u_id))
            return TRUE;
        else
            return FALSE;
    }
    
    function is_Login(){
        
        if($this->userdata("u_username") && $this->userdata("u_username")!=""
                && $this->userdata("u_id") && $this->userdata("u_id")!="")
            return TRUE;
        else
            return FALSE;
    }
    
    function __get($var)
    {
        return $this->userdata($var);

    }
    
    
}
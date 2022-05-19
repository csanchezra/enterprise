<?php
class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function login_validacion($data)
    {

    
        $this->db->select('id', FALSE);
        $this->db->from('usuarios', FALSE);
        $this->db->where($data);
        $query = $this->db->get();
    
        return $query->num_rows();
    } // login_validacion()




}// class
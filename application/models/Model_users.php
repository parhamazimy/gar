<?php
class model_users extends CI_Model
{
    public $table;

    function __construct()
    {
        parent::__construct();
        $this->load->database();//db 1
       $this->table = 'users';
    }
    function login($username,$pass){
        $this->db->where('nationalcode',$username);
        $this->db->where('password',$pass);
        return $this->db->get( $this->table )->row() ;
    }


}
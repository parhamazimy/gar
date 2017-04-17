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
    function find($id){
        $this->db->where('id',$id);
        return $this->db->get($this->table)->row();
    }
    public function update($array,$where)
    {
        $this->db->where('id',$where);
        $this->db->update($this->table, $array);
        return $this->db->affected_rows();
    }
    public function insert($array)

    {

         $this->db->insert($this->table,$array);
         return $this->db->insert_id();

    }
    function delete($id)

    {

        $this->db->where('id', $id);

        return $this->db->delete($this->table);

    }
    function all(){
        $this->db->where('access !=',0);
        return $this->db->get($this->table)->result();
    }
    function access($access){
        $this->db->where('access',$access);
        return $this->db->get($this->table)->result();
    }


    function findwhere($where,$val){
        $this->db->where('access !=',0);
        $this->db->where($where,$val);
        return $this->db->get($this->table)->result();
    }



}
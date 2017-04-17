<?php
class model_vacations extends CI_Model
{
    public $table;

    function __construct()
    {
        parent::__construct();
        $this->load->database();//db 1
        $this->table = 'vacations';
    }

    public function insert($array)

    {

        $this->db->insert($this->table,$array);
        return $this->db->insert_id();

    }

    public function vacations($access)

    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status < ', 5);
        $this->db->where('users.access ', $access);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();

    }
    public function mission($access)

    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status', 6);
        $this->db->where('users.access ', $access);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();

    }

    public function delay($access)

    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status', 7);
        $this->db->where('users.access ', $access);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();

    }

    function delete($id)

    {

        $this->db->where('id', $id);

        return $this->db->delete($this->table);

    }




}
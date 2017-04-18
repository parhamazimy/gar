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



    public function findwhere($column,$val)
    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where($column,$val);
        $this->db->where('status < ', 5);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();
    }
    public function solder_mission($userid)
    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status', 6);
        $this->db->where('userid', $userid);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();
    }

    public function vacations($access)

    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status < ', 5);
        $this->db->or_where('status',8);
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

    function soldier_delay($userid)
    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status', 7);
        $this->db->where('userid', $userid);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();
    }
    function absent($access)
    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status !=', 5);
        $this->db->where('times <',time());
        $this->db->where('timef >',time());
        $this->db->where('users.access ', $access);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();
    }
    function soldier_absent($access)
    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where('status', 8);
        $this->db->where('times <',time());

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
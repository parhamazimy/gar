<?php
class model_event extends CI_Model
{
    public $table;

    function __construct()
    {
        parent::__construct();
        $this->load->database();//db 1
        $this->table = 'event';
    }

    function finder($id){
        $this->db->where('`event`.`id`',$id);
        $this->db->select(' * ,event.id AS vacationsid');
        $this->db->join('users', 'users.id = event.userid');
        return  $this->db->get($this->table)->row();

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
    public function all()

    {
        $this->db->select(' * ,event.id AS vacationsid');

        $this->db->join('users', 'users.id = event.userid');
        return  $this->db->get($this->table)->result();

    }



    public function findwhere($column,$val)
    {
        $this->db->select(' * ,vacations.id AS vacationsid');
        $this->db->where($column,$val);
        $this->db->where('status < ', 5);
        $this->db->join('users', 'users.id = vacations.userid');
        return  $this->db->get($this->table)->result();
    }





}
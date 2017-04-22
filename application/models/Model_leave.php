<?php

class model_leave extends CI_Model
{
    public $table;

    function __construct()
    {
        parent::__construct();
        $this->load->database();//db 1
        $this->table = 'leave';
    }
    function delete($id)

    {

        $this->db->where('leaveid', $id);

        return $this->db->delete($this->table);

    }

    public function insert($array)

    {

        $this->db->insert($this->table,$array);
        return $this->db->insert_id();

    }

    function all()
    {
        $this->db->select(' * ');

        $this->db->join('units', 'units.id = leave.unitid');

        return  $this->db->get($this->table)->result();

    }

}
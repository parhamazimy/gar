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

    public function insert($array)

    {

        $this->db->insert($this->table,$array);
        return $this->db->insert_id();

    }
    public function all()

    {
        $this->db->select(' * ,users.name AS cadrename , users.family AS cadrefamily , users.rating AS cadrerating , users.access AS cadreaccess');

        $this->db->join('users', 'users.id = event.userid');
        $this->db->join('units', 'units.id = event.unitid');

        return  $this->db->get($this->table)->result();

    }
    function delete($id)

    {

        $this->db->where('eventid', $id);

        return $this->db->delete($this->table);

    }



    //--------------\\
    function finder($id){
        $this->db->where('`event`.`id`',$id);
        $this->db->select(' * ,event.id AS vacationsid');
        $this->db->join('users', 'users.id = event.userid');
        return  $this->db->get($this->table)->row();

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
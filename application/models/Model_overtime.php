<?php
class model_overtime extends CI_Model
{
    public $table;

    function __construct()
    {
        parent::__construct();
        $this->load->database();//db 1
        $this->table = 'overtime';
    }

    public function all($access)

    {
        $this->db->select(' * ,overtime.id AS overtimeid');
        $this->db->where('users.access ', $access);
        $this->db->join('users', 'users.id = overtime.userid');
        return  $this->db->get($this->table)->result();

    }

    public function solder_overtime($userid)
    {
        $this->db->select(' * ,overtime.id AS overtimeid');
        $this->db->where('userid', $userid);
        $this->db->join('users', 'users.id = overtime.userid');
        return  $this->db->get($this->table)->result();
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




}
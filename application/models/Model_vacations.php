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




}
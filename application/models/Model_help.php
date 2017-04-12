<?php
class model_help extends CI_Model
{
    public $db2 =null;
    public $table ;
    function __construct()
    {
        parent::__construct();
        $this->load->database();//db 1
        $this->db2 = $this->load->database('pdo',true);//db2
    }
    function multidb()
    {
      $ress = $this->db->get('gg')->result();
      $data = array();
      $out = array();

      foreach ($ress as $item){

          $data['id']=$item->id;
          $data['name']=$item->name;
          $data['getid']=$item->getid;
          $this->db2->where('id',$item->getid);
          $ress =  $this->db2->get('gg2')->result();
          $data['adress'] =  $ress[0]->adress;
          $data['cat'] =  $ress[0]->cat;
          $out[] = $data;
      }
      foreach ($out as $value){
          echo 'id:'.$value['id'].'///name:'.$value['name'].'///getid:'.$value['getid'].'///adress:'.$value['adress'].'///cat:'.$value['cat'];
          echo "<hr>";
      }
    }

    public function update($array)
    {
        $this->db->update($this->table, $array);
        return $this->db->affected_rows();
    }
    public function one()
    {
        return $this->db->get($this->table)->row();//faghat yeki

    }
    public function all(){

        return $this->db->get($this->table)->result();

    }
    public function insert($array)

    {

        return $this->db->insert($this->table,$array);

    }
    function delete($id)

    {

        $this->db->where('id', $id);

        return $this->db->delete($this->table);

    }
    public function now_rows(){

        return $this->db->get($this->table)->num_rows();

    }
    public function jointable()

    {

        $time = time();

        $this->db->select('*');

        $this->db->from($this->table);

        $this->db->join('room', 'room.id = reserve.idroom');

        $this->db->where('times <',$time);

        $this->db->where('timef >', $time);

        return $this->db->get()->result();

    }
    public function sum()

    {

        $this->db->select('SUM(total) AS kol', FALSE);

        return  $this->db->get($this->table)->row();

    }
    public function count(){
        return $this->db->count_all($this->table);
    }



}
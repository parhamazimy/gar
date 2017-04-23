<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class printer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('time');

        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
        if($this->session->userdata('access') == 1 or $this->session->userdata('access') == 3){
            die();
        }
        if(!$this->input->post('printid') ){
            die();
        }
    }

    function event(){

        $this->load->model('model_event');


        $print = $this->model_event->find($this->input->post('printid'));
        if($print == null) die();
        if($print->stat == 1){
            include  __DIR__ . '/../views/printer/tashvigh.php';
        }
        if($print->stat == 2){
            include  __DIR__ . '/../views/printer/tanbih.php';
        }
        if($print->stat == 0){
            include  __DIR__ . '/../views/printer/punish.php';
        }



    }
    //
    function vacation(){

        $this->load->model('model_vacations');


        $print = $this->model_vacations->find($this->input->post('printid'));
        if($print == null) die();
        if($print->status == 0){
            include  __DIR__ . '/../views/printer/vacation.php';
        }
        if($print->status == 6){
            include  __DIR__ . '/../views/printer/mission.php';
        }
        if($print->status == 7){
            echo "<h1 dir='rtl' style='margin: 20px auto;width: 90%;text-align: center'>تاخیر دارای برگه چاپی نمی باشد .</h1>";
        }



    }
    //
    function leave(){

        $this->load->model('model_leave');


        $print = $this->model_leave->find($this->input->post('printid'));
        if($print == null) die();
        echo"
        <style>
        input,label,body{
        font-family: 'B Lotus';
        }
        </style>
        ";
        if($print->condition == '0'){
            include  __DIR__ . '/../views/printer/lvacation.php';
        }
        elseif($print->condition == 'استعلاجی'){
            include  __DIR__ . '/../views/printer/evacation.php';
        }
        else{
            include  __DIR__ . '/../views/printer/mvacation.php';
        }



    }



















    //-------------------------\\
    function mission(){
            $this->load->model('model_vacations');


             $print = $this->model_vacations->finder($this->input->post('printid'));

            include  __DIR__ . '/../views/printer/mission.php';



    }






}
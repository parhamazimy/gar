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
    function mission(){
            $this->load->model('model_vacations');


             $print = $this->model_vacations->finder($this->input->post('printid'));

            include  __DIR__ . '/../views/printer/mission.php';



    }
    function vacation(){
        $this->load->model('model_vacations');


        $print = $this->model_vacations->finder($this->input->post('printid'));

        include  __DIR__ . '/../views/printer/vacation.php';

    }

    function event(){

        $this->load->model('model_event');


        $print = $this->model_event->finder($this->input->post('printid'));

        include  __DIR__ . '/../views/printer/event.php';

    }



}
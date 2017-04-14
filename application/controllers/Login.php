<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
        $this->load->helper('form');
    }
    function index()
    {
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
        if(  true ){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'نام کاربری', 'required');
            $this->form_validation->set_rules('pass', 'رمز عبور', 'required');
            if ($this->form_validation->run() == FALSE)
            {
               $this->blade->data('message', validation_errors()) ;
            }
            else
            {
                $this->load->model('model_users');
                $users = $this->model_users->login($this->input->post('username'), $this->input->post('pass') );
                if( ! $users ){
                    $this->blade->data('message','نام کاربری یا رمز عبور اشتباه می باشد .');
                }else{
                    var_dump($users);
                }

            }
        }
        $this->blade->display('login');
    }

}
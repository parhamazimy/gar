<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cadre extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }elseif( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){
            $this->blade->data('img',$this->session->userdata('pic'));
            $this->blade->data('id',$this->session->userdata('id'));
            $this->blade->data('name',$this->session->userdata('name'));
            $this->blade->data('family',$this->session->userdata('family'));

        }else{
            redirect('login');
        }
    }
    function index()
    {
        $this->blade->data('title','پروفایل');
        $this->blade->display('cadre.profile');
    }

}
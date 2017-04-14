<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }elseif( $this->session->userdata('access') != 0){
            redirect('login');
        }
    }

    public function index()
    {
        $this->blade->data('title','داشبورد پنل مدیریت');
        $this->blade->display('admin.profile');


    }
}

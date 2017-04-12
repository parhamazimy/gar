<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller
{
    function index()
    {
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
        $this->blade->display('login');
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
    }
    function index()
    {
        $this->blade->data( 'title' , 'پنل کاربری' );
        $this->blade->display('user.masteruser');
    }


}
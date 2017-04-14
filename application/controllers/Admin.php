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
        $this->load->model('model_users');

        if($this->input->post('blood') and $this->input->post('tell')){
            $ress = $this->model_users->update($this->input->post());
            if($ress){
                $this->blade->data('message','تغییرات ثبت شد .');
            }else{
                $this->blade->data('message','تغییر انجام نشد .');
            }
        }
        $user = $this->model_users->find($this->session->userdata('id'));
        $this->blade->data('user',$user);
        $this->blade->display('admin.profile');


    }
}

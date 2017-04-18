<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class soldier extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->blade->data( 'root' , base_url() );
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }elseif( $this->session->userdata('access') == 1 or $this->session->userdata('access') == 3){
            $this->blade->data('img',$this->session->userdata('pic'));
            $this->blade->data('id',$this->session->userdata('id'));
            $this->blade->data('name',$this->session->userdata('name'));
            $this->blade->data('family',$this->session->userdata('family'));

        }else{
            redirect('login');
        }

    }
    ///////////////////////////
    //
    /////////////////////////
    public function index()
    {
        $this->blade->data('title','پروفایل');
        $this->load->model('model_users');

        if($this->input->post('blood') and $this->input->post('tell')){
            $ress = $this->model_users->update($this->input->post(),$this->session->userdata('id'));
            if($ress){
                $this->blade->data('message','تغییرات ثبت شد .');
            }else{
                $this->blade->data('message','تغییر انجام نشد .');
            }
        }
        //pas
        if($this->input->post('new') != null and $this->input->post('old')){
            $this->form_validation->set_rules('new','new','required');
            $this->form_validation->set_rules('old','old','required');
            $this->form_validation->set_rules('rep','rep','required');
            if($this->form_validation->run()){
                if($this->input->post('new') != $this->input->post('rep')){
                    $this->blade->data('message','رمز عبور جدید با تکرار رمز عبور تطابق ندارد.');
                }
                else{
                    $all = $this->model_users->find($this->session->userdata('id'));
                    $oldpass =  $all->password;
                    if($oldpass != $this->input->post('old')){
                        $this->blade->data('message','رمز خود را اشتباه وارد کرده اید.');
                    }else{
                        $newpass = $this->input->post('new');
                        $change = $this->model_users->update(['password'=>$newpass],$this->session->userdata('id'));
                        if($change){
                            $this->blade->data('message','رمز تغییر کرد.');
                        }else{
                            $this->blade->data('message','رمز تغییر نکرد خطا');
                        }

                    }
                }
            }
        }
        $this->blade->display('soldier.profile');
    }
    ///////////////////////
    //
    /////////////////////
    function vacations()
    {
        $this->load->helper('time');
        $this->load->model('model_vacations');

        $vacations = $this->model_vacations->findwhere('userid',$this->session->userdata('id'));
        $this->blade->data('vacations',$vacations);
        $this->blade->data('title','لیست مرخصی ها');
        $this->blade->display('soldier.vacations');
    }
    ///////////////////////
    //
    ////////////////////////
    function mission()
    {
        $this->load->helper('time');
        $this->load->model('model_vacations');

        $vacations = $this->model_vacations->solder_mission($this->session->userdata('id'));
        $this->blade->data('title','لیست ماموریت ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('soldier.mission');
    }
    //////////////////////
    //
    //////////////////////
    function overtime()
    {
        $this->load->helper('time');
        $this->load->model('model_overtime');

        $vacations = $this->model_overtime->solder_overtime($this->session->userdata('id'));
        $this->blade->data('title','لیست اضافه خدمت  ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('soldier.overtime');
    }
    ////////////////////
    //
    //////////////////
    function absent()
    {
        $this->load->helper('time');
        $this->load->model('model_vacations');

        $vacations = $this->model_vacations->soldier_absent($this->session->userdata('access'));
        $this->blade->data('title','لیست غیبت ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('soldier.absent');
    }
    //////////////////.
    //
    /////////////////
    function delay()
    {
        $this->load->helper('time');
        $this->load->model('model_vacations');

        $vacations = $this->model_vacations->soldier_delay($this->session->userdata('id'));
        $this->blade->data('title','لیست تاخیر ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('soldier.delay');
    }


}

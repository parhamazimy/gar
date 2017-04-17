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
        //upload
        if(isset($_FILES['userfile'])){
            $config['upload_path']          = './public/img/users/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1024;
            $config['max_width']            = 1920;
            $config['max_height']           = 1080;
            $config['file_name']           =   $this->session->userdata('id');
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1024;
            $config['max_width']            = 1920;
            $config['max_height']           = 1080;
            $config['file_name']           = $this->session->userdata('id').$this->session->userdata('username');
            $config['overwrite']           = true;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
            {
                $error =  $this->upload->display_errors();
                $this->blade->data('message',$error);
            }else{
                $path = $this->upload->data('file_name');
                $upload = $this->model_users->update(['pic'=>$path],$this->session->userdata('id'));
                if($upload){
                    $this->blade->data('message','آپلود با موفقیت انجام شد .');
                }else{
//                     $this->blade->data('message','خطادر پایگاه داده');
                    $this->blade->data('message','آپلود با موفقیت انجام شد .!!');

                }
                $this->session->set_userdata('pic',$path);
                $this->blade->data('img',$path);
            };
        }
        //
        $user = $this->model_users->find($this->session->userdata('id'));
        $this->blade->data('user',$user);

        $this->blade->display('cadre.profile');
    }


    /////////////////////////
    //
    ////////////////////////


    function vacations()
    {
        $this->blade->data('title','ثبت مرخصی');
        $this->load->model('model_users');
        //post
        if($this->input->post('htimes')){
            $this->load->model('model_vacations');
            $this->load->helper('time');
            //////////////
            $htimef = explode(':',$this->input->post('htimef'));
            $timef = explode('/',$this->input->post('timef'));
            $timef = make_time($htimef[0],$htimef[1],0,$timef[1],$timef[2],$timef[0]);
            /////////////////////////
            $htimes = explode(':',$this->input->post('htimes'));
            $times = explode('/',$this->input->post('times'));
            $times = make_time($htimes[0],$htimes[1],0,$times[1],$times[2],$times[0]);
            ///
            $arraypost = $this->input->post();
            unset($arraypost['htimes']);
            unset($arraypost['htimef']);
            $arraypost['times'] = $times ;
            $arraypost['timef'] = $timef ;
            $ress = $this->model_vacations->insert($arraypost);
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        //end post


        $access = $this->session->userdata('access') - 1 ;
        $users = $this->model_users->findwhere('access ',$access);
        $this->blade->data('users',$users);
        $this->blade->display('cadre.vacations');
    }
    ////////////////////////
    ///
    ////////////////////////////

    function mission()
    {
        $this->blade->data('title','ثبت ماموریت');
        $this->load->model('model_users');
        //post
        if($this->input->post('htimes')){
            $this->load->model('model_vacations');
            $this->load->helper('time');
            //////////////
            $htimef = explode(':',$this->input->post('htimef'));
            $timef = explode('/',$this->input->post('timef'));
            $timef = make_time($htimef[0],$htimef[1],0,$timef[1],$timef[2],$timef[0]);
            /////////////////////////
            $htimes = explode(':',$this->input->post('htimes'));
            $times = explode('/',$this->input->post('times'));
            $times = make_time($htimes[0],$htimes[1],0,$times[1],$times[2],$times[0]);
            ///
            $arraypost = $this->input->post();
            unset($arraypost['htimes']);
            unset($arraypost['htimef']);
            $arraypost['times'] = $times ;
            $arraypost['timef'] = $timef ;
            $ress = $this->model_vacations->insert($arraypost);
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        //end post


        $access = $this->session->userdata('access') - 1 ;
        $users = $this->model_users->findwhere('access ',$access);
        $this->blade->data('users',$users);
        $this->blade->display('cadre.mission');

    }
    //////////////////////////
    ///
    ////////////////////////////
    function delay()
    {
        $this->blade->data('title','ثبت تاخیر');
        $this->load->model('model_users');
        //post
        if($this->input->post('htimes')){
            $this->load->model('model_vacations');
            $this->load->helper('time');
            //////////////
            $htimef = explode(':',$this->input->post('htimef'));
            $timef = explode('/',$this->input->post('timef'));
            $timef = make_time($htimef[0],$htimef[1],0,$timef[1],$timef[2],$timef[0]);
            /////////////////////////
            $htimes = explode(':',$this->input->post('htimes'));
            $times = explode('/',$this->input->post('times'));
            $times = make_time($htimes[0],$htimes[1],0,$times[1],$times[2],$times[0]);
            ///
            $arraypost = $this->input->post();
            unset($arraypost['htimes']);
            unset($arraypost['htimef']);
            $arraypost['times'] = $times ;
            $arraypost['timef'] = $timef ;
            $ress = $this->model_vacations->insert($arraypost);
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        //end post


        $access = $this->session->userdata('access') - 1 ;
        $users = $this->model_users->findwhere('access ',$access);
        $this->blade->data('users',$users);
        $this->blade->display('cadre.delay');

    }
    function vacations_list()
    {
        $this->load->helper('time');
        $this->load->model('model_vacations');
        if($this->input->post('deleteid')){

            $ressdel = $this->model_vacations->delete($this->input->post('deleteid'));
            if($ressdel){
                $this->blade->data('message','حذف شد .');
            }else{
                $this->blade->data('message','خطا در حذف .');
            }
        }
        $vacations = $this->model_vacations->vacations($this->session->userdata('access')- 1);
        $this->blade->data('vacations',$vacations);
        $this->blade->data('title','لیست مرخصی ها');
        $this->blade->display('cadre.vacations_list');
    }


}
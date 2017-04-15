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

        $this->blade->data('img',$this->session->userdata('pic'));
        $this->blade->data('id',$this->session->userdata('id'));
        $this->blade->data('name',$this->session->userdata('name'));
        $this->blade->data('family',$this->session->userdata('family'));
    }

    public function index()
    {
        $this->blade->data('title','داشبورد پنل مدیریت');
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
                   // $this->blade->data('message','خطادر پایگاه داده');
                    $this->blade->data('message','آپلود با موفقیت انجام شد .!!');
                }
                $this->session->set_userdata('pic',$path);
                $this->blade->data('img',$path);
            };
        }
        //
        $user = $this->model_users->find($this->session->userdata('id'));
        $this->blade->data('user',$user);
        $this->blade->display('admin.profile');


    }
}

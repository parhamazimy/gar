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
        $this->load->helper('time');

        if( $this->input->post('tell')){
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
    //////////////////////
    //
    ////////////////////////
    function register()
    {
        $this->load->helper('time');
        $this->load->model('model_units');
        if($this->input->post('nationalcode') and $this->input->post('fieldofStudy')){

            $arrayinsert = $this->input->post();


            $timearrival = register_helper($this->input->post('timearrival'));
            $timedispatch = register_helper($this->input->post('timedispatch'));
            $timefinish = register_helper($this->input->post('timefinish'));
            $timelastfinish = register_helper($this->input->post('timelastfinish'));


            $arrayinsert['timearrival'] = $timearrival;
            $arrayinsert['timedispatch'] = $timedispatch;
            $arrayinsert['timefinish'] = $timefinish;
            $arrayinsert['timelastfinish'] = $timelastfinish;

            $insertid = $this->model_units->insert($arrayinsert);

            //upload
            if(isset($_FILES['userfile']) and !empty($insertid)){
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
                $config['file_name']           = $insertid;
                $config['overwrite']           = true;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error =  $this->upload->display_errors();
                    $this->model_units->delete($insertid);
                    $this->blade->data('message',$error);
                }else{
                    $path = $this->upload->data('file_name');
                    $upload = $this->model_units->update(['pic'=>$path],$insertid);
                    if($upload){
                        $this->blade->data('message','ثبت نام با موفقیت انجام شد .');
                    }else{
                        // $this->blade->data('message','خطادر پایگاه داده');
                        $this->blade->data('message','ثبت نام با موفقیت انجام شد .!!');
                    }
                }
            }else{
                $this->blade->data('message','خطا .!!');
            }
            //

        }
        $this->blade->data('title','ثبت نیرو');
        $this->blade->display('cadre.register');

    }


    /////////////////////////
    //
    ////////////////////////
    function units()
    {
        $this->load->model('model_units');
        if($this->input->post('deleteid')){
            $result = $this->model_units->delete($this->input->post('deleteid'));
            if($result){
                $this->blade->data('message','حذف شد');
            }else{
                $this->blade->data('message','خطا');
            }
        }
        $this->load->helper('time');
        $this->blade->data('title','مدیریت کاربران');

        $users = $this->model_units->all();
        $this->blade->data('users',$users);
        $this->blade->display('cadre.units');
    }
    //////////////////////////////////
    //
    ///////////////////////////////
    function edit()
    {
        $this->blade->data('title','ویرایش نیروها');
        $this->load->helper('time');
        if(!$this->input->post('editid')){
            redirect('cadre/units');
        }
        $this->load->model('model_units');
        $user = $this->model_units->find($this->input->post('editid'));
        if(!$user){
            redirect('cadre/users');
        }
        //update
        if($this->input->post('weight')){
            $arrayinsert = $this->input->post();
            unset($arrayinsert['editid']);
            $timedispatch = register_helper($this->input->post('timedispatch'));
            $timearrival = register_helper($this->input->post('timearrival'));
            $timefinish = register_helper($this->input->post('timefinish'));
            $timelastfinish = register_helper($this->input->post('timelastfinish'));

            $arrayinsert['timedispatch'] = $timedispatch;
            $arrayinsert['timearrival'] = $timearrival;
            $arrayinsert['timefinish'] = $timefinish;
            $arrayinsert['timelastfinish'] = $timelastfinish;
            $update = $this->model_units->update($arrayinsert,$this->input->post('editid'));

            if($update){
                $this->blade->data('message','انجام شد');
            }else{
                $this->blade->data('message','تغییری ثبت نشد');
            }
        }
        //
        $user = $this->model_units->find($this->input->post('editid'));
        $this->blade->data('user',$user);
        $this->blade->display('cadre.edit');
    }
    //////////////////////////////
    //
    //////////////////////////////
    function event2()
    {
        $this->blade->data('title','ثبت رویداد نوع 2');
        $this->load->model('model_units');
        //post
        if($this->input->post('status') != null){
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
            $arraypost['inserttime'] = time() ;
            //
            if($this->input->post('status') != 6) {
                $arraypost['type'] = '-' ;
            }

            //
            $ress = $this->model_vacations->insert($arraypost);
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        //end post


        $access = $this->session->userdata('access') - 1 ;
        $users = $this->model_units->all();
        $this->blade->data('users',$users);
        $this->blade->display('cadre.event2');
    }
    ////////////////////////
    //
    //////////////////////
    function event2_list()
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
        $vacations = $this->model_vacations->all();
        $this->blade->data('vacations',$vacations);
        $this->blade->data('title','لیست رویداد ها');
        $this->blade->display('cadre.event2_list');
    }
    ///////////////////////
    //
    //////////////////////
    function event()
    {
        $this->blade->data('title','ثبت رویداد نوع 1');
        $this->load->model('model_units');
        $this->load->model('model_event');
        //post
        if($this->input->post('stat') != null){
            $this->load->model('model_vacations');
            $this->load->helper('time');
            //////////////
            $timef = explode('/',$this->input->post('timef'));
            $timef = make_time(0,0,0,$timef[1],$timef[2],$timef[0]);
            /////////////////////////
            $times = explode('/',$this->input->post('times'));
            $times = make_time(0,0,0,$times[1],$times[2],$times[0]);
            ///
            $arraypost = $this->input->post();

            $arraypost['times'] = $times ;
            $arraypost['timef'] = $timef ;
            $arraypost['userid'] = $this->session->userdata('id') ;
            $arraypost['inserttime'] = time() ;
            //
            if($this->input->post('stat') == 0) {
                $arraypost['action'] = '-' ;
            }else{
                $arraypost['times'] = '-' ;
                $arraypost['timef'] = '-' ;
                $arraypost['delay'] = '-' ;
            }

            //
            $ress = $this->model_event->insert($arraypost);
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        //end post



        $users = $this->model_units->all();
        $this->blade->data('users',$users);
        $this->blade->display('cadre.event');

    }
    ///////////////////////
    //
    /////////////////////////
    function event_list()
    {

        $this->load->helper('time');
        $this->load->model('model_event');
        if($this->input->post('deleteid')){

            $ressdel = $this->model_event->delete($this->input->post('deleteid'));
            if($ressdel){
                $this->blade->data('message','حذف شد .');
            }else{
                $this->blade->data('message','خطا در حذف .');
            }
        }
        $vacations = $this->model_event->all();
        $this->blade->data('vacations',$vacations);
        $this->blade->data('title','لیست رویداد ها');
        $this->blade->display('cadre.event_list');
    }
    ////////////////////////////////
    //
    ////////////////////////////////
    function leave()
    {
        $this->blade->data('title','ثبت رویداد نوع 1');
        $this->load->model('model_units');
        $this->load->model('model_leave');
        //post
        if($this->input->post('condition') != null){

            $this->load->helper('time');
            //////////////
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

            if($this->input->post('condition') != '0'){
                unset($arraypost['closures']);
                unset($arraypost['entitlement']);
                unset($arraypost['way']);
                unset($arraypost['encouragement']);
                unset($arraypost['rest']);
                //
                $arraypost['closures'] = '-' ;
                $arraypost['entitlement'] = '-' ;
                $arraypost['way'] = '-' ;
                $arraypost['encouragement'] = '-' ;
                $arraypost['rest'] = '-' ;
            }
            $arraypost['times'] = $times ;
            $arraypost['timef'] = $timef ;
            $arraypost['inserttime'] = time() ;
            //

            //
            $ress = $this->model_leave->insert($arraypost);
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        //end post



        $users = $this->model_units->all();
        $this->blade->data('users',$users);
        $this->blade->display('cadre.leave');
    }
    //////////////////////////
    //
    //////////////////////////////////
    function leave_list()
    {
        $this->load->helper('time');
        $this->load->model('model_leave');
        if($this->input->post('deleteid')){

            $ressdel = $this->model_leave->delete($this->input->post('deleteid'));
            if($ressdel){
                $this->blade->data('message','حذف شد .');
            }else{
                $this->blade->data('message','خطا در حذف .');
            }
        }
        $vacations = $this->model_leave->all();
        $this->blade->data('vacations',$vacations);
        $this->blade->data('title','لیست مرخصی  ها');
        $this->blade->display('cadre.leave_list');

    }



















    //----------------------------\\

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
    //////////////////////////////////
    ///
    ////////////////////////////////

    function mission_list()
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
        $vacations = $this->model_vacations->mission($this->session->userdata('access')- 1);
        $this->blade->data('title','لیست ماموریت ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('cadre.mission_list');
    }
    //////////////////////////
    //
    ///////////////////////////
    function delay_list()
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
        $vacations = $this->model_vacations->delay($this->session->userdata('access')- 1);
        $this->blade->data('title','لیست تاخیر ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('cadre.delay_list');
    }
    ////////////////////////////
    //
    /////////////////////////////

    function absent()
    {
        $this->load->helper('time');
        $this->load->model('model_vacations');

        $vacations = $this->model_vacations->absent($this->session->userdata('access')- 1);
        $this->blade->data('title','لیست غیبت ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('cadre.absent');
    }

    //////////////////////////
    //
    ////////////////////////
    function overtime()
    {
        $this->load->helper('time');
        $this->load->model('model_overtime');
        if($this->input->post('time')){
            $ress = $this->model_overtime->insert($this->input->post());
            if($ress){
                $this->blade->data('message','ثبت شد');
            }else{
                $this->blade->data('message','خطا در ثبت ');
            }
        }
        $this->load->model('model_users');
        $this->blade->data('title','ثبت اضافه خدمت');
        $access = $this->session->userdata('access') - 1 ;
        $users = $this->model_users->findwhere('access ',$access);
        $this->blade->data('users',$users);



        $this->blade->display('cadre.overtime');
    }
    /////////////////////
    ///
    /////////////////////
    function overtime_list()
    {
        $this->load->helper('time');
        $this->load->model('model_overtime');
        if($this->input->post('deleteid')){

            $ressdel = $this->model_overtime->delete($this->input->post('deleteid'));
            if($ressdel){
                $this->blade->data('message','حذف شد .');
            }else{
                $this->blade->data('message','خطا در حذف .');
            }
        }
        $vacations = $this->model_overtime->all($this->session->userdata('access')- 1);
        $this->blade->data('title','لیست اضافه خدمت  ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('cadre.overtime_list');
    }
    ///////////////////////////////
    //
    /////////////////////////////

    /////////////////////////////////
    //
    /////////////////////////////////

    function eventss()

    {
        $this->blade->data('title','ثبت رویداد');
        $this->load->model('model_users');
        //post
        if($this->input->post('time')){
            $this->load->model('model_event');
            $this->load->helper('time');


            $arraypost = $this->input->post();

            $arraypost['cadreid'] = $this->session->userdata('id') ;
            $arraypost['namecadre'] = $this->session->userdata('name') ;
            $arraypost['familycadre'] =$this->session->userdata('family') ;
            $ress = $this->model_event->insert($arraypost);
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
        $this->blade->display('cadre.event');
    }
    /////////////////////
    ///
    /////////////////////
    function tevent_list()
    {
        $this->load->helper('time');
        $this->load->model('model_event');
        if($this->input->post('deleteid')){

            $ressdel = $this->model_event->delete($this->input->post('deleteid'));
            if($ressdel){
                $this->blade->data('message','حذف شد .');
            }else{
                $this->blade->data('message','خطا در حذف .');
            }
        }
        $vacations = $this->model_event->all();



        $this->blade->data('title','لیست رویداد ها');
        $this->blade->data('vacations',$vacations);
        $this->blade->display('cadre.event_list');
    }
    /////////////////////
    ///
    /////////////////////
    function delay_event()
    {
        $this->blade->data('title','ثبت خلا و اضافه خدمت ناشی از خلا');
        $this->load->model('model_users');
        //post
        if($this->input->post('time')){
            $this->load->model('model_event');
            $this->load->helper('time');


            $arraypost = $this->input->post();

            $arraypost['cadreid'] = $this->session->userdata('id') ;
            $arraypost['namecadre'] = $this->session->userdata('name') ;
            $arraypost['familycadre'] =$this->session->userdata('family') ;
            $ress = $this->model_event->insert($arraypost);
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
        $this->blade->display('cadre.delay_event');

    }



}
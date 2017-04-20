<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class backup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Excel_XML');
        $this->load->helper('url');
        $this->load->helper('time');

        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
    }

    function index()
    {

        $this->load->model('model_users');


        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
        elseif( $this->session->userdata('access') == 0){//admin
            $poordata = $this->model_users->all();
        }
        elseif( $this->session->userdata('access') == 2){//ensani
            $poordata = $this->model_users->findwhere('access',1);
        }
        elseif( $this->session->userdata('access') == 4){//gharagah
            $poordata = $this->model_users->findwhere('access',3);
        }
        else{//admin
            redirect('login');
        }
        //
        $i = 0;
        $mydata[$i] = ['شناسه','کد ملی','نام','فامیلی','سطح دسترسی','درجه','شماره شناسنامه','محل تولد','محل صدور شناسنامه','آدرس','کد پستی'
        ,'شماره تماس','موبایل','آدرس آشنا','شماره آشنا','کار','تخصص','پدر','شغل پدر','شغل مادر','تعداد خواهر','تعدار برادر','تعداد خانوار',
        'تحصیلات','رشته','گروه خونی','مذهب','رنگ مو','رنگ چشک','قد','وزن','تاریخ اعزام','تاریخ ورود',' زمان پایان قانونی','زمان خروج از مجموعه'
        ,'متاهل','سلامتی','بومی','کسری خدمت'];
        foreach ($poordata as $data){
            $i++;
            $mydata[$i] = [$data->id,$data->nationalcode,$data->name,$data->family,rating($data->access),$data->rating,$data->birthcertificate,$data->birthlocation,
                $data->registercertificate,$data->adress,$data->postalcode,$data->tell,
                $data->mob,$data->familiarlocation,$data->familartell,$data->work,$data->Expertise,$data->father,$data->fatherwork,$data->motherwork
                ,$data->sister,$data->brother,$data->familyno,$data->education,$data->fieldofStudy,$data->blood,$data->religion,$data->hair,
                $data->eye,$data->stature,$data->weight,mds_date('y/m/d',$data->timedispatch),mds_date('y/m/d',$data->timearrival),mds_date('y/m/d',$data->timefinish),mds_date('y/m/d',$data->timelastfinish)
                ,maried($data->married),health($data->health),boomi($data->boomi),$data->deficit];
        }
        $this->excel_xml->addWorksheet('Names', $mydata);
        $this->excel_xml->sendWorkbook('users.xls');


    }

    function vacations()
    {


        if( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre
            $access = $this->session->userdata('access') - 1 ;
            $this->load->model('model_vacations');
            $vacations = $this->model_vacations->vacations($access);
            $i= 0 ;
            $mydata[$i] = ['شناسه','شناسه کاربر (کلید خارجی )','وضعیت','زمان شروع','زمان پایان','توضیحات'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,status($data->status),mds_date('y/m/d h:i',$data->times),mds_date('y/m/d h:i',$data->timef),$data->description];

            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('vacations.xls');
        }else{
            die();
        }

    }

    function mission()
    {


        if( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre
            $access = $this->session->userdata('access') - 1 ;
            $this->load->model('model_vacations');
            $vacations = $this->model_vacations->mission($access);
            $i= 0 ;
            $mydata[$i] = ['شناسه','شناسه کاربر','وضعیت','زمان شروع','زمان پایان','توضیحات'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,'ماموریت',mds_date('y/m/d h:i',$data->times),mds_date('y/m/d h:i',$data->timef),$data->description];

            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('vacations.xls');
        }else{
            die();
        }

    }


    function delay()
    {


        if( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre
            $access = $this->session->userdata('access') - 1 ;
            $this->load->model('model_vacations');
            $vacations = $this->model_vacations->delay($access);
            $i= 0 ;
            $mydata[$i] = ['id','userid','status','times','timef','description'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,'تاخیر',mds_date('y/m/d h:i',$data->times),mds_date('y/m/d h:i',$data->timef),$data->description];

            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('delay.xls');
        }else{
            die();
        }

    }

    function absent()
    {


        if( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre
            $access = $this->session->userdata('access') - 1 ;
            $this->load->model('model_vacations');
            $vacations = $this->model_vacations->absent($access);
            $i= 0 ;
            $mydata[$i] = ['شناسه','شناسه کاربر','وضعیت','زمان شروع','زمان پایان','توضیحات'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,status($data->status),mds_date('y/m/d h:i',$data->times),mds_date('y/m/d h:i',$data->timef),$data->description];

            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('absent.xls');
        }else{
            die();
        }

    }
    function overtime()
    {
        if( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre
            $access = $this->session->userdata('access') - 1 ;
            $this->load->model('model_overtime');
            $vacations = $this->model_overtime->all($access);
            $i= 0 ;
            $mydata[$i] = ['id','userid','times','description'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->overtimeid,$data->userid,$data->time,$data->description];

            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('overtime.xls');
        }else{
            die();
        }
    }
    /////////////////////
    function event()
    {
        if( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre

            $this->load->model('model_event');
            $vacations = $this->model_event->all();
            $i= 0 ;
            $mydata[$i] = ['شناسه','شناسه وظیفه','نام پیشنهاد دهنده','فامیل پیشنهاد دهنده','روز','توضیحات','نوع','زمان تاخیر (در صورت خلا)','زمان شروع تاخیر','زمان پایان تاخیر'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->vacationsid,$data->userid,$data->namecadre,$data->familycadre,$data->time,$data->description,delaystat($data->status),$data->dalaytime,$data->dates,$data->datef];

            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('event.xls');
        }else{
            die();
        }
    }




}
function status($stat){
    switch ($stat){
        case "0":
            return "ساعتی";
            break;
        case "1":
            return "تشویقی";
            break;
        case "3":
            return "استحقاقی";
            break;
        case "4":
            return "استراحتی";
            break;
        case "7":
            return "تاخیر";
            break;
        case "8":
            return "بلند مدت";
            break;
        default:
            return "تاخیر";
    }

}
function rating($rat){
    switch ($rat) {
        case "1":
            return "وظیفه گردان قرارگاه";
            break;
        case "3":
            return "وظیفه نیروی انسانی";
            break;
        default:
            return "کادر";
    }
}
function maried($rat){
    switch ($rat) {
        case "1":
            return "متاهل  ";
            break;

        default:
            return "مجرد";
    }
}
function health($rat){
    switch ($rat) {
        case "1":
            return "سالم  ";
            break;

        default:
            return "معاف از رزم";
    }
}
function boomi($rat){
    switch ($rat) {
        case "1":
            return "بومی  ";
            break;

        default:
            return "غیر بومی";
    }
}
function delaystat($rat){
    switch ($rat) {
        case "0":
            return "تشویق  ";
            break;
        case "1":
            return "تنبیه  ";
            break;
        case "2":
            return "خلا و اضافه خدمت ناشی از خلا  ";
            break;

        default:
            return "غیر بومی";
    }
}
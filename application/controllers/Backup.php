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
        else{//admin
            redirect('login');
        }
        //
        $i = 0;
        $mydata[$i] = ['شناسه','کد ملی','نام','فامیلی','سطح دسترسی','درجه','شماره شناسنامه','آدرس','کد پستی'
        ,'شماره تماس','موبایل','آدرس آشنا','شماره آشنا','پدر',
        'تحصیلات','رشته','تاریخ خدمت'];
        foreach ($poordata as $data){
            $i++;
            $mydata[$i] = [$data->id,$data->nationalcode,$data->name,$data->family,rating($data->access),$data->rating,$data->birthcertificate,
                $data->adress,$data->postalcode,$data->tell,
                $data->mob,$data->familiarlocation,$data->familartell,$data->father,$data->education,$data->fieldofStudy
                ,mds_date('y/m/d',$data->timearrival)];
        }
        $this->excel_xml->addWorksheet('Names', $mydata);
        $this->excel_xml->sendWorkbook('users.xls');


    }
    function units(){
        $this->load->model('model_units');
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
        elseif( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4){//cadre
            $poordata = $this->model_units->all();
            $i = 0;
            $mydata[$i] = ['شناسه','کد ملی','نام','فامیلی','درجه','شماره شناسنامه','آدرس','کد پستی'
                ,'شماره تماس','موبایل','آدرس آشنا','شماره آشنا','پدر',
                'تحصیلات','رشته','تاریخ خدمت','تاریخ پایان خدمت','تاریخ خروج از مجموعه','واحد خدمت','دین','مذهب'
            ,'قد','وزن','رنگ چشم','رنگ مو','سلامتی جسمی','سلامتی روانی','تاهل','محل تولد','محل صدور شنانامه','درجه','خواهر','برادر','خانوار'];
            foreach ($poordata as $data){
                $i++;
                $mydata[$i] = [$data->id,$data->nationalcode,$data->name,$data->family,$data->rating,$data->birthcertificate,
                    $data->adress,$data->postalcode,$data->tell,
                    $data->mob,$data->familiarlocation,$data->familartell,$data->father,$data->education,$data->fieldofStudy
                    ,mds_date('y/m/d',$data->timearrival),mds_date('Y/m/d',$data->timefinish),mds_date('Y/m/d',$data->timelastfinish),$data->serviceunit,$data->religion
                ,$data->sect,$data->stature,$data->weight,$data->eye,$data->hair,health($data->health),'سالم',maried($data->married),$data->birthlocation,$data->birthcertificate
                ,$data->rating,$data->sister,$data->brother,$data->familyno];
            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('units.xls');
        }
        else{//n
            redirect('login');
        }

    }


    function event2(){
        $this->load->model('model_vacations');
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
        elseif( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4) {//cadre
            function halat($halat){
                if($halat == 0) return 'مرخصی ساعتی';
                if($halat == 6) return 'ماموریت';
                if($halat == 7) return 'تاخیر';
            }
            function checkstatus($status,$date){
                if($status == 7) return '---';
                else return mds_date('h:i',$date);
            }
            $poordata = $this->model_vacations->all();
            $i = 0;
            $mydata[$i] = ['شناسه نیرو','حالت','تاریخ شروع','تاریخ پایان','ساعت شروع','ساعت پایان','مدت زمان (روز)','مدت زمان(ساعت)','شماره','نوع','تاریخ ثبت','علت'];
            foreach ($poordata as $data){
                $i++;
                $mydata[$i] = [$data->unitid,halat($data->status),mds_date('Y/m/d',$data->times),mds_date('Y/m/d',$data->timef),checkstatus($data->status,$data->times),
                    checkstatus($data->status,$data->timef),$data->day,$data->hour,$data->number,$data->type,mds_date('Y/m/d h:i:s',$data->inserttime),$data->description];
            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('vacations.xls');
        }

    }

    function event(){
        $this->load->model('model_event');
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
        elseif( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4) {//cadre
            function stats($halat){
                if($halat == 0) return 'خلا و اضافه خدمت ناشی از خلا';
                if($halat == 1) return 'تشویقی';
                if($halat == 2) return 'تنبیهی';
            }

            $poordata = $this->model_event->all();
            $i = 0;
            $mydata[$i] = ['شناسه نیرو','حالت','تاریخ شروع','تاریخ پایان','تشویقی یا اضافه خدمت','خلا','شماره','تاریخ ثبت','توضیحات','نوع عمل','شناسه پیشنهاد دهنده','درجه پیشنهاد دهنده'
            ,'نام پیشنهاد دهنده','نام خ پیشنهاد دهنده','نام نیرو','نام خانوادگی نیرو'];
            foreach ($poordata as $data){
                $i++;
                $mydata[$i] = [$data->unitid,stats($data->stat),mds_date('Y/m/d',$data->times),mds_date('Y/m/d',$data->timef),$data->day,
                    $data->delay,$data->number,mds_date('Y/m/d h:i:s',$data->inserttime),$data->text,$data->action,$data->userid,$data->cadrerating,$data->cadrename,$data->cadrefamily,$data->name,$data->family];
            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('event.xls');
        }

    }

    function leave()
    {
        $this->load->model('model_leave');
        if(!$this->session->has_userdata('id') ){
            redirect('login');
        }
        elseif( $this->session->userdata('access') == 2 or $this->session->userdata('access') == 4) {//cadre
            function cond($halat){
                if($halat == '0') return 'مرخصی بلند مدت';
                else return $halat ;
            }

            $poordata = $this->model_leave->all();
            $i = 0;
            $mydata[$i] = ['شناسه نیرو','حالت','تاریخ شروع','تاریخ پایان','مدت زمان','شماره','تاریخ ثبت','توضیحات','نام نیرو','نام خانوادگی نیرو','ساعت شروع','ساعت پایان'
            ,'تعطیلی','استحقاقی','بین راهی','تشویقی','استراحتی'];
            foreach ($poordata as $data){
                $i++;
                $mydata[$i] = [$data->unitid,cond($data->condition),mds_date('Y/m/d',$data->times),mds_date('Y/m/d',$data->timef),$data->time,
                   $data->number,mds_date('Y/m/d h:i:s',$data->inserttime),$data->text,$data->name,$data->family,mds_date('h:i',$data->times),mds_date('h:i',$data->timef),
                $data->closures,$data->entitlement,$data->way,$data->encouragement,$data->rest];
            }
            $this->excel_xml->addWorksheet('Names', $mydata);
            $this->excel_xml->sendWorkbook('leave.xls');
        }

    }




















    /////////////

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
    function bevent()
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
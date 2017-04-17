<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class backup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Excel_XML');
        $this->load->helper('url');

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
        $mydata[$i] = ['id','nationalcode','name','family','access','rating','birthcertificate','birthlocation','registercertificate','adress','postalcode'
        ,'tell','mob','familiarlocation','familartell','work','Expertise','father','fatherwork','motherwork','sister','brother','familyno',
        'education','fieldofStudy','blood','religion','	hair','	eye','stature','weight','timedispatch','timearrival','timefinish','timelastfinish'
        ,'married','health','boomi','deficit'];
        foreach ($poordata as $data){
            $i++;
            $mydata[$i] = [$data->id,$data->nationalcode,$data->name,$data->family,$data->access,$data->rating,$data->birthcertificate,$data->birthlocation,
                $data->registercertificate,$data->adress,$data->postalcode,$data->tell,
                $data->mob,$data->familiarlocation,$data->familartell,$data->work,$data->Expertise,$data->father,$data->fatherwork,$data->motherwork
                ,$data->sister,$data->brother,$data->familyno,$data->education,$data->fieldofStudy,$data->blood,$data->religion,$data->hair,
                $data->eye,$data->stature,$data->weight,$data->timedispatch,$data->timearrival,$data->timefinish,$data->timelastfinish
                ,$data->married,$data->health,$data->boomi,$data->deficit];
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
            $mydata[$i] = ['id','userid','status','times','timef','description'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,$data->status,$data->times,$data->timef,$data->description];

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
            $mydata[$i] = ['id','userid','status','times','timef','description'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,$data->status,$data->times,$data->timef,$data->description];

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
                $mydata[$i] = [$data->id,$data->userid,$data->status,$data->times,$data->timef,$data->description];

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
            $mydata[$i] = ['id','userid','status','times','timef','status','description'];
            foreach ($vacations as $data){
                $i ++ ;
                $mydata[$i] = [$data->id,$data->userid,$data->status,$data->times,$data->timef,$data->status,$data->description];

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




}
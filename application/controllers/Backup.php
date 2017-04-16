<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class backup extends CI_Controller
{
    function index()
    {
        $this->load->library('Excel_XML');
        $this->load->model('model_users');
        $this->load->helper('url');

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

}
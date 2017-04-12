<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
            $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        echo $agent;

        echo $this->agent->platform();
	    //$this->load->view('welcome_message.php');

	}
}

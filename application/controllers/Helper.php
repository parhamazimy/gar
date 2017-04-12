<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Helper extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $url = base_url('Helper');
        $this->blade->data('url',$url);
        $this->blade->data('name','salam');
        $this->blade->display('index');
    }
    //===============((     Email      ))==================\\
    public function email()
    {
        $this->load->library('email');
        $this->email->from('parham@example.com', 'پرهام عظیمی');
        $this->email->to('parhamazimy@gmail.com');
        $this->email->set_mailtype("html");
//        $this->email->cc('another@another-example.com');
//        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('<h1>سلام</h1>');

        $this->email->send();
        $this->email->print_debugger();
    }
    //===============((     Captcha      ))==================\\
    public function captcha()
    {
        $this->load->helper('url');
        $this->load->helper('captcha');
        $vals = array(
            'word'          => rand(1000,9999),
            'img_path'      => './public/captcha/',
            'img_url'       => base_url().'public/captcha',
            'font_path'     => './public/font/Badr.ttf',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 30,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        echo $cap['image'];
    }
    //===============((     pagination      ))==================\\
    public function pagination()
    {
        $this->load->library('pagination');


        $config['base_url'] = base_url('Helper/pagination').'page/';
        $config['total_rows'] =  null ;// tedade kole satr ha db;
        $config['per_page'] = 3;// tedade safhe dar page
        $config['num_links'] = 5;//tedade link
        $config["uri_segment"] = 4;// slash 4 romi be onvane safhe
        $config['use_page_numbers'] = TRUE;
//        $config["use_global_url_suffix"] = True;
        $config["page_query_string"] = TRUE;
        $config['reuse_query_string'] = true;
        echo $page = $this->uri->segment(4)? ($this->uri->segment(4)-1) *$config['per_page']  :0;
        foreach ($this->model_test->page($page,$config['per_page']) as $item){//page = kodam safhe(srart limit) // per_page = limit safhe
            echo '<div style="text-align: center;margin: 5px auto; width: 85%;border: 2px solid orangered;padding: 5px">';
            echo $item->id . "<hr>";
            echo $item->name . "<hr>";
            echo $item->family . "<hr>";
            echo $item->adress . "<hr>";
            echo $item->tell . "<hr>";
            echo '</div>';
        }

        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
    }
    //===============((     models      ))==================\\
    public function models()
    {

    }

}
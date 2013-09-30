<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 22/06/13
 * Time: 12:20
 * To change this template use File | Settings | File Templates.
 */

class Emailtest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    function index(){


        //the following piece of code sends an email to my gmail account
        //make sure open ssl is enabled in php.ini
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'omatsolasobotie@gmail.com';
        $config['smtp_pass']    = 'tsobotie';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $this->email->from('omatsolasobotie@gmail.com', 'myname');
        $this->email->to('omatsolasobotie@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();


    }

}
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




        //$this->email->initialize($config);

        $this->email->from('omatsolasobotie@gmail.com', 'fromsholly');
        $this->email->to('omatsolasobotie@gmail.com');

        $this->email->subject('Email Test From Codeigniter');
        $this->email->message('Testing the email class.');


        $path = $this->config->item('server_root');
        //set location of attachment file through server root
        $file = $path .'/ci_demo/attachments/info.txt';

        //this code attaches the text file to the email
        $this->email->attach($file);

        //testing to see location of path


        $this->email->send();

        echo $this->email->print_debugger();


    }

}
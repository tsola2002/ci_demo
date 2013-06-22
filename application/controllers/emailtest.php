<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 22/06/13
 * Time: 12:20
 * To change this template use File | Settings | File Templates.
 */

class Emailtest extends CI_Controller {

    function index(){

        $data['flash'] = $this->session->flashdata('success');

        $this->load->view('view', $data);
    }

    function send(){

        $this->load->library('email');
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to('sbanti2002@msn.com');


        $this->email->subject('Email Test');
        $this->email->message($this->input->post('message'));

        $this->email->send();

        if($this->email->send()){
            $this->session->set_flashdata('success', 'thanks for the email');
           redirect('http://localhost/ci_demo/emailtest/');

        }else{
            echo $this->email->print_debugger();
        }




    }

}
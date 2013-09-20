<?php
/**
 *
 * Package: ci_demo
 * Filename: contact.php
 * Author: solidstunna101
 * Date: 20/09/13
 * Time: 14:47
 *
 */

class Contact extends CI_Controller {

    function index(){
        echo 'hello contact';

        $data['main_content'] = 'contact_form';
        $this->load->view('includes/template', $data);
    }

    function submit(){

        $name = $this->input->post('name');

        $data['main_content'] = 'contact_submitted';

       // $this->load->view('includes/template', $data);

        if($this->input->post('ajax')){
            $this->load->view($data['main_content']);
        }else{
            $this->load->view('includes/template', $data);
        }


    }

}
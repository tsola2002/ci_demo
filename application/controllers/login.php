<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 03/06/13
 * Time: 10:51
 * To change this template use File | Settings | File Templates.
 */

class login extends CI_Controller {

    function index(){

        $data['maincontent'] = 'login_form';
        $this->load->view('includes/template', $data);


    }

    function validate_credentials(){

        //$this->load->model('membership_model');
        $query = $this->membership_model->validate();

        if($query){

            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data);
            redirect('site/members_area');

        }

        else{
            $this->index();

        }



    }

}
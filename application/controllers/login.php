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

        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);


    }

    function validate_credentials(){

        $this->load->model('membership_model');
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

    function signup(){
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }

    function create_member(){
        $this->load->library('form_validation');
        //field name, error message validation rules

        $this->form_validation->set_rules('first_name', 'name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'password2', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE){
            $this->signup();
        }
        else{
            $this->load->model('membership_model');
            if($query = $this->membership_model->create_member()){
                $data['main_content'] = 'signup_successful';
                $this->load->view('includes/template', $data);
            }
            else{
                $this->load->view('signup_form');
            }
        }
    }


}
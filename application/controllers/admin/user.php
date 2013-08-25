<?php
/**
 *
 * Package: ci_demo
 * Filename: user.php
 * Author: solidstunna101
 * Date: 25/08/13
 * Time: 11:46
 *
 */

class User extends Admin_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function login(){
        //store dashboard link in variable $dashboard
        $dashboard = 'admin/dashboard';
        $this->user_m->loggedin() == FALSE || redirect($dashboard);

        //store rules from user model in variable $rules

        $rules = $this->user_m->rules;
        //add those rules to form validation library
        $this->form_validation->set_rules($rules);
        //conditional to check form validation
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            //we check if user is logged in
            if ($this->user_m->login() == TRUE) {
                redirect($dashboard);
            }
            else {
                //generate an error page
                $this->session->set_flashdata('error', 'That email/password combination does not exist');
                redirect('admin/user/login', 'refresh');
            }
        }
        //variable
        $this->data['subview'] = 'admin/user/login';
        //load modal layout along with subview data
        $this->load->view('admin/_layout_modal', $this->data);
    }

}
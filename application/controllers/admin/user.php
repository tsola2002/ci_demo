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
        //store rules from user model in variable $rules

        $rules = $this->user_m->rules;
        //add those rules to form validation library
        $this->form_validation->set_rules($rules);
        //conditional to check form validation
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
        }
        //variable
        $this->data['subview'] = 'admin/user/login';
        //load modal layout along with subview data
        $this->load->view('admin/_layout_modal', $this->data);
    }

}
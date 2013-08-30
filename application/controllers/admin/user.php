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

    public function index ()
    {
        //create data variable called
        //fetch users frm database & stored it
        $this->data['users'] = $this->user_m->get();
        $this->data['subview'] = 'admin/user/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit ($id = NULL)
    {
        //takes id that will point to the user
        //we first assume we have no user id if we do
        //we fetch user for that id

        if ($id) {
            $this->data['user'] = $this->user_m->get($id);
         //either we find the user or add error message to error array
          //  count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
        }
        else{
           //if not we'll fetch a new user
           $this->data['user'] = $this->user_m->get_new();
        }

        $rules = $this->user_m->rules_admin;

        //we need to hack the rules
        //cos if we insert rules then id needs to be required
        //asumption dat we have an id if not then it needs to be required
        $id || $rules['password']['rules'] .= '|required';

        //add those rules to form validation library
        $this->form_validation->set_rules($rules);
        //conditional to check form validation
        if ($this->form_validation->run() == TRUE) {
        //set array values to store in database using array_to_post method
            $data = $this->user_m->array_from_post(array('name', 'email', 'password'));
            //run the password through the hash method
            $data['password'] = $this->user_m->hash($data['password']);
            //insert/update the method
            $this->user_m->save($data, $id);
            //when finished redirect to user listing
            redirect('admin/user');

        }

        //$this->data['user'] = $this->user_m->get($id);
        $this->data['subview'] = 'admin/user/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete ($id)
    {
        $this->user_m->delete($id);
        redirect('admin/user');
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

    public function logout ()
    {
        $this->user_m->logout();
        redirect('admin/user/login');
    }

    public function _unique_email($str)
    {
        //callback function from user_m(notice method names are different)
        //(to prevent from being accessible in url)
        //id will be uri segment4
        $id = $this->uri->segment(4);
        //fetch user frm database via their email
        $this->db->where('email', $this->input->post('email'));
        //we add extra exception here
        //look for the email but not the current user
        //assumption dat we either have no user id or we do
        //then we dont include userid
        !$id || $this->db->where('id !=', $id);
        $user = $this->user_m->get();

        //if we find user we have to set an error message
        //and return false
        if (count($user)) {
            //error message
            $this->form_validation->set_message('_unique_email', '%s should be unique');
            return FALSE;
        }
        //if not we simply return true
        return TRUE;
    }

}
<?php
/**
 *
 * Package: ci_demo
 * Filename: user_m.php
 * Author: solidstunna101
 * Date: 25/08/13
 * Time: 12:16
 *
 */

class User_m extends MY_Model {

    protected $_table_name = 'users';
    //we will use default keys for primary key, primary values, & timestamps
    protected $_order_by = 'name';
    //$rules needs to be public to be accesible in controller
    public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

    //another separate set of rules for admin users
    //email fields has callback function attached to it
    //also password confirm needs to match password field
    //order field needs to be a natural number
    public $rules_admin = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid|callback__unique_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password_confirm]'
        ),
        'password_confirm' => array(
            'field' => 'password_confirm',
            'label' => 'Confirm password',
            'rules' => 'trim|matches[password]'
        ),
    );

    /*function __construct ()
    {
        parent::__construct();
    }*/


    public function login ()
    {
        //find user & store them in variable called $user
        //through getby method which will grab email input
        //we will also have to supply a hashed password
        //TRUE will be passed so that we can retrieve a single user object
        $user = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password')),
        ), TRUE);

        //check if user is present
        if (count($user)) {
            // Log in user by
            //setting data array containing login information
            $data = array(
                'name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE,
            );
            //store all this user info in session
            //so that it will persist as long as possible
            $this->session->set_userdata($data);
        }
    }

    public function logout ()
    {
        //method to logout
        //destroying session variable
        $this->session->sess_destroy();
    }

    public function loggedin (){
        //method to perform login check
        //return session variable logged in from data array
        //it is casted as a boolean so its either TRUE/FALSE
        return (bool) $this->session->userdata('loggedin');
    }

    public function get_new(){
        //create new empty class
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';
        return $user;
    }

    public function hash ($string)
    {
        //takes in string as a parameter
        //then return it using a hash method
        //string will be sorted using encryption key appended to it
        //which will generate a long string
        return hash('sha512', $string . config_item('encryption_key'));
    }

}
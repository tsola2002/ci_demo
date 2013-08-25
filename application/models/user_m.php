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

    /*function __construct ()
    {
        parent::__construct();
    }*/

}
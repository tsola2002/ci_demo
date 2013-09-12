<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Controller.php
 * Author: solidstunna101
 * Date: 20/08/13
 * Time: 19:16
 *
 */
//creating a custom controller
class MY_Controller extends CI_Controller {

    //sets $data as empty array
    public $data = array();

    //constructor below will allow the below code to be executed on every page
    function __construct(){
        parent::__construct();
        //we now set some basic keys on the array we will be needing later on
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
    }

}
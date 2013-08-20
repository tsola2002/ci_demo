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

    public $data = array();

    function __construct(){
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
    }

}
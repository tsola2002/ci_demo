<?php
/**
 *
 * Package: ci_demo
 * Filename: page.php
 * Author: solidstunna101
 * Date: 22/08/13
 * Time: 13:54
 *
 */

class Page extends Frontend_Controller {


    public function __construct(){
        parent::__construct();
        //load page model inside constructor
        $this->load->model('page_m');
    }

    public function index() {
        $this->load->view('_main_layout');
    }


}
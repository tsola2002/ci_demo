<?php
/**
 *
 * Package: ci_demo
 * Filename: dashboard.php
 * Author: solidstunna101
 * Date: 22/08/13
 * Time: 15:15
 *
 */

class Dashboard extends Admin_Controller {

    public function index(){
        $this->load->view('_layout_main');
    }

    public function modal(){
        $this->load->view('_layout_modal');
    }

}
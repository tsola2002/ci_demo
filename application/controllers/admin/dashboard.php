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
        //load view along with data array from admin controller
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function modal(){
        $this->load->view('admin/_layout_modal', $this->data);
    }

}
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

        // Fetch recently modified articles
        $this->load->model('article_m');
        //order selection by modified date in a descding order
        $this->db->order_by('modified desc');
        //limit records to 5
        $this->db->limit(5);
        //create variable to get records
        $this->data['recent_articles'] = $this->article_m->get();

        $this->data['subview'] = 'admin/dashboard/index';
        //load view along with data array from admin controller
        $this->load->view('admin/_layout_main', $this->data);

    }

    public function modal(){
        $this->load->view('admin/_layout_modal', $this->data);
    }

}
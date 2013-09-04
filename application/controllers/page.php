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

        // Fetch the page data
              $this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
              //we assume a string is returned properly if not we throw a 404 error
              count($this->data['page']) || show_404(current_url());

        $this->load->view('_main_layout', $this->data);
    }


}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 12/06/13
 * Time: 12:38
 * To change this template use File | Settings | File Templates.
 */

class site extends CI_Controller {

    function index(){


        $this->load->library('table');
        $this->load->library('pagination');

        $this->table->set_heading('ID', 'The Title', 'The Content');

        $config['base_url'] = 'http://localhost/ci_demo/index.php/site/index';
        $config['total_rows'] = $this->db->get("data")->num_rows();
        $config['per_page'] = '2';
        $config['num_links'] = '2';
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';

        $this->pagination->initialize($config);

        $data['records'] = $this->db->get('data', $config['per_page'], $this->uri->segment(3));

        $this->load->view('site_view', $data);
    }

}
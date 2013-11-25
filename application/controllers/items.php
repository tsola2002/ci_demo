<?php
/**
 *
 * Package: ci_demo
 * Filename: items.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 11:26
 *
 */


class Items extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load items model as $item variable
        $this->load->model( 'items_model', 'Item' );
        //load site name from config file variables
        $data['site_name'] = $this->config->item( 'site_name' );
        //load data objects using loader class
        $this->load->vars( $data );
    }

    public function index(){
        //echo 'Hello, World!';
        $data['page_title'] = 'All Items';
        $data['items'] = $this->Item->get_all();
        $this->load->view( 'header', $data );
        $this->load->view( 'items/index', $data );
        $this->load->view( 'footer', $data );
    }

}
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

    function details() {
    // ROUTE: item/{name}/{id}
       // echo 'Hello, World!';

        //set id variable to uri segment3
        $id = $this->uri->segment( 3 );

        //get the id frm models getfunction
        $item = $this->Item->get( $id );

        if ( ! $item ) {
            $this->session->set_flashdata( 'error', 'Item not found.' );
            redirect( 'items' );
        }

        $data['page_title'] = $item->name;
        $data['item'] = $item;

        $this->load->view( 'header', $data );
        $this->load->view( 'items/details', $data );
        $this->load->view( 'footer', $data );
    }

    function purchase() { // ROUTE: purchase/{name}/{id}
        $item_id = $this->uri->segment( 3 );
        $item = $this->Item->get( $item_id );

        if ( ! $item ) {
            $this->session->set_flashdata( 'error', 'Item not found.' );
            redirect( 'items' );
        }

        $data['page_title'] = 'Purchase &ldquo;' . $item->name . '&rdquo;';
        $data['item'] = $item;

        $this->load->view( 'header', $data );
        $this->load->view( 'items/purchase', $data );
        $this->load->view( 'footer', $data );
    }

}
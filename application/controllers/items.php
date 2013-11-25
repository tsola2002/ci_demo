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

        $this->form_validation->set_rules( 'email', 'Email', 'required|valid_email|max_length[127]' );

        if ( $this->form_validation->run() ) {
            $email = $this->input->post( 'email' );

            $key = md5( $item_id . time() . $email . rand() );
            $this->Item->setup_payment( $item->id, $email, $key );

            $this->load->library( 'Paypal_Lib' );
            $this->paypal_lib->add_field( 'business', $this->config->item( 'paypal_email' ));
            $this->paypal_lib->add_field( 'return', site_url( 'paypal/success' ) );
            $this->paypal_lib->add_field( 'cancel_return', site_url( 'paypal/cancel' ) );
            $this->paypal_lib->add_field( 'notify_url', site_url( 'paypal/ipn' ) ); // <-- IPN url

            $this->paypal_lib->add_field( 'item_name', $item->name );
            $this->paypal_lib->add_field( 'item_number', '1' );
            $this->paypal_lib->add_field( 'amount', $item->price );

            $this->paypal_lib->add_field( 'custom', $key );

            redirect( $this->paypal_lib->paypal_get_request_link() );
        }


        $data['page_title'] = 'Purchase &ldquo;' . $item->name . '&rdquo;';
        $data['item'] = $item;

        $this->load->view( 'header', $data );
        $this->load->view( 'items/purchase', $data );
        $this->load->view( 'footer', $data );
    }

}
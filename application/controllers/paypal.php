<?php
/**
 *
 * Package: ci_demo
 * Filename: paypal.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 14:49
 *
 */

class Paypal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'items_model', 'Item' );
        $this->load->library( 'Paypal_Lib' );
        $data['site_name'] = $this->config->item( 'site_name' );
        $this->load->vars( $data );
    }

    function index() {
        redirect( 'items' );
    }

    function success() {
        $this->session->set_flashdata( 'success', 'Your payment is being processed now. Your download link will be emailed to your shortly.' );
        redirect( 'items' );
    }

    function cancel() {
        $this->session->set_flashdata( 'success', 'Payment cancelled.' );
        redirect( 'items' );
    }

}
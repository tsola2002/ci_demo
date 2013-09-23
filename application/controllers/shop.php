<?php
/**
 *
 * Package: ci_demo
 * Filename: shop.php
 * Author: solidstunna101
 * Date: 23/09/13
 * Time: 10:44
 *
 */

class Shop extends CI_Controller {

    function index(){

        $this->load->model('mproducts');

        $data['products'] = $this->mproducts->get_all();

        $this->load->view('products', $data);

        //echo "<pre>";
        //test view of database
       // print_r($data['products']);

    }

    function add(){
        $this->load->model('mproducts');
        $product = $this->mproducts->get($this->input->post('id'));

        $insert = array(
            'id' => $this->input->post('id'),
            'qty' => 1,
            'price' => $product->price,
            'name' => $product->name
        );

        if($product->option_name){
                $insert['options'] = array(
                    $product->option_name => $product->option_values[$this->input->post($product->option_name)]
                );

        }

        $this->cart->insert($insert);
        redirect('shop');
    }

    function remove($rowid){

        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));

        redirect('shop');
    }

}
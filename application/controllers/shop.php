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
        //load products model
        $this->load->model('mproducts');

        //fetch database records
        $data['products'] = $this->mproducts->get_all();

        //then pass the data along with a view
        $this->load->view('products', $data);

       // echo "<pre>";
        //test view of database
       // print_r($data['products']);

    }

    function add(){
        //load the model
        $this->load->model('mproducts');

        //use models get function to take in id of cart item
        $product = $this->mproducts->get($this->input->post('id'));

        //create insert array values that will be populated into the cart
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

        //add $insert array to cart finally
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
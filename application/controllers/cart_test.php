<?php
/**
 *
 * Package: ci_demo
 * Filename: cart_test.php
 * Author: solidstunna101
 * Date: 23/09/13
 * Time: 09:30
 *
 */

class Cart_test extends CI_Controller {

    function add(){

        //cart item data
        $data = array(
            'id' => '42',
            'name' => 'Pants',
            'qty' => 1,
            'price' => 19.99,
            'options' => array('size' => 'medium')
        );

        //insert data items into the cart
        $this->cart->insert($data);
    }

    function show(){
        //return shopping along with contents
        $cart = $this->cart->contents();
        echo "<pre>";
        print_r($cart);
    }

    function add2(){
        //cart item data
        $data = array(
            'id' => '12',
            'name' => 'T-shirt',
            'qty' => 2,
            'price' => 7.99,
            'options' => array('size' => 'large')
        );

        //insert data items into the cart
        $this->cart->insert($data);
    }

    function update() {
        //new update data variable
        $data = array(
            'rowid' => '456efa2d671ecce94aff804002e2047f',
            'qty' => '1'
        );

        //updating the cart with new data
        $this->cart->update($data);
    }

    function total(){

        //shows the total price of items
        echo $this->cart->total();
    }

    function remove(){
        //targets data array variable to be removed
        $data = array(
            'rowid' => '456efa2d671ecce94aff804002e2047f',
            'qty' => '0'
        );

        //updates qty to zero which will remove it
        $this->cart->update($data);
        echo "removed() called";
    }

    function destroy(){
        //this will completely wipeout the shopping cart items
        $this->cart->destroy();
        echo "destroy() called";
    }

}
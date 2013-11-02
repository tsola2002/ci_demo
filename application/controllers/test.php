<?php
/**
 *
 * Package: ci_demo
 * Filename: test.php
 * Author: solidstunna101
 * Date: 02/11/13
 * Time: 08:36
 *
 */

class Test extends CI_Controller {

    function area_of_circle($radius){

        //loads math.php helper in helper folder
        $this->load->helper('math');

        //echo area of circle using function frm math_helper
        echo "A circle with radius $radius has area: ". circle_area($radius);
    }


    //spits out current date frm custom date_helper.php
    function show_mysql_date(){
        $this->load->helper('date');

        echo "Current date in mysql format is:". date_mysql();
    }

    //function to run custom library Foo.php in libraries folder
    function new_library(){
        $this->load->library('Foo');

        $this->foo->test('bar');
    }

    //testing extended form validation library
    function form(){
        $this->load->library('form_validation');

        //$this->form_validation->test();

        $this->load->view('form');
    }

    function form_submit(){

        $this->load->library('Form_validation');

        //set rules for validation of form
        $this->form_validation->set_rules('username', 'Username',
                    'required|alpha_numeric|min_length[6]');

        $this->form_validation->set_rules('password', 'Password',
            'required|min_length[6]|strong_pass[3]');

        //do a check to see if rules were ran properly
        //run function will return false if any one of the rules are not satisfied
        if(!$this->form_validation->run()){
            $this->load->view('form');
        } else{
            echo "success";
        }

    }



}
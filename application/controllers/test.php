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

        //load captcha helper
        $this->load->helper('captcha');

        //adding values to captcha
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'img_width' => 150,
            'img_height' => 30,
            'word' => 'word'
        );

        //creating the captcha
        $cap = create_captcha($vals);

        //saving values into the captcha word key_value pair values into a session
        $this->session->set_userdata('captcha', $cap['word']);
        $data['captcha']=$cap['image'];


        //load smiley helper
        $this->load->helper('smiley');
        $this->load->library('table');

        //get smileys & connect it to form page
        $image_array = get_clickable_smileys(base_url().'smileys/', 'form');
        //sorts smileys in a table format
        $col_array = $this->table->make_columns($image_array,8);

        $data['smiley_table'] = $this->table->generate($col_array);

        //$this->form_validation->test();

        $this->load->view('form',$data);
    }

    function form_submit(){

        $this->load->library('Form_validation');



        //set rules for validation of form
        $this->form_validation->set_rules('username', 'Username',
                    'required|alpha_numeric|min_length[6]');

        $this->form_validation->set_rules('password', 'Password',
            'required|min_length[6]|strong_pass[3]');

        //checking to see if user submitted captcha matches browser captcha
        if(strtolower($this->session->userdata('captcha') !=strtolower($_POST['captcha']))){
           echo "<p>the captcha code was incorrect, you typed in" .$_POST['captcha']. "the code was" .$this->session->userdata('captcha'). "</p>";


        }

        //do a check to see if rules were ran properly
        //run function will return false if any one of the rules are not satisfied

        elseif(!$this->form_validation->run()){
            $this->load->view('form');
       } else{
            echo "success";
        }


    }



}
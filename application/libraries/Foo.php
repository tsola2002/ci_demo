<?php
/**
 *
 * Package: ci_demo
 * Filename: Foo.php
 * Author: solidstunna101
 * Date: 02/11/13
 * Time: 09:06
 *
 */

class Foo {

    var $CI;

    public function __construct()
    {

        //returns instance of super object which has to be referenced instead of being cloned or copied
        // =& references instead of making a copy
        $this->CI =& get_instance();
        echo "constructor was called. <br />";
    }

    //creating a custom library
    //when you create a new library the first character must be capitalized

    function test($value){
        echo "you passed me $value. <br />";

        //CI now contains loader library which can now be used
        $this->CI->load->library('config');

        //now that we have access to super object we can now config library
        echo "You language is: ". $this->CI->config->item('language');
    }

}
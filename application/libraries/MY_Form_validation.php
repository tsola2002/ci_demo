<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Form_validation.php
 * Author: solidstunna101
 * Date: 02/11/13
 * Time: 09:33
 *
 */

class MY_Form_validation extends CI_Form_validation {

    //when you extend an existing library you have to the prefix MY_ to the name of the file

    function test(){
        echo "testing extended for validation library";
    }
}
<?php
/**
 *
 * Package: ci_demo
 * Filename: test.php
 * Author: solidstunna101
 * Date: 31/10/13
 * Time: 09:54
 *
 */

class Test extends CI_Controller {

    //function to allowed characters strings
    function allowed_chars($param){
        echo "You passed me '$param'.";
    }

}
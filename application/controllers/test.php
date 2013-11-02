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

}
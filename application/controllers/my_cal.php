<?php
/**
 *
 * Package: ci_demo
 * Filename: my_cal.php
 * Author: solidstunna101
 * Date: 31/10/13
 * Time: 16:32
 *
 */

class My_cal extends CI_Controller {

    function display($year = null, $month = null){

        $conf = array(
            'start_day' => 'monday',
            'show_next_prev' => true,
            'next_prev_url' => base_url() .'my_cal/display'
        );


       // echo "hello frm cal";
        $this->load->library('calendar', $conf);

        //this will output the calendar
        echo $this->calendar->generate($year, $month);
    }

}
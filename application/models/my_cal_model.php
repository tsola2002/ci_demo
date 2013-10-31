<?php
/**
 *
 * Package: ci_demo
 * Filename: my_cal_model.php
 * Author: solidstunna101
 * Date: 31/10/13
 * Time: 16:44
 *
 */

class My_cal_model extends CI_Model {

    function generate($year, $month){
        $conf = array(
            'start_day' => 'monday',
            'show_next_prev' => true,
            'next_prev_url' => base_url() .'my_cal/display'
        );


        // echo "hello frm cal";
        $this->load->library('calendar', $conf);

        $cal_data = array(
            15 => 'foo',
            17 => 'bar'
        );


        //this will return the calendar
        return $this->calendar->generate($year, $month, $cal_data);
    }

}
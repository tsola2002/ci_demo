<?php
/**
 *
 * Package: ci_demo
 * Filename: profiler.php
 * Author: solidstunna101
 * Date: 01/11/13
 * Time: 11:21
 *
 */


function profiler_hook(){
   // echo 'Testing profiler';



    //checking ip address which is contained in $_SERVER[REMOTE_ADDR]
    if($_SERVER['REMOTE_ADDR'] == '::1') {
        //inoorder to access output library functions like enble profiler
        //we have access codeigniter super object
        //it has to accessed via assignment by reference so that we dont duplicate or clone it
        $CI =& get_instance();

        //this loads the profiler
        //replace $this with $ci
        $CI->output->enable_profiler(TRUE);
    }


}
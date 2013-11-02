<?php
/**
 *
 * Package: ci_demo
 * Filename: date_helper.php
 * Author: solidstunna101
 * Date: 02/11/13
 * Time: 08:51
 *
 */

//this file extends the date helper function
//when extending an existing helper, the name of the extension file must match the existing file


function date_mysql($time = NULL){

    //if time doesn't exist then return the current time
    if(!$time){
        $time = time();
    }

    //returns the date in the MYSQL format
    return date('Y-m-d H:i:s', $time);
}

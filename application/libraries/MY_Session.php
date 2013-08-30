<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Session.php
 * Author: solidstunna101
 * Date: 30/08/13
 * Time: 15:08
 *
 */

class MY_Session extends CI_Session {

    function sess_update ()
    {
        // Listen to HTTP_X_REQUESTED_WITH
        //if its set & not xmlhttp request
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
            // This is NOT an ajax call
            parent::sess_update();
        }
    }

}
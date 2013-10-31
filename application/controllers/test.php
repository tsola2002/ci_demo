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

    /*
     * SOME SAMPLE SECURITY ENCRYPTION FUNCTIONS
     * */
    function md5_test($pass){
        echo md5($pass);
    }

    function sha1_test($pass){
        echo sha1($pass);
    }

    //this version for use with early php 5.4 servers
    function sha1_test2($pass){
        $this->load->library('encrypt');
        echo $this->encrypt->sha1($pass);
    }

    function encode(){

        $message = "this is a secret message";
        $this->load->library('encrypt');

        echo $this->encrypt->encode($message);

    }

    function decode(){

        $this->load->library('encrypt');
        $encoded_message = "u9yBDMz5nvPV+gc44dlHjX5yqmy4sSLpPYGm/YqO89Xg3JoiRrXy09MUYTl/HfnsSoEMOYEYVdmb+dsfykxyMw==";
        echo $this->encrypt->decode($encoded_message);
    }

    function encode_with_key($key){

        $message = "this is a secret message";
        $this->load->library('encrypt');

        echo $this->encrypt->encode($message, $key);

    }

    function decode_with_key($key){

        $this->load->library('encrypt');
        $encoded_message = "aDc1iMCIisK6dHLgFY24Z3lr1L344fop55gB6bAMjBqhHVjIgI7pSnE6e2ifjb0FsGAF7dNnZwI4vhswsBeHAg==";
        echo $this->encrypt->decode($encoded_message, $key);
    }

    function sql(){
        $name = "Burak' OR name ='Admin";

        //unsafe
        $query = "SELECT * FROM users WHERE name = '$name'";

        $query = "SELECT * FROM users
                WHERE name = '".$this->db->escape_string($name)."'";

        $query = "SELECT * FROM users
                WHERE name = '".$this->db->escape_str($name)."'";

        $query = "SELECT * FROM users
                WHERE name = '".$this->db->escape($name)."'";

        $query = "SELECT * FROM users
                WHERE name LIKE '%".$this->db->escape_str($name)."%'";

        //no escaping needed(through active record)
        $this->db->select('*')->from('users')->where('name', $name);


    }

    function xss_filter(){
        //filtered by config
        $this->input->post('comment');

        //xss
        $this->input->post('comment', true);

        $clean_string = $this->input->xss_clean($string);
    }



}
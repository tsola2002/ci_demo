<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Input.php
 * Author: solidstunna101
 * Date: 28/09/13
 * Time: 09:08
 *
 */

class MY_Input extends CI_Input {



    function save_query($query_array){

        //CI object needs to be used cos were not inside a controller
        $CI =& get_instance();

        $CI->db->insert('ci_query', array('query_string' => http_build_query($query_array)));

        return $CI->db->insert_id();
    }

    function load_query($query_id){
        $CI =& get_instance();

        $rows = $CI->db->get_where('ci_query', array('id' => $query_id))->result();

        if(isset($rows[0])){
           parse_str($rows[0]->query_string, $_GET);
        }

    }

}
<?php
/**
 *
 * Package: ci_demo
 * Filename: mproducts.php
 * Author: solidstunna101
 * Date: 23/09/13
 * Time: 10:52
 *
 */

class Mproducts extends CI_Model {

    function get_all(){

        //pulls whole data from db table
        $results = $this->db->get('products')->result();

        foreach($results as &$result){
            //check if result has an option value present in its specific field
            if($result->option_values){
                //split comma seperated values using php explode function
                $result->option_values = explode(',', $result->option_values);
            }
        }

        //return the database
        return $results;
    }

    function get($id){
        $results = $this->db->get_where('products', array('id' => $id))->result();
        $result = $results[0];

        if($result->option_values){
            //split comma seperated values using php explode function
            $result->option_values = explode(',', $result->option_values);
        }

        return $result;
    }

}
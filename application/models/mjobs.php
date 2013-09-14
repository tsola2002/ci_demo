<?php
/**
 *
 * Package: ci_demo
 * Filename: mjobs.php
 * Author: solidstunna101
 * Date: 14/09/13
 * Time: 16:09
 *
 */

class Mjobs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function get_listings() {
        $data = array();

        $this->db->order_by('id', 'desc');
        $q = $this->db->get('jobs');

        /*First we check whether any results were returned from the database
         by running num_rows() on $q – in other words if the number of results
         are greater than 0.We then 'foreach' through the results and place them
         into the $data array.*/

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

}
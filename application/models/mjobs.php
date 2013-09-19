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

    function get_listings($category) {
        $data = array();

        /*
         * We can now do simple check on whether $category exists.
         * If it does, we know we have to retrieve listings from only that category; otherwise,
         *  we retrieve all listings as normal.
         * */

        if ($category) {
            $options = array('category' => $category);
            $this->db->order_by('id', 'desc');
            $q = $this->db->get_where('jobs', $options);
        }
        else {
            $this->db->order_by('id', 'desc');
            $q = $this->db->get('jobs');
        }

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

    /*
    *In the get_details() function we retrieve the ID passed from the controller as a parameter.
    *  The $this->db->get_where() is executing the equivalent of this SQL
    * statement: SELECT * FROM 'jobs' WHERE 'id' = $id LIMIT 1;
    * */

    function get_details($id) {
        $data = array();

        $options = array('id' => $id);
        $q = $this->db->get_where('jobs', $options, 1);

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

}
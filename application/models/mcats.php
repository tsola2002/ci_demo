<?php
/**
 *
 * Package: ci_demo
 * Filename: mcats.php
 * Author: solidstunna101
 * Date: 14/09/13
 * Time: 16:12
 *
 */

class Mcats extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * This function is very similar to the get_listings() function in the MJobs model,
     *  calling the data from the 'categories' table, sorted by the 'id' field in ascending order.
     * */
    function get_categories() {
        $data = array();

        $this->db->order_by('id', 'asc');
        $q = $this->db->get('categories');

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    /*
     * Very similar to the other functions we have.
     *  This one runs the equivalent of the following SQL statement:
     * SELECT * FROM 'categories' WHERE 'id' = $id LIMIT 1;
     * */

    function get_current_cat($id) {
        $data = array();

        $options = array('id' => $id);
        $q = $this->db->get_where('categories', $options, 1);

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

}
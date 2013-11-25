<?php
/**
 *
 * Package: ci_demo
 * Filename: items_model.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 11:33
 *
 */

class Items_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function get_all() {
        //get all items frm database
        return $this->db->get('items')->result();
    }

}
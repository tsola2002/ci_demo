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

    function get( $id ) {
        $r = $this->db->where( 'id', $id )->get( 'items' )->result();
        if ( $r ) return $r[0];
        return false;
    }

    function setup_payment( $item_id, $email, $key ) {
        $data = array(
            'item_id'  => $item_id,
            'key'      => $key,
            'email'    => $email,
            'active'   => 0 // hasn't been purchased yet
        );
        $this->db->insert( 'purchases', $data );
    }

}
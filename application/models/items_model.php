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
        //result method will return them in an array
        return $this->db->get('items')->result();
    }

    function get( $id ) {
        //retrieve id field matching id gotten frm url segment
        $r = $this->db->where( 'id', $id )->get( 'items' )->result();

        //if entry is found we return r otherwise return false
        if ( $r ) return $r[0];
        return false;
    }

    /*This is pretty simple: we create an array containing the provided item ID, user's email address and random key.
     We also set 'active' to 0 (this gets set to '1' upon payment confirmation). The array is then inserted into the 'purchases' table.*/
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
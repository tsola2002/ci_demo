<?php
/**
 *
 * Package: ci_demo
 * Filename: film_model.php
 * Author: solidstunna101
 * Date: 26/09/13
 * Time: 08:34
 *
 */

class Film_model extends CI_Model {

    function search($limit, $offset){

        //results query
        $q = $this->db->select('FID, title, category, length, rating, price')
            ->from('film_list')
            ->limit($limit, $offset);

        $ret['rows'] = $q->get()->result();


        //count query
        $q = $this->db->select('COUNT(*) as count', FALSE)
            ->from('film_list');

        //store second set of queries for count in $tmp variable
        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;

        return $ret;

    }

}
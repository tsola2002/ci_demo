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

    function search($limit, $offset, $sort_by, $sort_order){

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('FID','title', 'category', 'length', 'rating', 'price');
        //make sure sort by column is in the array of db table values
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'title';

        //results query
        $q = $this->db->select('FID, title, category, length, rating, price')
            ->from('film_list')
            ->limit($limit, $offset)
            ->order_by($sort_by, $sort_order);

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
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

    function search($query_array, $limit, $offset, $sort_by, $sort_order){

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('FID','title', 'category', 'length', 'rating', 'price');
        //make sure sort by column is in the array of db table values
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'title';

        //results query
        $q = $this->db->select('FID, title, category, length, rating, price')
            ->from('film_list')
            ->limit($limit, $offset)
            ->order_by($sort_by, $sort_order);

        if(strlen($query_array['title'])){
            $q->like('title', $query_array['title']);
        }

        if(strlen($query_array['category'])){
            $q->where('category', $query_array['category']);
        }

        if(strlen($query_array['length'])){
            $operators = array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<');
            $operator = $operators[$query_array['length_comparison']];
            $q->where("length $operator", $query_array['length']);

        }




        $ret['rows'] = $q->get()->result();


        //count query
        $q = $this->db->select('COUNT(*) as count', FALSE)
            ->from('film_list');


        if(strlen($query_array['title'])){
            $q->like('category', $query_array['title']);
        }

        if(strlen($query_array['category'])){
            $q->where('category', $query_array['category']);
        }

        if(strlen($query_array['length'])){
            $operators = array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<');
            $operator = $operators[$query_array['length_comparison']];
            $q->where("length $operator", $query_array['length']);

        }

        //store second set of queries for count in $tmp variable
        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;

        return $ret;

    }


    function category_options(){
        $rows = $this->db->select('name')
        ->from('category')
        ->get()->result();

        $category_options = array('' => '');
        foreach($rows as $row) {
            $category_options[$row->name] = $row->name;
        }

        return $category_options;
    }

}
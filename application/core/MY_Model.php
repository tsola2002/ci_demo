<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Model.php
 * Author: solidstunna101
 * Date: 22/08/13
 * Time: 12:58
 *
 */

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    //$_rules need to be public in order to be loaded in a controller
    public $_rules = array();
    protected $_timestamps = FALSE;

   /* function  __construct(){
        parent::__contruct();
    }*/

    //GLOBAL MODEL GENERIC FUNCTIONS

        /*
         * takes in id as a parameter*/

    public function get($id = NULL, $single = FALSE){
        //if we have an id then we need a single record
        //we filter the record to a variable then transfer it to the id
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }
        //if not then we need all records
        elseif($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }
        //if records have been ordered then
        if (!count($this->db->ar_orderby)) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

        //pass an array as parameter for get by and single variable
        //to help return a single value
    public function get_by($where, $single = FALSE){
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    //same as insert method
    //takes in parameter so dat there is always data present
    public function save($data, $id = NULL){

        // Set timestamps
        //if timestamp is present
        if ($this->_timestamps == TRUE) {
            //create mysql datetimestamp
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // Insert
        if ($id === NULL) {
            //if primary doesnt exist
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }

    //this method takes in id parameter
    public function delete($id){
        //set the filter
        $filter = $this->_primary_filter;
        $id = $filter($id);

        //if there is no filter then do not delete the record
        if (!$id) {
            return FALSE;
        }
        //look for specific record then delete it
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }

    //takes array of fields to post value for
    public function array_from_post($fields){
        //set new array
        //then loop thru the fields
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }


}
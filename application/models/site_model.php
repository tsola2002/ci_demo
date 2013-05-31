<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 31/05/13
 * Time: 15:37
 * To change this template use File | Settings | File Templates.
 */

class site_model extends CI_Model {

    //retrieves database table records using active records by retrieving the data table in the ci_demo_crud database
    function get_record(){

        $query = $this->db->get("data");
        return $query->result();

    }

    //adds new database record by refercing id
    function add_record($data){

        $this->db->insert('data', $data);
        return;

    }

    //this hard-coded update feature goes straight into the database and updates the record with an ID of 12
    function update_record($data){

        $this->db->where('id', 12);
        $this->db->update('data', $data);
    }

    //this deletes record by using url library to point to specified id then deletes the record
    function delete_row(){
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('data');
    }

}
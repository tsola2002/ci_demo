<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 03/06/13
 * Time: 14:53
 * To change this template use File | Settings | File Templates.
 */


class Membership_model extends CI_Model {

    function validate(){

        //retrieve all records where username equals to typed in username value
        //retrieve all records where password equals to typed in password value
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));

        $query = $this->db->get("membership");


        if($query->num_rows == 1){

           return true;

        }





    }










}
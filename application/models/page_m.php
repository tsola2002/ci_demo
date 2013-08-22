<?php
/**
 *
 * Package: ci_demo
 * Filename: page_m.php
 * Author: solidstunna101
 * Date: 22/08/13
 * Time: 13:50
 *
 */

class page_m extends MY_Model {

    //table values from the database needs to be used from database
    protected $_table_name = 'pages';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'order';
    protected $_rules = array();
    protected $_timestamps = FALSE;

}
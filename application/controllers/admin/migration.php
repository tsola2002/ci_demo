<?php
/**
 *
 * Package: ci_demo
 * Filename: migration.php
 * Author: solidstunna101
 * Date: 20/08/13
 * Time: 22:39
 *
 */

class Migration extends Admin_Controller  {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->library('migration');
        //looks for current migration in config & migration file
        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
        else{
            echo "migration worked";
        }
    }

}
<?php


class site extends CI_Controller {

    /*function __construct(){

        get_parent_class(CI_CORE);
       // parent::Controller();
        $this->is_logged_in();
    }*/

    function members_area(){

        $this->load->view('members_area');
    }

   /* function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true){
            echo 'you dont have access to this page. <a href="../login">Login</a>';
            die();
        }
    }*/
}

?>
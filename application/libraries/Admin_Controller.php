 <?php
/**
 *
 * Package: ci_demo
 * Filename: Admin_Controller.php
 * Author: solidstunna101
 * Date: 20/08/13
 * Time: 19:24
 *
 */

class Admin_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->data['meta_title'] = 'My awesome cms';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_m');
        $this->load->library('session');


        //authentication test
        //exception uris where we dont want login check to be executed
        $exception_uris = array(
            'admin/user/login',
            'admin/user/logout'
        );

        //if were currently in any one of those pages
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            //if a user is not logged in
            if ($this->user_m->loggedin() == FALSE) {
                //redirect user to login page
                redirect('admin/user/login');
            }
        }

    }





}
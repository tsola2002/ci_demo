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
    }

}
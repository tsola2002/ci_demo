 <?php
/**
 *
 * Package: ci_demo
 * Filename: Frontend_Controller.php
 * Author: solidstunna101
 * Date: 20/08/13
 * Time: 19:24
 *
 */

class Frontend_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();

        // Load stuff
        $this->load->model('page_m');

        // Fetch navigation
        $this->data['menu'] = $this->page_m->get_nested();
    }

}
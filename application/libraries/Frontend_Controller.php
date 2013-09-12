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
        $this->load->model('article_m');

        // Fetch navigation
        $this->data['menu'] = $this->page_m->get_nested();

        //set a variable to news archive
        $this->data['news_archive_link'] = $this->page_m->get_archive_link();

        //sets meta title to configs website name
        $this->data['meta_title'] = config_item('site_name');

    }

}
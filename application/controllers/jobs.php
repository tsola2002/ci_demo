<?php
/**
 *
 * Package: ci_demo
 * Filename: jobs.php
 * Author: solidstunna101
 * Date: 14/09/13
 * Time: 15:55
 *
 */

class Jobs extends CI_Controller {

    public function __construct(){
        parent::__construct();

        /*The first line we just set the site's title. This will be used later in the view to create our title tags.
        The second line makes the $data array available inside our models and view.
        CodeIgniter will actually de-compile this array when passing it to a model or view,
         so that the title can be accessed simply as*/

        $data['sitetitle'] = 'AGS Job Board';
        $this->load->vars($data);
    }

    function index() {
        redirect('jobs/listings');
    }

    function listings() {


        $data['listings'] = $this->mjobs->get_listings();
        $this->load->view('listings', $data);
    }

}
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
        $data['categories'] = $this->mcats->get_categories();
        $this->load->vars($data);
    }

    function index() {
        redirect('jobs/listings');
    }

    function listings() {


        $data['listings'] = $this->mjobs->get_listings($this->uri->segment(3));
        $data['category'] = $this->mcats->get_current_cat($this->uri->segment(3));
        $this->load->view('listings', $data);
    }

    /*
     * On the first line we're running the get_details() function from the MJobs model.
     *  You'll see that this time, we're passing a parameter with the function.
     * $this->uri->segment(3) retrieves the third segment of the URI. If our URL is:
     * http://localhost/jobs-tut/index.php/jobs/details/2/
     * Then the URI segments are (they start with the controller):
     * /jobs/details/2/
     * Of which the third, is "2". We're passing this through as a parameter so we can the specific listing's details.
     * We then load the details view (which will be at /views/details.php).*/

    function details() {
        $data['details'] = $this->mjobs->get_details($this->uri->segment(3));
        $this->load->view('details', $data);
    }

    function add() {
        $this->load->view('add');
    }

    function submit() {
        $this->mjobs->submit_listing();
    }



}
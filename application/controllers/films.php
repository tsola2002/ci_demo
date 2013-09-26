<?php
/**
 *
 * Package: ci_demo
 * Filename: films.php
 * Author: solidstunna101
 * Date: 26/09/13
 * Time: 07:15
 *
 */

class Films extends CI_Controller {

    function display($offset = 0){

        $limit = 20;

        //loading the model
        $this->load->model('film_model');

        //search function to be implemented
        //results array from database function search get stored in $results
        $results =  $this->film_model->search($limit,$offset);

        //this will return all the rows
        $data['films'] = $results['rows'];

        $data['num_results'] = $results['num_rows'];



        //load table view
        $this->load->view('films', $data);
    }
}
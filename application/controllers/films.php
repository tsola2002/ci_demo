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

    function display($sort_by = 'title', $sort_order = 'asc', $offset = 0){

        $limit = 20;

        $data['fields'] = array(
            'FID' => 'ID',
            'title' => 'Title',
            'category' => 'Category',
            'length' => 'Length',
            'price' => 'Price'
        );

        //loading the model
        $this->load->model('film_model');

        //search function to be implemented
        //results array from database function search get stored in $results
        $results =  $this->film_model->search($limit,$offset, $sort_by,$sort_order);

        //this will return all the rows
        $data['films'] = $results['rows'];

        $data['num_results'] = $results['num_rows'];

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("films/display/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;

        //load table view
        $this->load->view('films', $data);
    }
}
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

    //query id is uri segment default =0
    function display($query_id = 0, $sort_by = 'title', $sort_order = 'asc', $offset = 0){

        $limit = 20;

        $data['fields'] = array(
            'FID' => 'ID',
            'title' => 'Title',
            'category' => 'Category',
            'length' => 'Length',
            'price' => 'Price'
        );

        //custom function to load values into GET[] array
        $this->input->load_query($query_id);

        $data['query_id'] = $query_id;

        $query_array = array(
            'title' => $this->input->get('title'),
            'category' => $this->input->get('category'),
            'length_comparison' => $this->input->get('length_comparison'),
            'length' => $this->input->get('length'),
        );

        //debugging
       // print_r($query_array); return;

        //loading the model
        $this->load->model('film_model');

        //search function to be implemented
        //results array from database function search get stored in $results
        $results =  $this->film_model->search($query_array, $limit, $offset, $sort_by,$sort_order);

        //this will return all the rows
        $data['films'] = $results['rows'];

        $data['num_results'] = $results['num_rows'];

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("films/display/$query_id/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;

        $data['category_options'] = $this->film_model->category_options();

        //load table view
        $this->load->view('films', $data);
    }

    function search(){
        //build form fields values
        $query_array = array(
            'title' => $this->input->post('title'),
            'category' => $this->input->post('category'),
            'length_comparison' => $this->input->post('length_comparison'),
            'length' => $this->input->post('length'),
        );

        //turn the above data into query id
        //by generating a extended library function
        $query_id = $this->input->save_query($query_array);

        redirect("films/display/$query_id");


    }
}
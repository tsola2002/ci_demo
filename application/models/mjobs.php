<?php
/**
 *
 * Package: ci_demo
 * Filename: mjobs.php
 * Author: solidstunna101
 * Date: 14/09/13
 * Time: 16:09
 *
 */

class Mjobs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function get_listings($category) {
        $data = array();

        /*
         * We can now do simple check on whether $category exists.
         * If it does, we know we have to retrieve listings from only that category; otherwise,
         *  we retrieve all listings as normal.
         * */

        if ($category) {
            $options = array('category' => $category);
            $this->db->order_by('id', 'desc');
            $q = $this->db->get_where('jobs', $options);
        }
        else {
            $this->db->order_by('id', 'desc');
            $q = $this->db->get('jobs');
        }

        /*First we check whether any results were returned from the database
         by running num_rows() on $q – in other words if the number of results
         are greater than 0.We then 'foreach' through the results and place them
         into the $data array.*/

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    /*
    *In the get_details() function we retrieve the ID passed from the controller as a parameter.
    *  The $this->db->get_where() is executing the equivalent of this SQL
    * statement: SELECT * FROM 'jobs' WHERE 'id' = $id LIMIT 1;
    * */

    function get_details($id) {
        $data = array();

        $options = array('id' => $id);
        $q = $this->db->get_where('jobs', $options, 1);

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }


    /*
     * $this->form_validation->run() will execute the validation rules.
     *  If the validation does not pass, the function returns 'FALSE'.
     *  In this case, the /views/add.php view file is re-loaded,
     *  the appropriate validation errors will display and the form fields will automatically re-populate.
     * If the validation passes (returns 'TRUE'), the POST data is assembled into an array with the user's IP address
     *  and the UNIX timestamp of the current time both appended to the form data.
     * The $data is then inserted into the database using the $this->db->insert() Active Record function.
     * Following that, the user is redirected to the main listings page where their new listing should be sitting at the top of the list.
     * */

    function submit_listing() {
        $this->form_validation->set_rules('title', 'Title', 'required|max_length[250]|htmlspecialchars');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('body', 'Job Description', 'required|htmlspecialchars');
        $this->form_validation->set_rules('type', 'Job Type', 'required|max_length[30]');
        $this->form_validation->set_rules('location', 'Location', 'required|max_length[100]');
        $this->form_validation->set_rules('company', 'Your/Company Name', 'required|max_length[100]');
        $this->form_validation->set_rules('url', 'URL', 'max_length[100]|prep_url');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add');
        }
        else {
            $data = array(
                'title'     =>  $this->input->post('title'),
                'category'  =>  $this->input->post('category'),
                'body'      =>  $this->input->post('body'),
                'type'      =>  $this->input->post('type'),
                'location'  =>  $this->input->post('location'),
                'company'   =>  $this->input->post('company'),
                'url'       =>  $this->input->post('url'),
                'email'     =>  $this->input->post('email'),
                'ipaddress' =>  $this->input->ip_address(),
                'posted'    =>  time()
            );
            $this->db->insert('jobs', $data);
            redirect('jobs/listings');
        }
    }

}
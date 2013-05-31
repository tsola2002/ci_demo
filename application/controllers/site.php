<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 31/05/13
 * Time: 15:40
 * To change this template use File | Settings | File Templates.
 */

class site extends CI_Controller {

    function index(){
        $data = array();


        if($query = $this->site_model->get_record())
        {

            $data['records'] =$query;
        }

        $this->load->view('options_view', $data);
    }

    function create(){

        $data = array(

            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );

        $this->site_model->add_record($data);
        $this->index();

    }

    function delete(){

        $this->site_model->delete_row();
        $this->index();
    }

    function update(){

        $data = array(

            'title' => 'My freshly updated title',
            'content' => 'new updated content goes here'
        );

        $this->site_model->update_record($data);
    }

}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 13/06/13
 * Time: 14:19
 * To change this template use File | Settings | File Templates.
 */

class gallery extends CI_Controller {

    function index(){
        $this->load->model('gallery_model');


        //check for form field upload
        if($this->input->post('upload')){

            $this->gallery_model->do_upload();
        }

        //assigns variable to get_image function in model
        $data['images'] = $this->gallery_model->get_image();

        //loads page & passes images alongside it trough $data
        $this->load->view('gallery_view', $data);

    }

}
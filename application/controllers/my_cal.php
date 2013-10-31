<?php
/**
 *
 * Package: ci_demo
 * Filename: my_cal.php
 * Author: solidstunna101
 * Date: 31/10/13
 * Time: 16:32
 *
 */

class My_cal extends CI_Controller {

    function display($year = null, $month = null){

        $this->load->model('my_cal_model');
        $data['calendar'] = $this->my_cal_model->generate($year, $month);

        $this->load->view('my_cal', $data);


    }

}
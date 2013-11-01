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

    public function __construct()
    {
        parent::__construct();
        //this loads the profiler
        $this->output->enable_profiler(TRUE);
    }

    function display($year = null, $month = null){

        //initialize year & month values because null cannot be accepted
        if(!$year){
            $year = date('Y');
        }
        if(!$month){
            $month = date('m');
        }

        $this->load->model('my_cal_model');

        //check incoming post of day field frm calendar
        if($day = $this->input->post('day')){
            //if post exist then input form fields into database
            $this->my_cal_model->add_calendar_data(
                "$year-$month-$day",
                $this->input->post('data')
            );
        }


        $data['calendar'] = $this->my_cal_model->generate($year, $month);

        $this->load->view('my_cal', $data);


    }

}
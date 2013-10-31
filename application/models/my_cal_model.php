<?php
/**
 *
 * Package: ci_demo
 * Filename: my_cal_model.php
 * Author: solidstunna101
 * Date: 31/10/13
 * Time: 16:44
 *
 */

class My_cal_model extends CI_Model {

    var $conf;

    public function __construct()
    {
        parent::__construct();

        $this->conf = array(
            'start_day' => 'monday',
            'show_next_prev' => true,
            'next_prev_url' => base_url() .'my_cal/display'
        );

        $this->conf['template'] = '

              {table_open}<table class="calendar" border="0" cellpadding="0" cellspacing="0">{/table_open}

       {heading_row_start}<tr>{/heading_row_start}

       {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
       {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
       {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

       {heading_row_end}</tr>{/heading_row_end}

       {week_row_start}<tr>{/week_row_start}
       {week_day_cell}<td>{week_day}</td>{/week_day_cell}
       {week_row_end}</tr>{/week_row_end}

       {cal_row_start}<tr class="days">{/cal_row_start}
       {cal_cell_start}<td>{/cal_cell_start}

       {cal_cell_content}
        <div class="day_num">{day}</div>
        <div class="content">{content}</div>
       {/cal_cell_content}
       {cal_cell_content_today}
            <div class="day_num highlight">{day}</div>
            <div class="content">{content}</div>
       {/cal_cell_content_today}

       {cal_cell_no_content}
            <div class="day_num">{day}</div>
       {/cal_cell_no_content}
       {cal_cell_no_content_today}
            <div class="day_num highlight">{day}</div>
       {/cal_cell_no_content_today}

       {cal_cell_blank}&nbsp;{/cal_cell_blank}

       {cal_cell_end}</td>{/cal_cell_end}
       {cal_row_end}</tr>{/cal_row_end}

       {table_close}</table>{/table_close}


        ';

    }

    //takes in year & month
    function get_calendar_data($year, $month){

        //fetch content of the days
        //by selecting date & date fields frm calendar table
        //like function will look for a string like $year-$month
        //pass after as wildcard(%)character
        //sql like syntax = date LIKE "2010-02%"
        $query = $this->db->select('date, data')
                          ->from('calendar')
                          ->like('date', "$year-$month", 'after')
                          ->get();
        //create array for population
        $cal_data = array();

        //setup loop to go tru results set
        // retrieve row->$data, then assign it an $cal_data array
        //to retrieve the day we use substring method
        //so we select next two positions after 8th position
        foreach($query->result() as $row){
            $cal_data[substr($row->date,8,2)] = $row->data;
;        }

        return $cal_data;
    }

    function generate($year, $month){



        // echo "hello frm cal";
        $this->load->library('calendar', $this->conf);


        //call other function and store its result in variable
        $cal_data = $this->get_calendar_data($year, $month);


        //this will return the calendar
        return $this->calendar->generate($year, $month, $cal_data);
    }

}
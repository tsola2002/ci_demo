<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Profiler.php
 * Author: solidstunna101
 * Date: 01/11/13
 * Time: 11:41
 *
 */

class MY_Profiler extends CI_Profiler {

    //library to extend core profiler class
    public function run()
    {
        $output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";
        $fields_displayed = 0;

        foreach ($this->_available_sections as $section)
        {
            if ($this->_compile_{$section} !== FALSE)
            {
                $func = "_compile_{$section}";
                $output .= $this->{$func}();
                $fields_displayed++;
            }
        }

        if ($fields_displayed == 0)
        {
            $output .= '<p style="border:1px solid #5a0099;padding:10px;margin:20px 0;background-color:#eee">'.$this->CI->lang->line('profiler_no_profiles').'</p>';
        }

        $output .= '</div>';


        //this will put logs into logs folder
        file_put_contents(BASEPATH . "logs/profiler.php", $output);

        //stop code frm returning output & return empty string instead
       // return $output;
        return '';
    }

    protected function _compile_memory_usage()
    {
        $output  = "\n\n";
        $output .= '<fieldset id="ci_profiler_memory_usage" style="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
        $output .= "\n";
        $output .= '<legend style="color:#5a0099;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_memory_usage').'&nbsp;&nbsp;</legend>';
        $output .= "\n";

        if (function_exists('memory_get_usage') && ($usage = memory_get_usage()) != '')
        {
            $output .= "<div style='color:#5a0099;font-weight:normal;padding:4px 0 4px 0'>".number_format($usage).' bytes</div>';
            $output .= "<div style='color:#5a0099;font-weight:normal;padding:4px 0 4px 0'>".number_format(memory_get_peak_usage()).' bytes (peak usage)</div>';
        }
        else
        {
            $output .= "<div style='color:#5a0099;font-weight:normal;padding:4px 0 4px 0'>".$this->CI->lang->line('profiler_no_memory')."</div>";
        }

        $output .= "</fieldset>";

        return $output;
    }
}
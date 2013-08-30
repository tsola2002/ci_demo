<?php
/**
 *
 * Package: ci_demo
 * Filename: cms_helper.php
 * Author: solidstunna101
 * Date: 25/08/13
 * Time: 16:06
 *
 */

//takes in parameter
function btn_edit ($uri)
{
    //return anchor tag with bootstrap icon
    return anchor($uri, '<i class="icon-edit"></i>');
}

function btn_delete ($uri)
{
    return anchor($uri, '<i class="icon-remove"></i>', array(
        'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
    ));
}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}
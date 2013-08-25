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
<?php
/**
 *
 * Package: ci_demo
 * Filename: pagination.php
 * Author: solidstunna101
 * Date: 05/09/13
 * Time: 22:35
 *
 */

//wrapping pagination in unordered list to support bootstrap
$config['full_tag_open'] = '<ul>';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = FALSE;
$config['last_link'] = FALSE;
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
//bootstrap expects pagination items to be links
$config['cur_tag_open'] = '<li><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Package: ci_demo
 * Filename: email.php
 * Author: solidstunna101
 * Date: 30/10/13
 * Time: 18:54
 *
 */

//the following piece of code sends an email to my gmail account
//make sure open ssl is enabled in php.ini
$config['protocol']    = 'smtp';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'omatsolasobotie@gmail.com';
$config['smtp_pass']    = 'tsobotie';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'text'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not

<!--
/**
 *
 * Package: ci_demo
 * Filename: page_head.php
 * Author: solidstunna101
 * Date: 03/09/13
 * Time: 20:52
 *
 */-->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $meta_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--loading bootstrap/base styles-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css"/>

    <!--third party links/scripts-->
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200,300,400,500,600,700,900' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>img/apple-touch-icon-144x144.png">


    <!--loading base/custom javascripts-->
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/custom.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>

</head>

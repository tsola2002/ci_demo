<?php
/**
 *
 * Package: ci_demo
 * Filename: header.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 11:42
 *
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $page_title . ' | ' . $site_name; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
</head>
<body>
<div id="wrap" class="container">

    <header>
        <div class="jumbotron">
            <h1><?php echo anchor( '', $site_name ); ?></h1>
        </div>
    </header>

    <section>

        <?php

            /*This simply displays a 'success' or 'error' message if either exist in the user's session.
            Note: Anything stored in 'flashdata' (as our success and error messages are) are displayed
             only on the next page the user loads - CodeIgniter clears them on the next page load so they only display once.*/
        if ( $this->session->flashdata( 'success' ) )
            echo '<p class="success">' . $this->session->flashdata( 'success' ) . '</p>';

        if ( $this->session->flashdata( 'error' ) )
            echo '<p class="error">' . $this->session->flashdata( 'error' ) . '</p>';
        ?>
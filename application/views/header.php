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
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
    <title><?php echo $page_title . ' | ' . $site_name; ?></title>
</head>
<body>
<div id="wrap">

    <header>
        <h1><?php echo anchor( '', $site_name ); ?></h1>
    </header>

    <section>

        <?php
        if ( $this->session->flashdata( 'success' ) )
            echo '<p class="success">' . $this->session->flashdata( 'success' ) . '</p>';

        if ( $this->session->flashdata( 'error' ) )
            echo '<p class="error">' . $this->session->flashdata( 'error' ) . '</p>';
        ?>
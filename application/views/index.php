<?php
/**
 *
 * Package: ci_demo
 * Filename: index.php
 * Author: solidstunna101
 * Date: 29/11/13
 * Time: 09:48
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
    <title>Html5 Boilerplate</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link href="<?php echo base_url(); ?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/core.js"></script>

</head>
<body>
<div  id="wrap" class="container">

    <?php $this->view($content); ?>

    <div class="cart_list">
        <h3>Your shopping cart</h3>
        <div id="cart_content">
            <?php echo $this->view('cart/cart.php'); ?>
        </div>
    </div>

</div>
</body>
</html>
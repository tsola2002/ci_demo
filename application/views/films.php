<!--
/**
 *
 * Package: ci_demo
 * Filename: films.php
 * Author: solidstunna101
 * Date: 26/09/13
 * Time: 07:18
 *
 */-->

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>

    <!--loading bootstrap/base styles-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-custom.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css"/>
</head>
<body>
<h1>Sakila database</h1>
<div id="count">
    Found <?php echo $num_results; ?> Films in the database
</div>
<table>
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Length</th>
        <th>Rating</th>
        <th>Price</th>
    </thead>

    <tbody>
    <?php foreach($films as $film): ?>

    <tr>
        <td><?php echo $film->FID; ?></td>
        <td><?php echo $film->title; ?></td>
        <td><?php echo $film->category; ?></td>
        <td><?php echo $film->length; ?></td>
        <td><?php echo $film->rating; ?></td>
        <td><?php echo $film->price; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>
</body>
</html>
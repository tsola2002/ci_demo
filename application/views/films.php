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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
</head>
<body>
<div class="container">
    <div class="hero-unit">
        <h1>Sakila Database</h1>
    </div>

<div id="count">
    Found <?php echo $num_results; ?> Films in the database
</div>
<table>
    <thead>
    <?php foreach($fields as $field_name => $field_display): ?>
        <th <?php if($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>><?php echo anchor("films/display/$field_name/" .
                (($sort_order == 'asc' && $sort_by == $field_name )? 'desc': 'asc'),
                $field_display); ?></th>
    <?php endforeach; ?>
    </thead>

    <tbody>
    <?php foreach($films as $film): ?>
    <tr>
        <?php foreach($fields as $field_name => $field_display): ?>
            <td>
                <?php echo $film->$field_name; ?>
            </td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>

    <?php if(strlen($pagination)): ?>
        <div id="pagination">
            Pages: <?php echo $pagination; ?>
        </div>
    <?php endif; ?>

</div><!--  end of container  -->
</body>
</html>
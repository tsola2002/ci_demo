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

    <?php echo form_open('films/search'); ?>
        <div>
            <?php echo form_label('Title', 'title'); ?>
            <?php echo form_input('title', set_value('title'), 'id="title"'); ?>
        </div>

    <div>
        <?php echo form_label('Category:', 'category'); ?>
        <?php echo form_dropdown('category', $category_options,'id="category"'); ?>
    </div>

    <div>
        <?php echo form_label('Length', 'length'); ?>
        <?php echo form_dropdown('length_comparison',
           array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<') ,
        set_value('length_comparison'), 'id="length_comparison"'); ?>
        <?php echo form_input('length', set_value('length'), 'id="length"'); ?>
    </div>

    <div>
        <?php echo form_submit('action', 'Search'); ?>
    </div>

    <?php echo form_close(); ?>

<div id="count">
    Found <?php echo $num_results; ?> Films in the database
</div>
<table>
    <thead>
    <?php foreach($fields as $field_name => $field_display): ?>
        <th <?php if($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>><?php echo anchor("films/display/$query_id/$field_name/" .
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
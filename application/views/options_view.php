<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Create</h2>
<?php echo form_open('site/create'); ?>

    <p>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" />
    </p>

    <p>
        <label for="content">Content:</label>
        <input type="text" name="content" id="content" />
    </p>

    <p>
        <input type="submit" value="Submit" />
    </p>
<?php echo form_close(); ?>

<hr/>

<h2>Read</h2>

<?php if(isset($records)): foreach($records as $row) : ?>

<h2><?php echo anchor("site/delete/$row->id" , $row->title); ?></h2>
<div><?php echo $row->content; ?></div>

<?php endforeach; ?>

<?php else : ?>

<h2>No Records were returned</h2>

<?php endif; ?>

<h2>Delete</h2>
<hr/>

<p>Click on one of above records to delete the item.</p>

</body>
</html>
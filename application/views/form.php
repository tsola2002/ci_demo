<?php
/**
 *
 * Package: ci_demo
 * Filename: form.php
 * Author: solidstunna101
 * Date: 02/11/13
 * Time: 09:41
 *
 */
?>
<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Test Form</title>
</head>
<body>
<?php echo form_open('test/form_submit'); ?>
    <?php echo validation_errors('<p>', '<p>'); ?>

    <p>Username: <?php echo form_input('username', set_value('username')); ?></p>

    <p>Password: <?php echo form_password('password'); ?></p>

    <p><?php echo form_submit('submit', 'create account'); ?></p>

    <p>Captcha Code: <?php echo $captcha; ?></p>
    <?php
        $data_form = array(
            'name' => 'captcha'
        );
        echo form_input($data_form);
    ?>
<?php echo form_close();?>
</body>
</html>
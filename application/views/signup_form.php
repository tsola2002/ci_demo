<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 12/06/13
 * Time: 08:09
 * To change this template use File | Settings | File Templates.
 */

?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Form</title>
</head>
<body>
    <h2>Create Account</h2>
    <fieldset>
        <legend>Personal Info</legend>
        <?php echo form_open('login/create_member'); ?>

        <?php echo form_input('first_name', set_value('first_name', 'first_name')); ?>
        <?php echo form_input('last_name', set_value('last_name', 'last_name')); ?>
        <?php echo form_input('email', set_value('email', 'email')); ?>
    </fieldset>

    <fieldset>
        <legend>Create Info</legend>
        <?php echo form_input('username', set_value('username', 'username')); ?>
        <?php echo form_input('password', set_value('password', 'password')); ?>
        <?php echo form_input('password2', set_value('password2', 'password2')); ?>

        <?php echo form_submit('submit', 'Create Account') ?>

        <?php echo validation_errors('<p class="error">'); ?>
    </fieldset>
</body>
</html>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 03/06/13
 * Time: 11:23
 * To change this template use File | Settings | File Templates.
 */




?>

<div id="login_form">

    <h1>Login Fool</h1>

    <?php

        echo form_open('login/validate_credentials');
        echo form_input('username', 'username');
        echo form_password('password', 'password');
        echo form_submit('submit', 'login');
        echo anchor('login/signup', 'create account');

    ?>

</div>
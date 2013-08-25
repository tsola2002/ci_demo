<?php
/**
 *
 * Package: ci_demo
 * Filename: login.php
 * Author: solidstunna101
 * Date: 25/08/13
 * Time: 12:01
 *
 */

?>

<div class="modal-header">
	<h3>Log in</h3>
	<p>Please log in using your credentials</p>
</div>
<div class="modal-body">
    <!--testing to see if databased session is generated after login-->
    <?php //echo '<pre>' . print_r($this->session->userdata, TRUE) . '</pre>'; ?>
<!--  generates dynamic codeigniter based errors incase they havent been filled  -->
<?php echo validation_errors(); ?>
<!--  creating a dynamic codeigniter-based form  -->
<?php echo form_open();?>
<table class="table">
    <tr>
        <td>Email</td>
        <!--  codeigniter based form tags with labels  -->
        <td><?php echo form_input('email'); ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo form_password('password'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('submit', 'Log in', 'class="btn btn-primary"'); ?></td>
    </tr>
</table>
<?php echo form_close();?>
</div>
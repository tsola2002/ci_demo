



<div class="modal-header">
    <!--add a heading depending on whether we have a valid id or not using shorthand conditional-->
	<h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit user ' . $user->name; ?></h3>
</div>
<div class="modal-body">
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <table class="table">
        <tr>
            <td>Name</td>
            <td><?php echo form_input('name'); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo form_input('email'); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo form_password('password'); ?></td>
        </tr>
        <tr>
            <td>Confirm password</td>
            <td><?php echo form_password('password_confirm'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>
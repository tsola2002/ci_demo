<?php
/**
 *
 * Package: ci_demo
 * Filename: newsletter.php
 * Author: solidstunna101
 * Date: 30/10/13
 * Time: 19:35
 *
 */
?>
<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>

</head>
<body>
 <div id="newsletter">
     <h2>Signup For the Newsletter</h2>
     <?php echo form_open('emailtest/send'); ?>

     <?php
     $name_data = array(
         'name' => 'name',
         'id' => 'name',
         'value' => set_value('name'),
     );
     ?>

     <p><label for="name">Name: </label>
         <?php echo form_input($name_data); ?>
     </p>

     <p><label for="name">Email Address:</label>
         <input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"/>
     </p>

     <p><?php echo form_submit('submit', 'Submit'); ?></p>
     <?php echo form_close(); ?>

     <?php echo validation_errors('<p class="error">'); ?>
 </div>
</body>
</html>
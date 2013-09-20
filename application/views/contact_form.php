
<!--/**
 *
 * Package: ci_demo
 * Filename: contact_form.php
 * Author: solidstunna101
 * Date: 20/09/13
 * Time: 14:53
 *
 */-->

<h1>contact us form</h1>

<?php
echo form_open('contact/submit');
echo form_input('name', 'Name', 'id="name"');
echo form_input('email', 'Email', 'id="email"');
$data = array(
    'name' => 'message',
    'cols' => 30,
    'rows' => 15
);
echo form_textarea($data, 'Message', 'id="message"');
echo form_submit('submit', 'Submit', 'id="submit"');

echo form_close();
?>

<script type="text/javascript">
   $("document").ready(function(){

       $('#submit').click(function(){

           var name = $('#name').val();

           if (!name || name == 'Name'){
               alert('Please enter your name');
               return false;
           }

           var form_data = {
               name: $('#name').val(),
               email: $('#email').val(),
               message: $('#message').val(),
               ajax: '1'
           };

           //pass in same url as form
           //siteurl builds the path to ur ctrler/method name
           //data will be form_data variable created
           //success will be callback function dat receives parameter
           //dat will later on act as output to be output
           $.ajax({
               url: "<?php site_url('contact/submit'); ?>",
               type: 'POST',
               data: form_data,
               success: function(msg) {
                    alert(msg);
                   //$('body').html(msg);
               }
           });

           return false;
       });

   });
</script>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 14/06/13
 * Time: 17:23
 * To change this template use File | Settings | File Templates.
 */

?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Test Email</h2>
<p class="error"><?php echo $flash; ?></p>
<form action="<?php base_url('send'); ?>" method="post">
    <input name="name" value="name" type="text" />
    <input type="text" name="email" value="email" />
    <input type="text" name="message" value="message" />
    <input type="submit" name="submit" value="send email" />
</form>

</body>
</html>
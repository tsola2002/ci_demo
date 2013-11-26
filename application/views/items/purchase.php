<?php
/**
 *
 * Package: ci_demo
 * Filename: purchase.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 14:17
 *
 */
?>

<h2>Purchase</h2>

<?php $segments = array( 'item', url_title( $item->name, 'dash', true ), $item->id ); ?>
<p>To purchase &ldquo;<?php echo anchor( $segments, $item->name ); ?>&rdquo;, enter your email
    address below and click through to pay with PayPal. Upon confirmation of your payment, we will
    email you your download link to the address you enter below.</p>

<?php

/*Here we use CodeIgniter's form helper to create the opening tag for the form which directs back to the current page.
 In the form we collect the user's email address so we can send them their download link after once we receive confirmation of their purchase from PayPal.*/
$url_title = url_title( $item->name, 'dash', true );
echo form_open( 'purchase/' . $url_title . '/' . $item->id );
echo validation_errors( '<p class="error">', '</p>' );
?>
<p>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" /> &nbsp;
    <input type="submit" value="Pay $<?php echo $item->price; ?> via PayPal" />
</p>
</form>
<?php
/**
 *
 * Package: ci_demo
 * Filename: details.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 14:06
 *
 */

?>

<h2><?php echo $item->name . '&ndash; $' . $item->price; ?></h2>

<p><?php echo nl2br( $item->description ); ?></p>

<?php $segments = array( 'purchase', url_title( $item->name, 'dash', true ), $item->id ); ?>
<p class="purchase"><?php echo anchor( $segments, 'Purchase' ); ?></p>
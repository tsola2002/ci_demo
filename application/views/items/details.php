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
<?php
//we use the nl2br() function to convert SQL-style linebreaks in the item's description into HTML-style <br /> tags.
//We then create a SEO-friendly link to a purchase page (for example http://example.com/purchase/unix-and-chmod/1).
?>
<p><?php echo nl2br( $item->description ); ?></p>

<?php $segments = array( 'purchase', url_title( $item->name, 'dash', true ), $item->id ); ?>
<p class="purchase btn"><?php echo anchor( $segments, 'Purchase'); ?></p>

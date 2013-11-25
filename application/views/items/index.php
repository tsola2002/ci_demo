<?php
/**
 *
 * Package: ci_demo
 * Filename: index.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 11:44
 *
 */

?>

<?php
if (!$items) :
    echo '<p>No items found.</p>';

else :
    echo '<h2>Items</h2>';
    echo '<ul>';

    foreach ( $items as $item ) {
        $segments = array( 'item', url_title( $item->name, 'dash', true ), $item->id );
        echo '<li>' . anchor( $segments, $item->name ) . ' &ndash; $' . $item->price . '</li>';
    }

    echo '</ul>';

endif;


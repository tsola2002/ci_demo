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
        /*segment of the URL). The first segment is simply 'item', then we use the CodeIgniter's url_title() function to make the item's name URL-friendly (removing capital letters and replacing spaces with dashes).
         And the third segment is the item's ID.*/
        $segments = array( 'item', url_title( $item->name, 'dash', true ), $item->id );
        echo '<li>' . anchor( $segments, $item->name ) . ' &ndash; $' . $item->price . '</li>';
    }

    echo '</ul>';

endif;


<?php
/**
 *
 * Package: ci_demo
 * Filename: order_ajax.php
 * Author: solidstunna101
 * Date: 30/08/13
 * Time: 15:18
 *
 */
?>

<?php
echo get_ol($pages);

//recursive function to help display items in a nested ordered list
function get_ol ($array, $child = FALSE)
{
    //set empty string
    $str = '';

    //if array has any empty items in it
    if (count($array)) {
        $str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';

        foreach ($array as $item) {
            $str .= '<li id="list_' . $item['id'] .'">';
            $str .= '<div>' . $item['title'] .'</div>';

            // Do we have any children?
            if (isset($item['children']) && count($item['children'])) {
                $str .= get_ol($item['children'], TRUE);
            }

            //close up list item tag & add a php line ending
            $str .= '</li>' . PHP_EOL;
        }
        //close orderlist tag & add a line ending
        $str .= '</ol>' . PHP_EOL;
    }

    return $str;
}
?>

<script>
    $(document).ready(function(){

        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            maxLevels: 2
        });

    });
</script>
<?php
/**
 *
 * Package: ci_demo
 * Filename: cms_helper.php
 * Author: solidstunna101
 * Date: 25/08/13
 * Time: 16:06
 *
 */

//takes in parameter
function btn_edit ($uri)
{
    //return anchor tag with bootstrap icon
    return anchor($uri, '<i class="icon-edit"></i>');
}

function btn_delete ($uri)
{
    return anchor($uri, '<i class="icon-remove"></i>', array(
        'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
    ));
}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

//filter input, escape output
function e($string){
    return htmlentities($string);
}

//same as order_ajax.php's get_menu()
function get_menu ($array, $child = FALSE)
{
    //accessing codeigniters super object
    $CI =& get_instance();
    $str = '';

    //ul should hava a class of nav
    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

        foreach ($array as $item) {
            //conditional to check whether first segment equals to item slug
            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                //add class of active to opening tag if active is true
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
            }
            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ul>' . PHP_EOL;
    }

    return $str;
}

//function just sets & returns url
function article_link($article){
    return 'article/' . intval($article->id) . '/' . e($article->slug);
}

//displays list of article titles to display in the sidebar
//takes in array of articles contains them in unordered list
function article_links($articles){
    $string = '<ul>';
    foreach ($articles as $article) {
        $url = article_link($article);
        $string .= '<li>';
        $string .= '<h3>' . anchor($url, e($article->title)) .  ' ›</h3>';
        $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
        $string .= '</li>';
    }
    $string .= '</ul>';
    return $string;
}

//takes in artcle & numwords to be displayed in blog
function get_excerpt($article, $numwords = 50){
    //setup a variable to hold full url to the article
    $string = '';
    $url = article_link($article);
    //setup a dynamic heading with anchor tag
    $string .= '<h2>' . anchor($url, e($article->title)) .  '</h2>';
    $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
    //setup article body, strip away html tags, run through escape function
    $string .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
    //dynamic paragraph with anchor containing article title
    $string .= '<p>' . anchor($url, 'Read more ›', array('title' => e($article->title))) . '</p>';
    return $string;
}

//function to help cut text off at certain number of words
function limit_to_numwords($string, $numwords){
    //excerpt variable to be ran through explode function
    $excerpt = explode(' ', $string, $numwords + 1);
    if (count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }
    //popped array should give us maximum number of words
    $excerpt = implode(' ', $excerpt);
    return $excerpt;
}
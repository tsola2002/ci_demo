
<!--
/**
 *
 * Package: ci_demo
 * Filename: page.php
 * Author: solidstunna101
 * Date: 11/09/13
 * Time: 16:22
 *
 */
-->


<!-- Main content -->
<div class="span9">
    <article>
        <!--echo escape function to pass in the page title-->
        <h2><?php echo e($page->title); ?></h2>
        <?php echo $page->body; ?>
    </article>
</div>

<!-- Sidebar -->
<div class="span3 sidebar">
    <h2>Recent news</h2>
    <?php $this->load->view('sidebar'); ?>
</div>
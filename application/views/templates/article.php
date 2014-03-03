<?php
/**
 *
 * Package: ci_demo
 * Filename: article.php
 * Author: solidstunna101
 * Date: 11/09/13
 * Time: 14:33
 *
 */

?>

<!-- Main content -->
<div class="col col-lg-9">
    <article>
        <!--heading will contain articles title field ran through an escape method-->
        <h2><?php echo e($article->title); ?></h2>
        <!--header will contain articles pubdate field ran through an escape method-->
        <p class="pubdate"><?php echo e($article->pubdate); ?></p>
        <?php echo $article->body; ?>
    </article>
</div>

<!-- Sidebar -->
<div class="col col-lg-3 sidebar">
    <h2>Recent news</h2>
    <?php $this->load->view('sidebar'); ?>
</div>
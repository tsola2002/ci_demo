<!--
/**
 *
 * Package: ci_demo
 * Filename: news_archive.php
 * Author: solidstunna101
 * Date: 04/09/13
 * Time: 11:42
 *
 */-->

<!-- Main content -->
<div class="col col-lg-9">
    <div class="row">
        <!--if we have any articles, list them-->
        <?php if (count($articles)): foreach ($articles as $article): ?>
            <article class="col col-lg-9"><?php echo get_excerpt($article); ?><hr></article>
        <?php endforeach; endif; ?>
    </div>
    <?php if($pagination): ?>
        <?php echo $pagination; ?>
    <?php endif; ?>
</div>

<!-- Sidebar -->
<div class="col col-lg-3 sidebar">
    <h2>Recent news</h2>
    <?php $this->load->view('sidebar'); ?>
</div>
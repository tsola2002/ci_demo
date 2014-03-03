<!--
/**
 *
 * Package: ci_demo
 * Filename: homepage.php
 * Author: solidstunna101
 * Date: 04/09/13
 * Time: 11:40
 *
 */-->

<!-- Main content -->
<div class="col col-lg-9">
    <div class="row">
        <!--page article must be set before we can get the excerpt-->
        <div class="col col-lg-9"><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></div><!--end of sub1span9-->
    </div>
    <div class="row">
        <div class="col col-lg-5"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
        <div class="col col-lg-4"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
    </div>
</div>

<!-- Sidebar -->
<div class="col col-lg-3 sidebar">
    <h2>Recent news</h2>
    <!--passing in dynamic news archive link-->
    <?php echo anchor($news_archive_link, '+ News archive'); ?>
    <!--slicing articles array with offset of 3-->
    <?php $articles = array_slice($articles, 3); ?>
    <?php echo article_links($articles); ?>
</div>
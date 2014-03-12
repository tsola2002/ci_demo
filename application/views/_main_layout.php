
<!--/**
 *
 * Package: ci_demo
 * Filename: _main_layout.php
 * Author: solidstunna101
 * Date: 03/09/13
 * Time: 20:49
 *
 */-->

<?php $this->load->view('components/page_head');?>


<body>
<nav class="navbar navbar-fixed-top navbar-default navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="collapse" class="collapse navbar-collapse">

        <?php echo get_menu($menu); ?>

    </div>
</nav><!--  end of nav  -->
<div class="container heading">
        <section>
            <h1><?php echo anchor('', strtoupper(config_item('site_name'))); ?></h1>
        </section>

</div>

<div class="container">
    <div class="row">
        <!-- Main content -->
        <?php $this->load->view('templates/' . $subview); ?>
    </div>
</div>


<?php $this->load->view('components/page_tail');?>
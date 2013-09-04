
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

<div class="container">
    <section>
        <h1><?php echo config_item('site_name'); ?></h1>
    </section>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <?php echo get_menu($menu); ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Main content -->
        <?php $this->load->view('templates/' . $subview); ?>
    </div>
</div>
<?php $this->load->view('components/page_tail');?>
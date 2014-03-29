
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
<div id="wrap" class="container">
    <div class="row">
        <nav class="navbar navbar-default col col-lg-12" role="navigation">
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

        <div id="art" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#art" data-slide-to="0" class="active"></li>
                <li data-target="#art" data-slide-to="1"></li>
                <li data-target="#art" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url(); ?>img/slidepics/slide-1.jpg" alt="">

                    <div class="carousel-caption">
                        <h4>
                            Welcome to digital corner
                        </h4>
                    </div><!--  End of .carousel-caption  -->
                </div><!--  End of .item1  -->

                <div class="item">
                    <img src="<?php echo base_url(); ?>img/slidepics/slide-2.jpg" alt="blue">

                    <div class="carousel-caption">
                        <h4>
                            We showcase our widgets here
                        </h4>
                    </div><!--  End of .carousel-caption  -->
                </div><!--  End of .item2  -->



            </div><!--  End of .carousel-inner  -->

            <!-- Controls -->
            <a class="left carousel-control" href="#art" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#art" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div><!--  endof .row  -->

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
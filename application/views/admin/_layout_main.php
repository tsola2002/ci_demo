<?php $this->load->view('admin/components/page_head'); ?>
<body>
    <div class="row">
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div id="collapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                    <li><?php echo anchor('admin/page', 'pages'); ?></li>
                    <li><?php echo anchor('admin/page/order', 'order pages'); ?></li>
                    <li><?php echo anchor('admin/article', 'news articles'); ?></li>
                    <li><?php echo anchor('admin/user', 'users'); ?></li>
                </ul>
            </div>
        </nav><!--  end of nav  -->
    </div><!--  End of row -->


<div class="container">
    <div class="row">
        <!-- Main column -->
        <div class="col col-lg-9">
            <section>
                <?php $this->load->view($subview); ?>
            </section>
        </div><!--  end of .col-lg-9  -->
        <!-- Sidebar -->
        <div class="col col-lg-3">
            <section>
                <?php echo mailto('joost@codeigniter.tv', '<span class="glyphicon glyphicon-user"></span> tsola2002@yahoo.co.uk'); ?><br>
                <?php echo anchor('admin/user/logout', '<span class="glyphicon glyphicon-log-out"></span> logout'); ?>
            </section>
        </div><!--  end of .col-lg-3  -->
    </div><!--  end of comment col-lg-3  -->
</div><!--end of container2-->

<?php $this->load->view('admin/components/page_tail'); ?>

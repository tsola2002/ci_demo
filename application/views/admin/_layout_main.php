<?php $this->load->view('admin/components/page_head'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <nav class="navbar navbar-inverse">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target="nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </a>
                <a class="brand" href="#">Roux Academy</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li><?php echo anchor('admin/page', 'pages'); ?></li>
                        <li><?php echo anchor('admin/user', 'users'); ?></li>
                    </ul>
                </div><!--  end of nav-collapse  -->
            </div><!--  end of navbar-inner  -->
        </nav>
    </div><!--  End of row-fluid  -->

</div>
<div class="container">
    <div class="row">
        <!-- Main column -->
        <div class="span9">
            <section>
                <?php $this->load->view($subview); ?>
            </section>
        </div>
        <!-- Sidebar -->
        <div class="span3">
            <section>
                <?php echo mailto('joost@codeigniter.tv', '<i class="icon-user"></i> tsola2002@yahoo.co.uk'); ?><br>
                <?php echo anchor('admin/user/logout', '<i class="icon-off"></i> logout'); ?>
            </section>
        </div>
    </div>
</div>

<?php $this->load->view('admin/components/page_head'); ?>

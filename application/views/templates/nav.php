
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url() ?>images/head_m.jpg" alt="" width="200px">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url(''); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('jobs'); ?>">Jobs</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('custies'); ?>">Customers</a>
<!--                         <ul class="menuii">
 -->
                    </li>
                            <li><a href="<?php echo site_url('custies/edit\/1'); ?>" / title="Edit Customers">Edit</a></li>
                            <li class="menuii"><a href="<?php echo site_url('custies/search\/'); ?>" title="Edit Customers">Search</a></li>
                            <li class="menuii"><a href="<?php echo site_url('custies'); ?>" title="Edit Customers">Mailing List</a></li>
 <!--                        </ul> -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
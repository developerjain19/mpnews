<?php $this->load->view('admin/template/header_link'); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <?php $this->load->view('admin/template/sidebar'); ?>

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Article</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Article</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-8">
                                <?php $this->load->view('admin/post/left-side-postinfo'); ?>
                                <?php $this->load->view('admin/post/left-side-content'); ?>
                            </div>

                            <div class="col-md-4">
                                <?php $this->load->view('admin/post/right-side-image'); ?>
                                <?php $this->load->view('admin/post/right-side-additional-image'); ?>
                                <?php $this->load->view('admin/post/right-side-files'); ?>
                                <?php $this->load->view('admin/post/categories_box'); ?>
                                <?php $this->load->view('admin/post/publish_box'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
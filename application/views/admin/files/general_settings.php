<?php $this->load->view('admin/template/header_link'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <?php $this->load->view('admin/template/sidebar'); ?>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <h1 class="m-0">General Setting</h1>
                        </div>

                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">

                            <?php if ($msg = $this->session->flashdata('msg')) :
                                $msg_class = $this->session->flashdata('msg_class') ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                    </div>
                                </div>
                            <?php
                                $this->session->unset_userdata('msg');
                            endif; ?>


                            <form action="" method="post"  enctype='multipart/form-data'>
                                <div class="box-body">
                                    <!-- <div class="form-group">
                                        <label>Project Name</label>
                                        <input type="text" class="form-control" name="website_name" placeholder="project name" value="" maxlength="200" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="control-label">Logo</label>
                                        <input type="hidden" class="form-control " name="logo" value="<?= $setting[0]['logo'] ?>">
                                        <input type="file" class="form-control myfile-input" data-value="1" name="logo_temp" accept="image/png, image/jpg, image/jpeg">
                                        <img class="image1" src="<?= base_url() . $setting[0]['logo'] ?>" height="50" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Logo</label>
                                        <input type="hidden" class="form-control " name="logo_footer" value="<?= $setting[0]['logo_footer'] ?>">
                                        <input type="file" class="form-control myfile-input" data-value="2" name="logo_footer_temp" accept="image/png, image/jpg, image/jpeg">
                                        <img class="image2" src="<?= base_url() . $setting[0]['logo_footer'] ?>" height="50" />
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Logo</label>
                                        <input type="hidden" class="form-control " name="favicon" value="<?= $setting[0]['favicon'] ?>">
                                        <input type="file" class="form-control myfile-input" data-value="3" name="favicon_temp" accept="image/png, image/jpg, image/jpeg">
                                        <img class="image3" src="<?= base_url() . $setting[0]['favicon'] ?>" height="50" />
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    </div>
    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
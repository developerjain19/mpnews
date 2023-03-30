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
                            <h1 class="m-0">Change Password</h1>
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

                            <?php

                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>


                            <form action="" method="POST" enctype='multipart/form-data'>
                                <div class="box-body row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Old Password</label>
                                            <input type="text" class="form-control" name="old_password" placeholder="Old Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="text" class="form-control" name="new_password" placeholder="New Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Confirm New Password</label>
                                            <input type="text" class="form-control" name="c_new_password" placeholder="Confirm New Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                                        </div>
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
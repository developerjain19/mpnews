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
                            <h1>Comments</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Comments</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <?php if ($msg = $this->session->flashdata('msg')) :
                                ?>
                                    <div class="row">
                                        < class="col-lg-12">
                                            <?= $msg; ?>
                                    </div>

                                <?php
                                    $this->session->unset_userdata('msg');
                                endif; ?>

                          
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?= trans('id'); ?></th>
                                            <th><?= trans('name'); ?></th>
                                            <th><?= trans('email'); ?></th>
                                            <th width="30%"><?= trans('message'); ?></th>
                                            <th><?= trans('date'); ?></th>
                                            <th><?= trans('option'); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (!empty($contcat)) {
                                            $i = 0;
                                            foreach ($contcat as $com) {
                                                $i = $i + 1;

                                        ?>

                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $com['name'] ?></td>
                                                    <td><?= $com['email'] ?></td>
                                                    <td> <?= substr($com['message'], '0' , '500' ) ?></td>
                                                    <td><?= $com['created_at'] ?></td>
                                                    <td><a class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')" href="<?= base_url('contact-query?BdID=' . encryptId($com['id'])) ?>">
                                                            <i class="fas fa-trash">
                                                            </i> </a></td>
                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><?= trans('id'); ?></th>
                                            <th><?= trans('name'); ?></th>
                                            <th><?= trans('email'); ?></th>
                                            <th><?= trans('message'); ?></th>
                                            <th><?= trans('date'); ?></th>
                                            <th><?= trans('option'); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
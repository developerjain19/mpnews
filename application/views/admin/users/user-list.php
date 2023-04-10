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
                            <h1>User List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User List</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <?php
                                if ($msg = $this->session->flashdata('msg')) :
                                ?>
                                    <?= $msg; ?>


                                <?php
                                    $this->session->unset_userdata('msg');
                                endif; ?>


                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th width="20"><?= trans('id'); ?></th>
                                                <th><?= trans('user'); ?></th>
                                                <th><?= trans('email'); ?></th>
                                                <th><?= trans('role'); ?></th>
                                                <th><?= trans('date'); ?></th>
                                                <th><?= trans('followers/Followings'); ?></th>
                                                <th><?= trans('show post'); ?></th>
                                                <th><?= trans('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (!empty($user)) {
                                                $i = 0;
                                                foreach ($user as $com) {
                                                    $i++;
                                                    if ($com['role'] != 'admin') {
                                                        $Following =  getNumRows('followers', array('follower_id' => $com['id']));
                                                        $Follower =  getNumRows('followers', array('following_id' => $com['id']));
                                                        $allpost =  getNumRows('posts', array('user_id' => $com['id']));
                                            ?>

                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $com['username'] ?> </td>
                                                            <td><?= $com['email'] ?></td>
                                                            <td> <?= $com['role'] ?></td>
                                                            <td><?= $com['created_at'] ?></td>
                                                            <td><button class="btn btn-info btn-sm"><?= $Following ?></button><button class="btn btn-danger btn-sm"><?= $Follower ?></button></td>
                                                            <td><a href="<?= base_url('user-post/' . encryptId($com['id'])) ?>" class="btn btn-warning">
                                                        Post-<?= $allpost ?></a></td>
                                                            <td>
                                                                <form method="post" action="">
                                                                    <input type="hidden" name="id" value="<?= $com['id'] ?>" />
                                                                    <input type="hidden" name="status" value="<?= (($com['status'] == '1') ? '0' : '1') ?>" />
                                                                    <button type="submit" class=" <?= (($com['status'] == '1') ? ' btn btn-dark btn-sm mb-1' : ' btn btn-success btn-sm mb-1') ?>" onclick="return confirm('Are you Sure?')"> <?= (($com['status'] == '1') ? '<i class="fas fa-times"></i> Block' : '<i class="fas fa-check"></i> Approve') ?>
                                                                    </button>
                                                                </form>


                                                            </td>
                                                        </tr>

                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="20"><?= trans('id'); ?></th>
                                                <th><?= trans('user'); ?></th>
                                                <th><?= trans('email'); ?></th>
                                                <th><?= trans('role'); ?></th>
                                                <th><?= trans('date'); ?></th>
                                                <th><?= trans('options'); ?></th>
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
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
                                    </div>
                                <?php
                                    $this->session->unset_userdata('msg');
                                endif; ?>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><?= trans('id'); ?></th>
                                                <th><?= trans('user'); ?></th>
                                                <th><?= trans('comment'); ?></th>
                                                <th><?= trans('post'); ?></th>
                                                <th><?= trans('ip_address'); ?></th>
                                                <th><?= trans('date'); ?></th>
                                                <th><?= trans('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (!empty($comment)) {
                                                $i = 0;
                                                foreach ($comment as $com) {
                                                    $i = $i + 1;
                                                    $author = getRowById('users', 'id', $com['user_id']);
                                                    $post = getSingleRowById('posts', array('id' => $com['post_id']));
                                            ?>

                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= (($author != '') ? $author[0]['username'] : $com['name']) ?>
                                                        </td>
                                                        <td><?= $com['comment'] ?></td>
                                                        <td> <?= wordwrap($post['title'], '80', '<br>') ?></td>
                                                        <td><?= $com['ip_address'] ?></td>
                                                        <td><?= $com['created_at'] ?></td>
                                                        <td>
                                                            <?php if ($com['status'] == '1') { ?>
                                                                <form method="post" action="<?= base_url('Admin_Dashboard/comments_approve') ?>">
                                                                    <input type="hidden" name="post_id" value="<?= $com['post_id'] ?>" />
                                                                    <input type="hidden" name="id" value="<?= $com['id'] ?>" />
                                                                    <button type="submit" class="btn btn-success btn-sm mb-1" onclick="return confirm('Are you Sure?')"> Approve
                                                                    </button>
                                                                </form>
                                                            <?php
                                                            } else {
                                                            }
                                                            ?>
                                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')" href="<?= base_url('comments?BdId=' . encryptId($com['id'])) ?>">
                                                                <i class="fas fa-trash">
                                                                </i>

                                                            </a>
                                                        </td>
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><?= trans('id'); ?></th>
                                                <th><?= trans('user'); ?></th>
                                                <th><?= trans('comment'); ?></th>
                                                <th><?= trans('post'); ?></th>
                                                <th><?= trans('ip_address'); ?></th>
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
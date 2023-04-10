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
                            <h1>Posts</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Posts</li>
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
                                    $msg_class = $this->session->flashdata('msg_class') ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                        </div>
                                    </div>
                                <?php
                                    $this->session->unset_userdata('msg');
                                endif; ?>
                                <div class="card-body">



                                    <form method="get" class="mb-2">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <label>Post Type</label>
                                                <select name="post_type" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="article">Article</option>
                                                    <option value="gallery">Gallery</option>
                                                    <option value="sorted_list">Sorted List</option>
                                                    <option value="trivia_quiz">Trivia Quiz</option>
                                                    <option value="personality_quiz">Personality Quiz</option>
                                                    <option value="video">Video</option>
                                                    <option value="audio">Audio</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Category</label>
                                                <select id="categories" name="category" class="form-control" onchange="getSubCategories(this.value);">
                                                    <option value="">All</option>
                                                    <?php $cate =  getAllRow('categories');
                                                    $i = 0;
                                                    if (!empty($cate)) {
                                                        foreach ($cate as $category_row) {  ?>

                                                            <option value="<?= $category_row['id']; ?>"><?= $category_row['name']; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Search</label>
                                                <input name="q" class="form-control" placeholder="Search" type="search" value="">
                                            </div>
                                            <div class="col-sm-2 md-top-10" style="width: 65px; min-width: 65px;">
                                                <label style="display: block">&nbsp;</label>
                                                <button type="submit" class="btn bg-purple">Filter</button>
                                            </div>
                                        </div>
                                    </form>



                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Post</th>
                                                <th>Language</th>
                                                <th>Post Type</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Pageviews</th>
                                                <th>Date Added</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (!empty($posts)) {
                                                $i = 0;
                                                foreach ($posts as $post) {
                                                    $i = $i + 1;
                                                    $lang = getRowById('languages', 'id', $post['lang_id']);
                                                    $category = getRowById('categories', 'id', $post['category_id']);
                                                    $author = getRowById('users', 'id', $post['user_id']);
                                            ?>

                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $post['title'] ?></td>
                                                        <td><?= $lang[0]['name'] ?></td>
                                                        <td> <?= $post['post_type'] ?></td>
                                                        <td><?= $category[0]['name'] ?></td>
                                                        <td><?= $author[0]['username'] ?></td>
                                                        <td><?= $post['pageviews'] ?></td>
                                                        <td><?= $post['created_at'] ?></td>
                                                        <td class="project-actions" style="min-width: 210px;">

                                                            <a class="btn btn-info btn-sm" href="<?= base_url() ?>edit-post/<?= encryptId($post['id'])  ?>">
                                                                <i class="fas fa-pencil-alt">
                                                                </i>
                                                                Edit
                                                            </a>

                                                            <a class="btn btn-danger btn-sm" href="#">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Delete
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
                                                <th>id</th>
                                                <th>Post</th>
                                                <th>Language</th>
                                                <th>Post Type</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Pageviews</th>
                                                <th>Date Added</th>
                                                <th>Options</th>
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
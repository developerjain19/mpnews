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
                            <h1>Add <?= $postType ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add <?= $postType ?></li>
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
                                <?php $this->load->view('admin/post/left-side-images'); ?>

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

        <script type="text/javascript">
            $(document).ready(function() {
                var x = 1;
                var maxField = 10;
                var addButton = $('.add_button');
                var wrapper = $('.field_wrapper');

                $(addButton).click(function() {
                    if (x < maxField) {
                        x++;
                        var fieldHTML = '<div class="mains card-body bg-white mb-3"><div class="row justify-content-between mb-4"><h3 class="card-title font-weight-bolder item-number">#' + x + '</h3></div><div class="form-group"><label for="img-title">Title</label><input type="text" class="form-control" id="img-title" placeholder="Title" name="title" value="" required=""></div><div class="row"><div class="col-lg-6"><label for="imgs">Images</label><input type="file" class="form-control" id="imgs" name="gallery-images[]" value="" required=""></div><div class="col-lg-6"><label for="imgs">Image Description</label><input type="text" class="form-control" id="img-title" placeholder="Title" name="title" value="" required=""></div></div><div class="mt-3"><div class="card-header bg-white"><h3 class="card-title">Content</h3></div><div class=""><textarea id="summernote" class="form-control" name="content"></textarea></div></div><a href="javascript:void(0);" class="remove_button text-danger"><i class="fas fa-minus-circle"></i> Remove</a></div>';
                        $(wrapper).append(fieldHTML);

                    } else {
                        alert("You can add only 10 images to the gallery");
                    }
                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).parent('.mains').remove();
                    console.log("click");
                    x--;
                });
            });
        </script>
</body>

</html>
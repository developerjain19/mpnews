<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/tagsinput.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script>
    $('.summernote').summernote();

    if ($("#cb_scheduled").prop('checked') === true) {

        $("#date_published_content").css("display", "block");
    } else {
        $("#date_published_content").css("display", "none");
    }

    $(document).on("change", "#cb_scheduled", function() {
        if ($(this).prop('checked') === true) {

            $("#date_published_content").css("display", "block");
        } else {
            $("#date_published_content").css("display", "none");
        }
    });


    $('#category_id').change(function() {
        var category_id = $('#category_id').val();
        console.log(category_id);
        $.ajax({
            method: "POST",
            url: '<?= base_url('POSTController/get_subcategory') ?>',
            data: {
                category_id: category_id
            },
            success: function(response) {
                $('#sub_category_id').html(response);
            }
        });
    });

    $('.myfile-input').change(function() {
        var value = $(this).data('value');
        var curElement = $('.image' + value);
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function(e) {
            curElement.attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });

    jQuery(document).ready(function() {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap2');
                $('.upload__img-wrap2').addClass('active');
                console.log(imgWrap);
                var maxLength = $(this).attr('data-max_length');
                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;

                filesArr.forEach(function(f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {

                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var html = "<div class='upload__img-box col-sm-4'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-closeghj'></div></div></div>";
                                imgWrap.append(html);

                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }

    //delete additional images 
    $(document).on('click', '.btn-delete-additional-image-database', function() {
        var itemId = $(this).attr("data-value");
        var filename = $(this).data("imagename");
        $('.additional-item-' + itemId).remove();
        var data = {
            'id': itemId,
            'filename': filename
        };

        $.ajax({
            type: 'POST',
            url: "<?= base_url('POSTController/delete_add_images') ?>",
            data: data,
            success: function(response) {}
        });
    });

    //delete selected file from database
    $(document).on('click', '.btn-delete-selected-file-database', function() {
        var itemId = $(this).attr("data-value");
        var filename = $(this).data("filename");
        $('#post_selected_file_' + itemId).remove();
        var data = {
            'id': itemId,
            'filename': filename
        };

        $.ajax({
            type: 'POST',
            url: "<?= base_url('POSTController/deletePostFile') ?>",
            data: data,
            success: function(response) {}
        });
    });

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    window.setTimeout(function() {
        $('.alert').fadeTo(200, 0).slideUp(200, function() {
            $(this).remove();
        });
    }, 4000);
</script>

</body>

</html>
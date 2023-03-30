<div class="card card-danger">
    <div class="card-header bg-white">
        <h3 class="card-title ">Files</h3><br>
        <span class="input_note">Downloadable additional files (.pdf, .docx, .zip etc..)</span>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div>
                <input type="file" name="file_name" class="" id="customFile">

                <?php if ($tag == 'edit') {
                    if ($files['0']['id'] != '') {
                      
                ?>
                        <input type="hidden" name="file_name_img" value="<?= $files['0']['file_name'] ?>">


                        <div id="post_selected_file_<?= $files['0']['id'] ?>" class="post-selected-files pt-3">
                            <div class="left">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="center">
                                <span><?= $files['0']['file_name'] ?></span>
                            </div>
                            <div class="right">
                                <a href="javascript:void(0)" class="btn btn-sm btn-selected-file-list-item btn-delete-selected-file-database" data-value="<?= $files['0']['id'] ?>" data-filename="<?= base_url() . $files['0']['file_path'] . '/' . $files['0']['file_name'] ?>"> <i class="fa fa-times"></i></a></p>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>


            </div>
        </div>
    </div>
</div>
<div class="card card-danger">
    <div class="card-header bg-white">
        <h3 class="card-title ">Additional Images</h3><br>
        <span class="input_note">More main images (slider will be active)</span>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="upload__box">
                <div class="upload__btn-box">
                    <label class="upload__btn">
                        <p>Upload images</p>
                        <input type="file" name="moreimage[]" multiple="" data-max_length="20" class="upload__inputfile">
                    </label>
                </div>
                <div class="upload__img-wrap2"></div>

                <?php if ($tag == 'edit') { ?>

                    <div class="row">

                        <?php
                        $add_img = getRowById('post_images', 'post_id', $post['0']['id']);
                        if (!empty($add_img)) {
                            foreach ($add_img as $row) {

                        ?>
                                <div class="col-sm-8 upload__img-box pb-3 mt-3 additional-item-<?= $row['id']; ?>">
                                    <?= Image_exist($row['image_big']); ?>
                                    <a class="btn btn-danger btn-sm btn-delete-additional-image-database delete_btn" data-value="<?= $row['id']; ?>" data-imagename="<?= $row['image_big']; ?>"><i class="fa fa-times"></i></a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>


                <?php }  ?>

            </div>
        </div>
    </div>

</div>
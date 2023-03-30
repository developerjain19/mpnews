<div class="card card-danger">
    <div class="card-header bg-white">
        <h3 class="card-title ">Publish</h3><br>
    </div>
    <div class="card-body">
        <div class="form-check checkflex">
            <label class="form-check-label float-left" for="exampleCheck1">Scheduled Post</label>
            <input type="checkbox" class="form-check-input st_check float-right" id="cb_scheduled" name="scheduled_post" value="1" <?= (($tag == 'edit') ? (($post['0']['is_scheduled'] == '1') ? 'checked' : '') : '') ?> />
        </div>
        <div id="date_published_content" class="form-group" style="display:none">
            <div class="row">
                <div class="col-sm-12">
                    <label>Date Published</label>
                    <div class='input-group date' id='datetimepicker'>
                        <input type='date' class="form-control" name="date_published" id="input_date_published" placeholder="Date Published" value="<?= (($tag == 'edit') ? date("Y-m-d", strtotime($post['0']['created_at'])) : '') ?>" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <?php if ($tag == 'edit') {   ?>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            <?php
            } else { ?>
                <button type="submit" name="status" value="0" class="btn btn-warning text-white">Save as Draft</button>
                <button type="submit" name="status" value="1" class="btn btn-primary">Submit</button>
            <?php } ?>

        </div>
    </div>
    <!-- /.card-body -->
</div>
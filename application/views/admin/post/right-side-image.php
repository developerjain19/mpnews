<div class="card card-success">
    <div class="card-header bg-white">
        <h3 class="card-title ">Image</h3><br>
        <span class="input_note">Main Post Image</span>
    </div>
    <div class="card-body">
        <div class="custom-file">
           
            <input type="file" name="image" class="custom-file-input myfile-input" data-value="1" id="readUrl">
            <label class="custom-file-label" for="readUrl">Choose file</label>
            <img class="image1" src="<?= (($tag == 'edit') ? (($post['0']['image_small'] != '') ? Imgexist($post['0']['image_small']) : 'http://via.placeholder.com/700x500') : 'http://via.placeholder.com/700x500') ?>" height="50">
        </div>
        <div class="form-group">
            <br>
            <label for="exampleInputtitle3">Image Description</label>
            <input type="text" class="form-control" name="image_description" value="<?= (($tag == 'edit') ? $post['0']['image_description'] : '') ?>" id="exampleInputtitle3" placeholder="Image Description" name="Add Image Url">
        </div>
    </div>
</div>
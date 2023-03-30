<div class="card card-primary">
<div class="card-header bg-white">
    <h3 class="card-title">Content</h3>
</div>
<div class="card-body">
    <textarea id="summernote" class="form-control" name="content"><?= (($tag == 'edit') ? $post['0']['content'] : '') ?></textarea>
</div>
</div>
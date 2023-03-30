<div class="card card-primary">
<div class="card-header bg-white">
    <h3 class="card-title">Post Details</h3>
</div>
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputtitle">Title</label>
        <input type="text" class="form-control" id="exampleInputtitle" placeholder="Title" name="title"  value="<?= (($tag == 'edit') ? $post['0']['title'] : '') ?>" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Slug</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="title_slug" value="<?= (($tag == 'edit') ? $post['0']['title_slug'] : '') ?>">
    </div>
    <div class="form-group">
        <label>Summary & Description (Meta Tag)</label>
        <textarea class="form-control" rows="3" name="summary" placeholder="Summary & Description (Meta Tag)" spellcheck="false"><?= (($tag == 'edit') ? $post['0']['summary'] : '') ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Keywords<span> (Meta Tag)</span></label>
        <input type="text" class="form-control" name="keywords" id="exampleInputEmail1" placeholder="Keywords (Meta Tag)" value="<?= (($tag == 'edit') ? $post['0']['keywords'] : '') ?>">
    </div>

    <div class="form-group">
        <label>Tags</label>
        <input type="text" name="tags" data-role="tagsinput" value="<?= (($tag == 'edit') ? $post_tags : '') ?>">
        <span class="input_note">(Type tag and hit enter)</span>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Optional URL</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="optional_url" name="optional_url" value="<?= (($tag == 'edit') ? $post['0']['optional_url'] : '') ?>">
    </div>

</div>


</div>
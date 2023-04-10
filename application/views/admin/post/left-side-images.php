<p>Gallery Post Items</p>
<div class="field_wrapper ">
    <div class="mains card-body bg-white  mb-3">
        <div class="row justify-content-between mb-4">
            <h3 class="card-title font-weight-bolder">#1</h3>
            <!-- <h3 class="card-title font-weight-bolder"><a href="javascript:void(0);" class="remove_button text-danger"><i class="fas fa-minus-circle"></i> Remove</a></h3> -->
        </div>
        <div class="form-group">
            <label for="img-title">Title</label>
            <input type="text" class="form-control" id="img-title" placeholder="Title" name="title" value="" required="">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="imgs">Images</label>
                <input type="file" class="form-control" id="imgs" name="gallery-images[]" value="" required="">
            </div>
            <div class="col-lg-6">
                <label for="imgs">Image Description</label>
                <input type="text" class="form-control" id="img-title" placeholder="Title" name="title" value="" required="">
            </div>
        </div>
        <div class="mt-3">
            <div class="card-header bg-white">
                <h3 class="card-title">Content</h3>
            </div>
            <div class="">
                <textarea id="summernote" class="form-control " name="content"></textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-lg 12 my-5 text-center">
    <a href="javascript:void(0);" class="add_button btn btn-md btn-success" title="Add field"> <i class="fas fa-plus"></i> Add New Item</a>
</div>
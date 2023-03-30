<div class="card card-danger">
    <div class="card-header bg-white">
        <h3 class="card-title ">Category</h3><br>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Language</label>
            <select class="form-control" name="lang_id">
                <option value="1">English</option>
            </select>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id" id="category_id" required>
                <option value="">Select a category</option>
                <?php
                $i = 0;
                if (!empty($categories)) {
                    foreach ($categories as $row) {
                ?>
                        <option value=" <?= $row['id']; ?>" <?= (($tag == 'edit') ?  (($row['id'] == $post['0']['category_id']) ? 'selected' : '') : '') ?>> <?= $row['name']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <!-- <div class="form-group">
            <label>Subcategory</label>
            <select class="form-control" name="subcategory_id" id="sub_category_id">
                <option value="">Select a category</option>
            </select>
        </div> -->
    </div>
</div>
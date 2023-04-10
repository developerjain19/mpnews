<div class="sidebar-widget">
    <div class="widget-head">
        <h4 class="title">Popular Tags</h4>
    </div>
    <div class="widget-body">
        <ul class="tag-list">

            <?php
            $tags = $this->CommonModal->getRowGroupwithlimit('tags', 'tag', '15');
            if ($tags != '') {
                foreach ($tags as $tag) {

            ?>
                    <li><a href="tag/हरियाणा"><?= ucfirst($tag['tag']); ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>
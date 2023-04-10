<?php
function post($row, $r)
{
    $category_row = getSingleRowById('categories', array('id' => $row['category_id']));
    $author = getSingleRowById('users', array('id' => $row['user_id']));
    $comment = getNumRows('comments', array('post_id ' => $row['id'], 'status' => '0'));
    $views = getNumRows('post_pageviews_month', array('post_id ' => $row['id']));


?>
    <div class="col-sm-12 col-md-<?= $r ?>">
        <div class="post-item">
            <a href="news/<?= $category_row['name_slug'] ?>">
                <span class="badge badge-category" style="background-color: #f70000"><?= $category_row['name'] ?></span>
            </a>
            <div class="image ratio">
                <a href="fir-against-manish-sisodia-in-espionage-case-chief-minister-kejriwals-advisor-also-named">
                    <img src="<?= base_url() . '/' . $row['image_mid'] ?>" alt="<?= $row['title'] ?>" class="img-fluid lazyload" width="416" height="247.417" />
                </a>
            </div>
            <h3 class="title"><a href="<?= base_url($row['title_slug']) ?>"><?= $row['title'] ?></a></h3>
            <p class="post-meta"> <a href="<?= base_url('profile' . '/' . encryptId($author['id']) . '/' . $author['slug']) ?>" class="a-username"><?= $author['username'] ?></a>
                <span><?= convertDatedmy($row['created_at']); ?></span>
                <span><i class="icon-comment"></i>&nbsp;<?= $comment ?></span>
                <span class="m-r-0"><i class="icon-eye"></i>&nbsp;<?= $views ?></span>
            </p>
            <p class="description"></p>
        </div>
    </div>



<?php
}

function post_small($news_row, $r)
{
    $category = getSingleRowById('categories', array('id' => $news_row['category_id']));
    $author = getSingleRowById('users', array('id' => $news_row['user_id']));
    $comment = getNumRows('comments', array('post_id ' => $news_row['id'], 'status' => '0'));
    $views = getNumRows('post_pageviews_month', array('post_id ' => $news_row['id']));
?>

    <div class="col-sm-12 col-md-<?= $r ?>">
        <div class="tbl-container post-item-small">
            <div class="tbl-cell left">
                <div class="image">
                    <a href="<?= base_url() ?><?= $news_row['title_slug'] ?>">
                        <img src="<?= base_url() . $news_row['image_mid'] ?>" data-src="" alt="<?= $news_row['image_small'] ?>" class="img-fluid lazyload" width="130" height="91" />
                    </a>
                </div>
            </div>
            <div class="tbl-cell right">
                <h3 class="title"><a href="<?= base_url() ?><?= $news_row['title_slug'] ?>"><?= $news_row['title'] ?></a></h3>
                <p class="small-post-meta"> <a href="<?= base_url('profile' . '/' . encryptId($author['id']) . '/' . $author['slug']) ?>" class="a-username"><?= $author['username'] ?></a>
                    <span><?= convertDatedmy($news_row['created_at']); ?></span>
                    <span><i class="icon-comment"></i>&nbsp;<?= $comment ?></span>
                    <span class="m-r-0"><i class="icon-eye"></i>&nbsp;<?= $views ?></span>
                </p>
            </div>
        </div>
    </div>

<?php
}


function fetch_get_data($post_type, $category,  $q, $where)
{

    $ci = &get_instance();
    $conditions = array();
    $query = "SELECT * FROM `posts` ";
    if ($where != '') {
        $conditions[] = $where;
    }


    if ((!empty($q))  || (!empty($category)) || (!empty($post_type))) {

        if (!empty($q)) {

            $conditions[] =  " title = LIKE '%'  . $q . '%' OR keywords =  LIKE LIKE '%'  . $q . '%' OR summary = LIKE '%'  . $q . '%'  ";
        }

        if (!empty($category)) {

            $conditions[] =  "category_id = $category";
        }

        if (!empty($post_type)) {

            $conditions[] =  "post_type = $post_type";
        }
    }
    if (count($conditions) > 0) {

        $query .= 'WHERE ';
        $query .= implode('OR ', $conditions);
    }
    return  $query;
}

?>
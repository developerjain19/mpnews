<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-newsticker">
	<div class="container-xl">
		<div class="row">
			<div class="d-flex newsticker-container">
				<div class="newsticker-title">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightning-fill" viewBox="0 0 16 16">
						<path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z" />
					</svg>
					<span>Breaking News</span>
				</div>
				<ul class="newsticker">
					<?php
					if (!empty($breaking)) {
						foreach ($breaking as $row) {
					?>
							<li>
								<a href="<?= base_url() ?><?= $row['title_slug']; ?>"> <?= $row['title']; ?> </a>
							</li>
					<?php
						}
					}
					?>
				</ul>
				<div class="ms-auto">
					<div id="nav_newsticker" class="nav-sm-buttons">
						<button class="prev" aria-label="prev"><i class="icon-arrow-left"></i></button>
						<button class="next" aria-label="next"><i class="icon-arrow-right"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section section-featured">
	<div class="container-xl">
		<div class="row">
			<div class="col-md-12 col-lg-6 col-featured-left">
				<div class="main-slider-container">
					<div class="main-slider" id="main-slider">
						<?php
						if (!empty($slider)) {
							foreach ($slider as $row) {
								$category_row = getSingleRowById('categories', array('id' => $row['category_id']));
								$author = getSingleRowById('users', array('id' => $row['user_id']));
						?>
								<div class="main-slider-item">
									<a href="<?= base_url() ?><?= $row['title_slug'] ?>" class="img-link" aria-label="post">
										<img src="<?= base_url() ?>assets/img/img_bg_md.png" data-lazy="<?= base_url($row['image_slider']) ?>" alt="<?= $row['title'] ?>" class="img-cover" width="600" height="460" />
									</a>
									<div class="caption">
										<a href="news/<?= $category_row['name_slug'] ?>">
											<span class="badge badge-category" style="background-color: #f70000"><?= $category_row['name'] ?></span>
										</a>
										<h2 class="title"> <?= $row['title'] ?> </h2>
										<p class="post-meta">
											<a href="profile/<?= $author['slug'] ?>" class="a-username"><?= $author['username'] ?></a>
											<span><?= convertDatedmy($row['created_at']); ?></span>
											<span><i class="icon-comment"></i>&nbsp;0</span>
											<span class="m-r-0"><i class="icon-eye"></i>&nbsp;0</span>
										</p>
									</div>
								</div>

						<?php
							}
						}
						?>
					</div>
					<div id="main-slider-nav" class="main-slider-nav">
						<button class="prev" aria-label="prev">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 404.258 404.258">
								<polygon points="289.927,18 265.927,0 114.331,202.129 265.927,404.258 289.927,386.258 151.831,202.129 " />
							</svg>
						</button>
						<button class="next" aria-label="next">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 404.258 404.258">
								<polygon points="138.331,0 114.331,18 252.427,202.129 114.331,386.258 138.331,404.258 289.927,202.129 " />
							</svg>
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-6 col-featured-right">
				<div class="row">
					<?php
					$i = 0;
					if (!empty($featured)) {
						foreach ($featured as $row) {
							if ($i >= 2) {
								break;
							}
							$category_row = getSingleRowById('categories', array('id' => $row['category_id']));
							$author = getSingleRowById('users', array('id' => $row['user_id']));
					?>
							<div class="col-12  col-first">
								<div class="item">
									<a href="<?= base_url() ?><?= $row['title_slug'] ?>" class="img-link" aria-label="post">
										<div class="img-item lazyload" data-bg="<?= $row['image_mid'] ?>"></div>
									</a>
									<div class="caption">
										<a href="news/<?= $category_row['name_slug'] ?>">
											<span class="badge badge-category" style="background-color: #f70000"><?= $category_row['name'] ?></span>
										</a>
										<h3 class="title">
											<a href="<?= base_url() ?><?= $row['title_slug'] ?>" class="img-link">
												<?= $row['title'] ?></a>
										</h3>
										<p class="post-meta">
											<a href="profile/<?= $author['slug'] ?>" class="a-username"><?= $author['username'] ?></a>
											<span><?= convertDatedmy($row['created_at']); ?></span>
											<span><i class="icon-comment"></i>&nbsp;0</span>
											<span class="m-r-0"><i class="icon-eye"></i>&nbsp;0</span>
										</p>
									</div>
								</div>
							</div>

					<?php
							$i++;
						}
					}
					?>


				</div>
			</div>
			<div class="col-md-12 col-lg-3 top-headlines">
				<div class="row">
					<div class="col-12">
						<h3 class="top-headlines-title">Top Headlines</h3>
					</div>
					<div class="col-12">
						<div class="items">
							<?php
							if (!empty($featured)) {
								foreach ($featured as $row) {
									if ($i < 2) {
										break;
									}
									$category_row = getSingleRowById('categories', array('id' => $row['category_id']));
									$author = getSingleRowById('users', array('id' => $row['user_id']));
							?>
									<div class="item  <?= ($i == 2) ? 'item-first' : '' ?>">
										<h3 class="title">
											<a href="<?= base_url() ?><?= $row['title_slug'] ?>">
												<?= $row['title'] ?></a>
										</h3>
										<a href="news/<?= $category_row['name_slug'] ?>">
											<span class="category"><?= $category_row['name'] ?></span>
										</a>
										<span><?= convertDatedmy($row['created_at']); ?></span>
									</div>

							<?php
									$i++;
								}
							}
							?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
if (!empty($category)) {
	foreach ($category as $row) {
		$news_limit = getRowsByMoreIdWithOrderLimit('posts', array('category_id' => $row['id']), 'id', 'desc', 12, 0);
?>
		<div class="section section-category">
			<div class="container-xl">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="section-title">
							<div class="d-flex justify-content-between align-items-center">
								<h3 class="title"><?= $row['name'] ?></h3>
							</div>
						</div>
						<div class="section-content section-block-2">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="tabCategoryAll1" role="tabpanel">
									<div class="row">
										<?php
										$i = 0;
										if (!empty($news_limit)) {
											foreach ($news_limit as $news_row) {
												if ($i >= 3) {
													break;
												}

												post($news_row, '4');
										?>

										<?php
												$i++;
											}
										}
										?>
									</div>
									<div class="row">
										<?php
										if (!empty($news_limit)) {
											foreach ($news_limit as $news_row) {
												if ($i < 2 || $i >= 12) {
													break;
												}
												post_small($news_row, '4');
										?>

										<?php
												$i++;
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}
?>


<section class="section">
	<div class="container-xl">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-8">
				<div class="latest-posts">
					<div class="section-title">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="title">Latest Posts</h3>
							<a href="posts" class="view-all font-title">View All Posts<i class="icon-arrow-right"></i></a>
						</div>
					</div>
					<div class="section-content">
						<div id="last_posts_content" class="row">
							<?php
							if (!empty($latest)) {
								foreach ($latest as $row) {

									post($row, '6');
								}
							}
							?>
						</div>

						<!-- <div class="d-flex justify-content-center mt-4">
							<button class="btn btn-custom btn-lg btn-load-more" onclick="loadMorePosts();">
								Load More <svg width="16" height="16" viewBox="0 0 1792 1792" fill="#ffffff" class="m-l-5" xmlns="http://www.w3.org/2000/svg">
									<path d="M1664 256v448q0 26-19 45t-45 19h-448q-42 0-59-40-17-39 14-69l138-138q-148-137-349-137-104 0-198.5 40.5t-163.5 109.5-109.5 163.5-40.5 198.5 40.5 198.5 109.5 163.5 163.5 109.5 198.5 40.5q119 0 225-52t179-147q7-10 23-12 15 0 25 9l137 138q9 8 9.5 20.5t-7.5 22.5q-109 132-264 204.5t-327 72.5q-156 0-298-61t-245-164-164-245-61-298 61-298 164-245 245-164 298-61q147 0 284.5 55.5t244.5 156.5l130-129q29-31 70-14 39 17 39 59z" />
								</svg>
								<span class="spinner-border spinner-border-sm spinner-load-more m-l-5" role="status" aria-hidden="true"></span>
							</button>
						</div> -->
					</div>
				</div>
			</div>


			<?php $this->load->view('common/common-sidebar'); ?>




		</div>
	</div>
</section>
<?php $this->load->view('includes/footer') ?>
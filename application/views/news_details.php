<?php

$host = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
insertRow('post_pageviews_month', array('post_id' => $posts['id'], 'post_user_id' => ((sessionId('id') != '') ? sessionId('id') : '0'), 'ip_address' => $host, 'user_agent' => $agent));
$comment = getNumRows('comments', array('post_id ' => $posts['id'], 'status' => '0'));
$views = getNumRows('post_pageviews_month', array('post_id ' => $posts['id']));
?>


<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>

<section class="section section-page">
	<div class="container-xl">
		<div class="row">
			<?php $this->load->view('includes/breadcrumb') ?>
			<div class="col-md-12 col-lg-8">
				<div class="post-content">
					<div class="d-flex justify-content-center align-items-center mb-3">
						<div class="bd-highlight">
							<a href="<?= base_url('news/' . $post_category['name_slug']) ?>">
								<span class="badge badge-category" style="background-color: #f70000"> <?= $post_category['name'] ?></span>
							</a>
						</div>
						<div class="bd-highlight ms-auto">
						</div>
					</div>
					<h1 class="post-title"><?= $posts['title'] ?></h1>
					<div class="d-flex align-items-center post-details-meta mb-4">
						<div class="item-meta item-meta-author">
							<a href="<?= base_url('profile' . '/' . encryptId($post_author['id']) . '/' . $post_author['slug']) ?>"><img src="<?= base_url() ?>assets/img/user.png" alt="<?= $post_author['username'] ?>" width="32" height="32"><span><?= $post_author['username'] ?></span></a>
						</div>
						<div class="item-meta item-meta-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
								<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
							</svg>
							<span><?= convertDatedmy($posts['created_at']) ?></span>
						</div>
						<div class="ms-auto item-meta item-meta-comment">
							<span><i class="icon-comment"></i>&nbsp;<?= $comment ?></span>
							<span> <i class="icon-eye"></i>&nbsp;<?= $views ?></span>
						</div>
					</div>
					<div class="d-flex post-share-buttons mb-4">
						<div class="btn-share">
							<a href="javascript:void(0)" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>', 'Share This Post', 'width=640,height=450');return false" class="color-facebook"><i class="icon-facebook"></i></a>
						</div>
						<div class="btn-share">
							<a href="javascript:void(0)" onclick="window.open('https://twitter.com/share?url=<?= current_url() ?>', 'Share This Post', 'width=640,height=450');return false" class="color-twitter"><i class="icon-twitter"></i></a>
						</div>
						<div class="btn-share">
							<a href="javascript:void(0)" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= current_url() ?>', 'Share This Post', 'width=640,height=450');return false" class="color-linkedin"><i class="icon-linkedin"></i></a>
						</div>
						<div class="btn-share">
							<a href="https://api.whatsapp.com/send?text=%E0%A4%AE%E0%A4%A8%E0%A5%80%E0%A4%B7+%E0%A4%B8%E0%A4%BF%E0%A4%B8%E0%A5%8B%E0%A4%A6%E0%A4%BF%E0%A4%AF%E0%A4%BE+%E0%A4%AA%E0%A4%B0+%E0%A4%9C%E0%A4%BE%E0%A4%B8%E0%A5%82%E0%A4%B8%E0%A5%80+%E0%A4%AE%E0%A4%BE%E0%A4%AE%E0%A4%B2%E0%A5%87+%E0%A4%AE%E0%A5%87%E0%A4%82+FIR%2C+%E0%A4%AE%E0%A5%81%E0%A4%96%E0%A5%8D%E0%A4%AF%E0%A4%AE%E0%A4%82%E0%A4%A4%E0%A5%8D%E0%A4%B0%E0%A5%80+%E0%A4%95%E0%A5%87%E0%A4%9C%E0%A4%B0%E0%A5%80%E0%A4%B5%E0%A4%BE%E0%A4%B2+%E0%A4%95%E0%A5%87+%E0%A4%B8%E0%A4%B2%E0%A4%BE%E0%A4%B9%E0%A4%95%E0%A4%BE%E0%A4%B0+%E0%A4%95%E0%A4%BE+%E0%A4%AD%E0%A5%80+%E0%A4%A8%E0%A4%BE%E0%A4%AE - <?= current_url() ?>" class="color-whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
						</div>
						<div class="btn-share">
							<a href="javascript:void(0)" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?= current_url() ?>&amp;media=<?= base_url() ?>uploads/images/202303/image_870x_6412cc058b7b8.jpg', 'Share This Post', 'width=640,height=450');return false" class="color-pinterest"><i class="icon-pinterest"></i></a>
						</div>
						<div class="btn-share">
							<a href="javascript:void(0)" onclick="window.open('https://www.tumblr.com/share/link?url=<<?= current_url() ?>title=%E0%A4%AE%E0%A4%A8%E0%A5%80%E0%A4%B7+%E0%A4%B8%E0%A4%BF%E0%A4%B8%E0%A5%8B%E0%A4%A6%E0%A4%BF%E0%A4%AF%E0%A4%BE+%E0%A4%AA%E0%A4%B0+%E0%A4%9C%E0%A4%BE%E0%A4%B8%E0%A5%82%E0%A4%B8%E0%A5%80+%E0%A4%AE%E0%A4%BE%E0%A4%AE%E0%A4%B2%E0%A5%87+%E0%A4%AE%E0%A5%87%E0%A4%82+FIR%2C+%E0%A4%AE%E0%A5%81%E0%A4%96%E0%A5%8D%E0%A4%AF%E0%A4%AE%E0%A4%82%E0%A4%A4%E0%A5%8D%E0%A4%B0%E0%A5%80+%E0%A4%95%E0%A5%87%E0%A4%9C%E0%A4%B0%E0%A5%80%E0%A4%B5%E0%A4%BE%E0%A4%B2+%E0%A4%95%E0%A5%87+%E0%A4%B8%E0%A4%B2%E0%A4%BE%E0%A4%B9%E0%A4%95%E0%A4%BE%E0%A4%B0+%E0%A4%95%E0%A4%BE+%E0%A4%AD%E0%A5%80+%E0%A4%A8%E0%A4%BE%E0%A4%AE', 'Share This Post', 'width=640,height=450');return false" class="color-tumblr"><i class="icon-tumblr"></i></a>
						</div>
						<div class="btn-share ms-auto">
							<div class="btn-inner">
								<a href="javascript:void(0)" id="print_post" class="btn-print" data-bs-toggle="tooltip" data-bs-placement="bottom" title="">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
										<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
										<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
										</path>
									</svg>
								</a>
							</div>
							<div class="btn-inner">
								<a href="javascript:void(0)" class="btn-reading-list" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to Reading List" onclick="addRemoveReadingListItem('<?= $posts['post_id']; ?>');">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
										<path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
									</svg>
								</a>
							</div>
						</div>
					</div>
					<div class="post-image">
						<div class="post-image-inner">
							<?php if (!empty($post_images) && count($post_images) > 0) : ?>
								<div class="show-on-page-load">
									<div id="post-detail-slider" class="post-detail-slider">
										<div class="post-detail-slider-item">
											<img src="<?= setImage($post['image_default'], ''); ?>" class="img-fluid center-image" alt="<?= ($posts['title']); ?>" width="856" height="570" />
											<figcaption class="img-dription"><?= ($post['image_dription']); ?></figcaption>
										</div>
										<?php foreach ($post_images as $image) :
										?>
											<div class="post-detail-slider-item">
												<img src="<?= setImage($image['image_default'], ''); ?>" class="img-fluid center-image" alt="<?= ($posts['title']); ?>" width="856" height="570" />
											</div>
										<?php endforeach; ?>
									</div>
									<div id="post-detail-slider-nav" class="post-detail-slider-nav">
										<button class="prev"><i class="icon-arrow-left"></i></button>
										<button class="next"><i class="icon-arrow-right"></i></button>
									</div>
								</div>
								<?php else :
								if (!empty($post['image_default']) || !empty($post['image_url'])) : ?>
									<img src="<?= setImage($post['image_default'], ''); ?>" class="img-fluid center-image" alt="<?= ($posts['title']); ?>" width="856" height="570" />
									<?php if (!empty($posts['image_dription'])) : ?>
										<figcaption class="img-dription"><?= ($posts['image_dription']); ?></figcaption>
									<?php endif; ?>
							<?php endif;
							endif; ?>
						</div>
					</div>
					<div class="post-text mt-4">
						<?= ($posts['content']); ?>
					</div>
					<div class="d-flex flex-row post-tags align-items-center mt-5">
						<h2 class="title">Tags:</h2>
						<ul class="d-flex flex-row">
							<?php foreach ($post_tags as $tag) : ?>
								<li><a href="<?= base_url('tags/' . $tag['tag_slug']); ?>"><?= $tag['tag'] ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="post-next-prev mt-5">
						<div class="row">
							<div class="col-sm-6 col-xs-12 left">

								<?php if (!empty($post_previous)) : ?>
									<div class="head-title text-end">
										<a href="<?= $post_previous[0]['title_slug']; ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
											</svg>
											<?= ("previous_article"); ?>
										</a>
									</div>
									<h3 class="title text-end">
										<a href="<?= $post_previous[0]['title_slug']; ?>"><?= (characterLimiter($post_previous[0]['title'], 80, '...')); ?></a>
									</h3>
								<?php endif; ?>
							</div>
							<div class="col-sm-6 col-xs-12 right">
								<?php if (!empty($post_next)) : ?>
									<div class="head-title text-start">
										<a href="<?= $post_next[0]['title_slug']; ?>">
											<?= ("next_article"); ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
											</svg>
										</a>
									</div>
									<h3 class="title text-start">
										<a href="<?= $post_next[0]['title_slug']; ?>"><?= (characterLimiter($post_next[0]['title'], 80, '...')); ?></a>
									</h3>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-xs-12 reactions noselect">
							<h4 class="title-reactions">What's Your Reaction?</h4>
							<div id="reactions_result">
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'like');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/like.png" alt="like" class="img-reaction">
												<label class="label reaction-num-votes like<?= $posts['id']; ?>"><?= (($getreaction != '') ? $getreaction[0]['re_like'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction ">Like</label>
											</p>
										</div>
									</div>
								</div>
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'dislike');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/dislike.png" alt="dislike" class="img-reaction">
												<label class="label reaction-num-votes dislike<?= $posts['id']; ?>"><?= (($getreaction != '') ? $getreaction[0]['re_dislike'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction ">Dislike</label>
											</p>
										</div>
									</div>
								</div>
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'love');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/love.png" alt="love" class="img-reaction">
												<label class="label reaction-num-votes love<?= $posts['id']; ?>"><?= (($getreaction != '') ? $getreaction[0]['re_love'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction ">Love</label>
											</p>
										</div>
									</div>
								</div>
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'funny');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/funny.png" alt="funny" class="img-reaction">
												<label class="label reaction-num-votes funny<?= $posts['id']; ?>"><?= (($getreaction != '') ? $getreaction[0]['re_funny'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction ">Funny</label>
											</p>
										</div>
									</div>
								</div>
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'angry');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/angry.png" alt="angry" class="img-reaction">
												<label class="label reaction-num-votes angry<?= $posts['id']; ?>"><?= (($getreaction != '') ? $getreaction[0]['re_angry'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction ">Angry</label>
											</p>
										</div>
									</div>
								</div>
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'sad');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/sad.png" alt="sad" class="img-reaction">
												<label class="label reaction-num-votes sad<?= $posts['id']; ?>"><?= (($getreaction != '') ? $getreaction[0]['re_sad'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction">Sad</label>
											</p>
										</div>
									</div>
								</div>
								<div class="col-reaction col-reaction-like" onclick="addReaction('<?= $posts['id']; ?>', 'wow');">
									<div class="col-sm-12">
										<div class="row">
											<div class="icon-cnt">
												<img src="<?= base_url() ?>assets/img/reactions/wow.png" alt="wow" class="img-reaction">
												<label class="label reaction-num-votes wow<?= $posts['id']; ?> "><?= (($getreaction != '') ? $getreaction[0]['re_wow'] : '0')  ?></label>
											</div>
										</div>
										<div class="row">
											<p class="text-center">
												<label class="label label-reaction ">Wow</label>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex about-author">
						<div class="d-flex about-author">
							<div class="flex-shrink-0">
								<a href="<?= base_url('profile/' . $post_author['slug']); ?>" class="author-link">
									<img src="<?= setImage($post_author['avatar'], ''); ?>" alt="<?= ($post_author['username']); ?>" class="img-fluid img-author" width="110" height="110">
								</a>
							</div>
							<div class="flex-grow-1 ms-3">
								<strong class="username"><a href="<?= base_url('profile/' . $post_author['slug']); ?>"> <?= ($post_author['username']); ?> </a></strong>
								<?= ($post_author['about_me']); ?>
								<div class="social">
									<ul class="profile-social-links">
										<?php if (!empty($post_author['facebook_url'])) : ?>
											<li><a href="<?= ($post_author['facebook_url']); ?>" target="_blank"><i class="icon-facebook"></i></a></li>
										<?php endif;
										if (!empty($post_author['twitter_url'])) : ?>
											<li><a href="<?= ($post_author['twitter_url']); ?>" target="_blank"><i class="icon-twitter"></i></a></li>
										<?php endif;
										if (!empty($post_author['instagram_url'])) : ?>
											<li><a href="<?= ($post_author['instagram_url']); ?>" target="_blank"><i class="icon-instagram"></i></a></li>
										<?php endif;
										if (!empty($post_author['pinterest_url'])) : ?>
											<li><a href="<?= ($post_author['pinterest_url']); ?>" target="_blank"><i class="icon-pinterest"></i></a></li>
										<?php endif;
										if (!empty($post_author['linkedin_url'])) : ?>
											<li><a href="<?= ($post_author['linkedin_url']); ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
										<?php endif;
										if (!empty($post_author['vk_url'])) : ?>
											<li><a href="<?= ($post_author['vk_url']); ?>" target="_blank"><i class="icon-vk"></i></a></li>
										<?php endif;
										if (!empty($post_author['telegram_url'])) : ?>
											<li><a href="<?= ($post_author['telegram_url']); ?>" target="_blank"><i class="icon-telegram"></i></a></li>
										<?php endif;
										if (!empty($post_author['youtube_url'])) : ?>
											<li><a href="<?= ($post_author['youtube_url']); ?>" target="_blank"><i class="icon-youtube"></i></a></li>
										<?php endif;
										if ($post_author['show_rss_feeds']) : ?>
											<li><a href="<?= base_url('profile/' . $post_author['slug']); ?>"><i class="icon-rss"></i></a></li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<section class="section section-related-posts mt-5">
						<div class="row">
							<div class="col-12">
								<div class="section-title">
									<div class="d-flex justify-content-between align-items-center">
										<h3 class="title">Related Posts</h3>
									</div>
								</div>
								<div class="section-content">
									<div class="row">
										
										<?php
										$i = 0;
										if (!empty($related)) {
											foreach ($related as $news_row) {
												if ($i >= 2) {
													break;
												}
												$category = getSingleRowById('categories', array('id' => $news_row['category_id']));
												$author = getSingleRowById('users', array('id' => $news_row['user_id']));
										?>
												<div class="col-sm-12 col-md-6 col-lg-4">
													<div class="post-item">
														<div class="image ratio">
															<a href="<?= base_url() ?><?= $news_row['title_slug'] ?>">
																<img src="<?= $news_row['image_mid'] ?>" data-src="" alt="<?= $news_row['title'] ?>" class="img-fluid lazyload" width="416" height="247.417" />
															</a>
														</div>
														<h3 class="title"><a href="<?= base_url() ?><?= $news_row['title_slug'] ?>"><?= $news_row['title'] ?></a></h3>
														<p class="post-meta"> <a href="profile/<?= $author['slug'] ?>" class="a-username"><?= $author['username'] ?></a>
															<span><?= convertDatedmy($news_row['created_at']); ?></span>
															<span><i class="icon-comment"></i>&nbsp;0</span>
															<span class="m-r-0"><i class="icon-eye"></i>&nbsp;0</span>
														</p>
														<p class="description"></p>
													</div>
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
					</section>
					<section class="section section-comments mt-5">
						<div class="row">
							<div class="col-12">
								<div class="nav nav-tabs" id="navTabsComment" role="tablist">
									<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#navComments" type="button" role="tab">Comments</button>
								</div>
								<div class="tab-content" id="navTabsComment">
									<div class="tab-pane fade show active" id="navComments" role="tabpanel" aria-labelledby="nav-home-tab">
										<form method="POST" enctype="multipart/form-data" id="push-comment">

											<input type="hidden" name="post_id" value="<?= $posts['id']; ?>">

											<?php if (sessionId('id')) { ?>

												<input type="hidden" name="user_id" value="<?= sessionId('id') ?>">
											<?php	} else { ?>
												<div class="row">
													<div class="form-group col-md-6">
														<label>Name</label>
														<input type="text" name="name" class="form-control form-input" maxlength="40" placeholder="Name">
													</div>
													<div class="form-group col-md-6">
														<label>Email</label>
														<input type="email" name="email" class="form-control form-input" maxlength="100" placeholder="Email">
													</div>
												</div>
											<?php
											}
											?>

											<div class="form-group">
												<input name="comment" class="form-control comment-field form-textarea" placeholder="Leave your comment..." rows="6" required />
											</div>
											<button type="submit" class="btn btn-md btn-custom" onclick="pushcomment()" id="submit-comment">Post
												Comment</button>
										</form>
										<div id="message-comment-result" class="message-comment-result"></div>
										<div id="comment-result">
											<div class="row">
												<div class="col-sm-12">
													<div class="comments">

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>

			<?php $this->load->view('common/common-sidebar'); ?>


		</div>
	</div>
</section>
<?php $this->load->view('includes/footer') ?>
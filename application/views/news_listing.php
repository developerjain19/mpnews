<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-page">
	<div class="container-xl">
		<div class="row">
			<?php $this->load->view('includes/breadcrumb') ?>
			<div class="col-sm-12 col-md-12 col-lg-8">
				<div class="latest-posts">

					<div class="section-content">
						<div id="last_posts_content" class="row">
							<?php
							if (!empty($category_news_list)) {
								foreach ($category_news_list as $row) {
									post($row, '6');
								}
							} else {
								echo '<h3>Currently, there are no data available</h3>';
							}
							?>
						</div>


					</div>
				</div>
			</div>



			<?php $this->load->view('common/common-sidebar'); ?>


		</div>
	</div>
</section>

<?php $this->load->view('includes/footer') ?>
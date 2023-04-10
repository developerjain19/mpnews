<div class="col-sm-12 col-md-12 col-lg-4">
	<div class="col-sidebar sticky-lg-top">
		<div class="row">
			<div class="col-12">
				<div class="sidebar-widget">
					<div class="widget-head">
						<h4 class="title">Popular Posts</h4>
					</div>
					<div class="widget-body">
						<div class="row">
							<?php
							if (!empty($popular)) {
								foreach ($popular as $row) {
									post_small($row, '12');

							?>

							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="sidebar-widget">
					<div class="widget-head">
						<h4 class="title">Follow Us</h4>
					</div>
					<div class="widget-body">
						<div class="row gx-3 widget-follow">
							<div class="col-sm-3 col-md-6 item"><a class="color-facebook" href="<?= $this->facebook ?>" target="_blank"><i class="icon-facebook"></i><span>Facebook</span></a></div>
							<div class="col-sm-3 col-md-6 item"><a class="color-twitter" href="<?= $this->twitter ?>" target="_blank"><i class="icon-twitter"></i><span>Twitter</span></a>
							</div>
							<div class="col-sm-3 col-md-6 item"><a class="color-instagram" href="<?= $this->instagram ?>" target="_blank"><i class="icon-instagram"></i><span>Instagram</span></a></div>
						</div>
					</div>
				</div>

				<?php $this->load->view('tags'); ?>

			</div>

		</div>
	</div>
</div>
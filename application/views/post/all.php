<!-- Header Template -->

<?php includeTpl('/partial/_banner_blog') ?>

<main class="flex-margin">
	<section class="post post__list">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-12 col-md-8">
						<div class="box">
							<div class="box-body table-responsive">
								<?php  
										foreach ($posts as $row) {
										?>
											<div class="card border-0 mb-4">
												<h4><?php  echo $row['title'] ?></h4>
												<div class="card-body p-0">
													<div class="text-truncate">
														<?php echo $row['summary'] ?>
													</div>
												</div>
											</div>
										<?php
										}
										?>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4">
						Right Content
					</div>
				</div>
			</div>
		</div>
	</section>
</main>	
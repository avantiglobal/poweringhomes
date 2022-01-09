<!-- Header Template -->

<?php includeTpl('/partial/_banner_simple', $this->variables) ?>

<main>
	<section class="post post__list">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-12 col-md-8">
						<div class="box">
							<div class="box-body table-responsive">
								<?php  
										foreach ($posts as $post) {
										?>
											
											<div class="card mb-3 border-0">
												<div class="row g-0">
													<div class="col-md-4 d-flex align-items-center justify-content-center">
														<img src="<?php echo $post["post_image"] ?>" class="img-fluid rounded-start" alt="...">
													</div>
													<div class="col-md-8">
														<div class="card-body">
															<a href="/post/view/<?php echo $post['id']?>" class="stretched-link"><h5 class="card-title"><?php echo $post['title'] ?></h5></a>
															<p class="card-text"><?php echo $post['summary'] ?></p>
															<p class="card-text"><small class="text-muted">Last updated <?php echo timeAgo($post['updated_on']) ?></small></p>
														</div>
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
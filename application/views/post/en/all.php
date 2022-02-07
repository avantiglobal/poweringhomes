<!-- Header Template -->

<?php includeTpl('/partial/'.$this->_user_language.'/_banner_simple', $this->variables) ?>

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
															<a href="/post/view/<?php echo $post['title_seo']?>" class="stretched-link"><h5 class="card-title text-primary"><?php echo $post['title'] ?></h5></a>
															<p class="card-text"><?php echo $post['summary'] ?></p>
															<p class="card-text"><small class="text-muted"><?php echo timeAgo($post['updated_on']) ?></small></p>
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
						<h4>Browse Content</h4>
						<ul>
							<li><a href="/blog">All</a></li>
						<?php foreach ($categories as $key => $category) {
							echo '<li><a href="/blog/' . str_replace(' ','-',strtolower($category["category_name"]))  . '" >' . $category["category_name"] . '</a></li>';
						} ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>	
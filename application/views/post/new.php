<!-- HTML EDITOR -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partials/_top_menu.php')  ?>
<main class="flex-margin">
	<div class="row content-header bg-light">
		<div class="col-auto mr-auto content-header__title">
			<h1><?php echo $page_header ?></h1>
		</div>
		<div class="col-auto">
			<!-- <a class="btn btn-primary btn-outline btn-lg" id="btn-save-post"><i class="bi bi-save"></i><i id="preloader"></i></a> -->
			<!-- <a class="btn btn-default btn-lg" href="/post/list"><i class="bi bi-times"></i></a> -->
			<a class="btn btn-primary btn-lg" href="/post/list" title="Back"><i class="bi bi-arrow-left"></i></a>
		</div>
	</div>
	<section class="post post__new">
		<div class="container">	
			<div class="content">
			<!-- Editor  -->
			<div class="row">
				<div class="col-md-9">
					<div class="row pad-10-bottom">
						<div class="col-sm-12">
							<input type="text" class="form-control input-lg" id="post-title" placeholder="Title" required value="" autofocus="" data-placement="bottom" autofocus>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<!-- <div class="summernote"> </div> -->
							<!-- <form method="post">
								<textarea id="post_content">Hello, World!</textarea>
							</form> -->

							<textarea name="post-content" id="post-content"></textarea>
							<script>
									CKEDITOR.replace( 'post-content' );
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box box-solid bg-dark-gray color-white">
						<!-- <div class="box-header"><i class="fa fa-gear"></i> <h4 class="box-title">Options</h4></div> -->
						<div class="box-body">
							
							<div class="row">
								<div class="col-sm-12 text-left">
									<a class="btn btn-primary btn-block" id="btn-save-post"><i class="bi bi-save"></i> &nbsp;Save <i id="preloader"></i></a>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-4">Active</div>
								<div class="col-sm-4 text-center pull-right">
									<label class="switch">
									<input type="checkbox" checked>
									<span class="slider round"></span>
									</label>
								</div>
							</div>

						</div>

					</div>
				</div>
				<input type="hidden" id="post-id" value="">
			</div>
			</div>
		</div>
	</section>
</main>
<!-- HTML EDITOR -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/_top_menu.php')  ?>
<main>
	<div class="container">
		<div class="row content-header bg-white mt-2 py-2">
			<div class="col-auto me-auto content-header__title">
			<h2><?php echo $page_header ?></h2>
			</div>
			<div class="col-auto">
				<!-- <a class="btn btn-default" href="/page/new" title="Add new"><i class="bi bi-plus-lg"></i><i id="preloader"></i> Add</a> -->
			</div>
		</div>
	</div>
	<section class="page page__new">
		<div class="container">	
			<div class="content">
			<!-- Editor  -->
			<div class="row">
				<div class="col-md-9">
					<div class="row pad-10-bottom">
						<div class="col-sm-12">
							<input type="text" class="form-control input-lg" id="page-title" placeholder="Title" required value="" autofocus="" data-placement="bottom" autofocus>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<!-- <div class="summernote"> </div> -->
							<!-- <form method="page">
								<textarea id="page_content">Hello, World!</textarea>
							</form> -->

							<textarea name="page-content" id="page-content"></textarea>
							<script>
									CKEDITOR.replace( 'page-content' );
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
									<a class="btn btn-primary btn-block" id="btn-save-page"><i class="bi bi-save"></i> &nbsp;Save <i id="preloader"></i></a>
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
				<input type="hidden" id="page-id" value="">
			</div>
			</div>
		</div>
	</section>
</main>
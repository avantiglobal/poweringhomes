<!-- HTML EDITOR -->
 <!-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> -->
<!-- <script src="<?php //echo LIBRARY_PATH . "/ckeditor/ckeditor.js" ?>"></script> --> 
<script src="/assets/ckeditor/ckeditor.js"></script>
<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/_top_menu.php')  ?>

<main>
	<!-- alert  TODO: include this in a HTML helper-->
	
	<div id="alertToast" class="toast align-items-center text-white bg-primary border-0 position-absolute p-3 bottom-0 end-0 m-1" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex"> 
			<div class="toast-body" id="toast-body">
				Hello, world! This is a toast message.
			</div>
			<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
	

	<div class="container">
		<div class="row content-header bg-white mt-2 py-2">
			<div class="col-auto me-auto content-header__title">
			<h2><?php echo $page_header ?></h2>
			</div>
			<div class="col-auto">
				<a class="btn btn-default" href="/page/view/<?php echo $page['id'] ?>" title="View" target="_blank"><i class="bi bi-eye"></i> View Page</a>
				<a class="btn btn-default" href="/page/list" title="Back"><i class="bi bi-arrow-left"></i> Cancel</a>
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
							<input type="text" class="form-control input-lg" id="page-title" placeholder="Title" required value="<?php echo $page['title'] ?>" autofocus="" data-placement="bottom" autofocus>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<textarea name="page-content" id="page-content">
								<?php echo $page['content'] ?>
							</textarea>
							<script>
									CKEDITOR.replace( 'page-content',);
									// CKEDITOR.config.extraPlugins: 'simage'  //to enable to plugin
									// CKEDITOR.config.imageUploadURL: "/img/"	 ?>
									// CKEDITOR.config.dataParser: func(data)
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card bg-light color-white">
						<!-- <div class="card-header"><i class="fa fa-gear"></i> <h4 class="card-title">Options</h4></div> -->
						<div class="card-body">
							
							<div class="row">
								<div class="col-sm-12 text-left">
									<a class="btn btn-primary d-block" id="btn-save-page"><i class="bi bi-save"></i> &nbsp;Save <i id="preloader"></i></a>
								</div>
							</div>
							<div class="row mt-3 text-center">
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
				<input type="hidden" id="page-id" value="<?php echo $page['id'] ?>">
			</div>
			</div>
		</div>
	</section>
</main>
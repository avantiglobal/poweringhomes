<!-- HTML EDITOR -->
 <!-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> -->
<!-- <script src="<?php //echo LIBRARY_PATH . "/ckeditor/ckeditor.js" ?>"></script> --> 
<script src="/assets/ckeditor/ckeditor.js"></script>

<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/_top_menu.php')  ?>
<main class="flex-margin">
	<!-- alert  TODO: include this in a HTML helper-->
	<div class="container">
		<div class="alert alert-success text-center hidden" id="alert-dismiss" role="alert" >
			<strong>Done!</strong> Post updated successfully!&nbsp;
		</div>
	</div>

	<div class="row content-header bg-light">
		<div class="col-auto mr-auto content-header__title">
			<h1><?php echo $page_header ?></h1>
		</div>
		<div class="col-auto">
			<a class="btn btn-default btn-lg" href="/post/view/<?php echo $post['id'] ?>" title="View" target="_blank"><i class="bi bi-eye"></i></a>
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
							<input type="text" class="form-control input-lg" id="post-title" placeholder="Title" required value="<?php echo $post['title'] ?>" autofocus="" data-placement="bottom" autofocus>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<textarea name="post-content" id="post-content">
								<?php echo $post['content'] ?>
							</textarea>
							<script>
									CKEDITOR.replace( 'post-content',);
									// CKEDITOR.config.extraPlugins: 'simage'  //to enable to plugin
									// CKEDITOR.config.imageUploadURL: "/img/"	 ?>
									// CKEDITOR.config.dataParser: func(data)
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
				<input type="hidden" id="post-id" value="<?php echo $post['id'] ?>">
			</div>
			</div>
		</div>
	</section>
</main>
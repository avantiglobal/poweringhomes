<!-- HTML EDITOR -->
 <!-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> -->
<!-- <script src="<?php //echo LIBRARY_PATH . "/ckeditor/ckeditor.js" ?>"></script> --> 
<script src="/assets/ckeditor/ckeditor.js"></script>
<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/'.$this->_user_language.'/_top_menu.php');
	$arrLanguages = ["en" => "English", "es" => "Espa&ntilde;ol"];
?>

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
				<a class="btn btn-default" href="/post/view/<?php echo $post['id'] ?>" title="View" target="_blank"><i class="bi bi-eye"></i> View Post</a>
				<a class="btn btn-default" href="/post/list" title="Back"><i class="bi bi-arrow-left"></i> Cancel</a>
			</div>
		</div>
	</div>

	<section class="post post__new">
		<div class="container">	
			<div class="content">
			<!-- Editor  -->
			<div class="row">
				<div class="col-md-9">
					<div class="row pb-3">
						<div class="col-sm-12">
							<!-- <input type="text" class="form-control input-lg" id="post-title" placeholder="Title" required value="<?php //echo $post['title'] ?>" autofocus="" data-placement="bottom" autofocus> -->
							<div class="form-floating">
								<input type="text" class="form-control" id="post-title" placeholder="Post Title" value="<?php echo $post['title'] ?>">
								<label for="post-title">Post Title</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mb-3">
							<div class="form-floating">
								<textarea class="form-control" placeholder="Leave a brief summary here" id="post-summary" name="post-summary" style="height: 100px"><?php echo trim($post['summary']) ?></textarea>
								<label for="post-summary">Summary</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<textarea name="post-content" id="post-content">
								<?php echo $post['content'] ?>
							</textarea>
							<script>
									CKEDITOR.replace( 'post-content');
									// CKEDITOR.config.extraPlugins: 'simage'  //to enable to plugin
									// CKEDITOR.config.imageUploadURL: "/img/"	 ?>
									// CKEDITOR.config.dataParser: func(data)
							</script>
						</div>
					</div>
					
				</div>
				<div class="col-md-3">
					<div class="card card-solid bg-dark-gray color-white">
						<!-- <div class="card-header"><i class="fa fa-gear"></i> <h4 class="card-title">Options</h4></div> -->
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<form method="post" id="form-update-img" enctype="multipart/form-data">
										<div class="d-flex align-items-center justify-content-center w-100" style="min-height:150px;">
											<?php if ($post['post_image'] == ''){
												echo '<img src="/img/sys/image-fill.svg" alt="Click to select an image" id="img-update-icon" class="img-update-icon cursor-pointer" >';
											}else{
											?>
											<img src="<?php echo $post['post_image'] ?>" alt="Click to select another image" id="post_image" style="width:100%; height:100%;" class="img-update-icon cursor-pointer">
											<?php } ?>
										</div>
										<div class="d-none">
											<label for="file">Elegir imagen para subir</label>
											<input type="file" id="entity_image" name="entity_image" accept="image/*">
										</div>
										<div class="text-center pt-1 pb-3">
											<small id="update-image-label">Haga Click para seleccionar una nueva imagen</small>
											<button class="btn btn-secondary text-center d-none" id="btn-update-img">Actualizar Image</button>
										</div>
										<input type="hidden" id="post_id" value="<?php echo $post['id'] ?>">
									</form>
								</div>
							</div>

							<div class="row my-3 text-center">
								<div class="col-12">
									<div class="form-floating">
										<select class="form-select" id="post-category" name="post-category" aria-label="Post Category">
											<option></option>
											<?php foreach ($categories as $category) {
												$selectedCat = ($post['category'] == $category["id"]) ? " selected" : "";
												echo '<option value="'.$category["id"].'"'.$selectedCat.'>'.$category['name'].'</option>';
											}?>
										</select>
										<label for="floatingSelect">Categor&iacute;a</label>
									</div>
								</div>
							</div>

							<div class="row my-3 text-center">
								<div class="col-12">
									<div class="form-floating">
										<select class="form-select" id="post-lang" name="post-lang" aria-label="Post Language">
											<option></option>
											<?php foreach ($arrLanguages as $key => $language) {
												$selectedLang = ($post['lang'] == $key) ? " selected" : "";
												echo '<option value="'.$key.'"'.$selectedLang.'>'. $language.'</option>';
											}?>
										</select>
										<label for="floatingSelect">Idioma</label>
									</div>
								</div>
							</div>	

							<div class="row">
								<div class="col-sm-12 text-left">
									<a class="btn btn-primary d-block" id="btn-save-post"><i class="bi bi-save"></i> &nbsp;Guardar <i id="preloader"></i></a>
								</div>
							</div>

							<div class="row mt-3 text-center">
								<!-- <div class="col-sm-4">Active</div>
								<div class="col-sm-4 text-center pull-right">
									<label class="switch">
									<input type="checkbox" checked>
									<span class="slider round"></span>
									</label>
								</div> -->
								<a href="#" class="text-danger pt-3" id="post-delete" data-id="<?php echo $post['id'] ?>"><i class="bi bi-trash"></i> Borrar Post</a>
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
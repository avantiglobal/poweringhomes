<!-- HTML EDITOR -->
 <!-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> -->
<!-- <script src="<?php //echo LIBRARY_PATH . "/ckeditor/ckeditor.js" ?>"></script> --> 
<script src="/assets/ckeditor/ckeditor.js"></script>
<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/'.$this->_user_language.'/_top_menu.php')  ?>
<script>
	(function() {
   // your page initialization code here
   // the DOM will be available here
   		//messageRead('msgId')
		//    $.ajax({
        //     type: "POST",
        //     url: "/message/read",
        //     data: "id=" + id,
        //     cache: "false",
        //     success: function (data) {
        //         console.log(data);
        //         if (data === 'true') {
        //             clearError();
        //             window.location = "/" + defa_controller + "/" + defa_action;
        //         } else {
        //             showError("Wrong username or password");
        //             //$("#preloader").html("");
        //         }
        //     },
        //     beforeSend: function () {
        //         clearError();
        //         // $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
        //     },
        // });
	})();
</script>
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
				<a class="btn btn-default" href="/message/view/<?php echo $message['id'] ?>" title="View" target="_blank"><i class="bi bi-eye"></i> View Message</a>
				<a class="btn btn-default" href="/message/list" title="Back"><i class="bi bi-arrow-left"></i> Cancel</a>
			</div>
		</div>
	</div>

	<section class="message message__new">
		<div class="container">	
			<div class="content">
			<!-- Editor  -->
			<div class="row">
				<div class="col-md-9">
					<div class="row pad-10-bottom">
						<div class="col-sm-12 p-4 mb-4 bg-light rounded-3">
							<div class="row mb-1">
								<div class="col-11"><h4>Client Info</h4></div>
								<div class="col-1"><span class="text-center"><a href="/client/edit/<?php echo $message["id"] ?>"><i class="bi bi-pencil"></i></a></span></div>
							</div>
							<div class="row mb-3">
								<div class="col-12 col-md-6">
									<b class="pe-2">Name:</b>
									<?php echo $message["name"] . " " .$message["lastname"] ?>
								</div>
								<div class="col-12 col-md-6">
									<b class="pe-2">Address:</b>
									<?php echo $message["address"] . ", " .$message["unit"] . ", ". $message["city"] . ", " .$message["state"] . ", " .$message["zipcode"]  ?> 
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-12 col-md-6">
									<b class="pe-2">Phone:</b>
									<?php echo $message["phone"] ?>
								</div>
								<div class="col-12 col-md-6">
									<b class="pe-2">Email:</b>
									<?php echo $message["email"] ?> 
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="caard-text p-2 py-4">
									<?php echo $message['message'] ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row d-none">
						<div class="col-sm-12">
							<!-- <input type="text" class="form-control input-lg" id="message-title" placeholder="Title" required value="<?php //echo $message['title'] ?>" autofocus="" data-placement="bottom" autofocus> -->
							<textarea name="message-content" id="message-content">
								<?php echo $message['message'] ?>
							</textarea>
							<script>
									CKEDITOR.replace( 'message-content');
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
							Message ID: <?php echo $message_id ?>
							<!-- <div class="row pt-4 pb-3">
								<div class="col-12 text-center">
									<div><h4>Bill Amount</h4></div>
									<h2>$<?php //echo $message['bill_amount'] ?></h2>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-12 mb-0">
									<div class="p-0 px-3">
										<?php 
											//$reqDate = date_create($message['created_on']);
										?>
										<b>Request Date:</b> 
										<span title="<?php //echo date_format($reqDate,"m/d/Y H:i:s");?>">
											<?php //echo date_format($reqDate,"m/d/Y"); ?>
										</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="px-3">
										<?php 
											//$reqDate = date_create($message['updated_on']);
										?>
										<b>Last Update:</b> 
										<span title="<?php //echo date_format($reqDate,"m/d/Y H:i:s");?>">
											<?php //echo date_format($reqDate,"m/d/Y"); ?>
										</span>
									</div>
								</div>
							</div>
							<hr class="mb-3">
							<div class="row">
								<div class="col-12 mb-3">
									Update Status
									<select name="message_status" id="message_status" class="form-select" aria-label="Set Message Status">
										<option value="NEW">New</option>
										<option value="PRC">In Process</option>
										<option value="APR">Message Approved</option>
										<option value="REJ">Message Rejected</option>
										<option value="ARC">Archived</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 text-left">
									<a class="btn btn-primary d-block" id="btn-save-message"><i class="bi bi-save"></i> &nbsp;Save <i id="preloader"></i></a>
								</div>
							</div> -->
							<div class="row mt-3 text-center">
								<!-- <div class="col-sm-4">Active</div>
								<div class="col-sm-4 text-center pull-right">
									<label class="switch">
									<input type="checkbox" checked>
									<span class="slider round"></span>
									</label>
								</div> -->
								<a href="#" class="text-danger pt-3" id="message-delete" data-id="<?php echo $message['id'] ?>"><i class="bi bi-trash"></i> Delete Message</a>
							</div>

						</div>

					</div>
				</div>
				<input type="hidden" id="message-id"   value="<?php echo $message_id ?>">
				<input type="hidden" id="message-read" value="1">
			</div>
			</div>
		</div>
	</section>
</main>
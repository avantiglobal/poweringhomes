	<div class="alert alert-success text-center hidden" id="alert-dismiss" role="alert" >
	  <strong>Done!</strong> User updated successfully!&nbsp;
	</div>

  <div class="row bg-light mt-0 py-2">
    <div class="col-auto mr-auto content-header">
      <h1><?php echo $page_header ?></h1>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary btn-lg text-white" id="btn-user-form"><i class="fa fa-save"></i><i id="preloader"></i></a>
        <a class="btn btn-danger  btn-lg text-white" id="btn-delete-user"><i class="fa fa-trash"></i></a>
        <a class="btn btn-default btn-lg" href="/user/viewall"><i class="fa fa-times"></i></a>
    </div>
  </div>
	<div class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Personal Data</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="form-group col-sm-6">
							    <label for="name">Name</label>
							    <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $user['name'] ?>">
							</div>		
							<div class="form-group col-sm-6">
							    <label for="lastname">Last Name</label>
							    <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="<?php echo $user['lastname'] ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
							    <label for="">Email</label>
							    <input type="email" class="form-control" id="email" name="" placeholder="User contact Email" value="<?php echo $user['email'] ?>">
							</div>		
							<div class="form-group col-sm-6">
							    <label for="">Phone</label>
							    <input type="text" class="form-control" id="phone" name="" placeholder="Phone Number" value="<?php echo $user['phone'] ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12">
							    <label for="">Address</label>
							    <input type="text" class="form-control" id="address" placeholder="User Address" value="<?php echo $user['address'] ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
		                <h3 class="box-title">Agency Data</h3>

		                <div class="box-tools pull-right">
		                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
		                  </button>
		                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		                </div>
		            </div>
					<div style="display: none;" class="box-body">
						<div class="row">
							<div class="form-group col-sm-4">
							    <label for="">Agency</label>
							    <select class="form-control" id="agency_id" name="agency_id">
							    	<option>Select an Agency</option>
							    	<option value="">TopOne US</option>
							    	<option value="">TopOne México</option>
							    	<option value="">TopOne Deutschland</option>
							    	<option value="">TopOne Venezuela :'(</option>
							    </select>
							</div>		
							<div class="form-group col-sm-4">
							    <label for="">Type</label>
							    <select class="form-control" id="type" name="type">
							       	<option>Type of User</option>
							    	<option value="1">Seller</option>
							    	<option value="2">Project Manager</option>
							    	<option value="3">Developer</option>
							    	<option value="4">Administrator</option>
							    	<option value="5">Accountant</option>
							    </select>
							</div>
							<div class="form-group col-sm-4">
							    <label for="">Status</label>
							    <select class="form-control" id="status" name="status">
							       	<option>Select a Status</option>
							    	<option value="1">Active</option>
							    	<option value="2">Inactive</option>
							    </select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Login Data</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="form-group col-sm-12">
							    <label for="">Username</label>
							    <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?php echo $user['username'] ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12">
							    <label for="">Password</label>
							    <input type="password" class="form-control mb-2" id="password" name="password" placeholder="" style="display: none;" value="">
							    <a href="#" class="form-control btn btn-default" id="btn-change-pass">Change password</a>
							    
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="user-id" value="<?php echo $user['id'] ?>">
      		<input type="hidden" id="saved-username" value="<?php echo $user['username'] ?>">
			<input type="hidden" id="pwdval" value="0">

		</div>

	</div>
		<!--
		User
		● user_id
		● name
		● lastname
		● nickname
		● phone
		● email
		● address
		● type
			1 Seller
			2 Project Manager
			3 Developer
			4 Administrator
			5 Accountant
		● agency_id
		● username
		● password
		● preferences
		● date_in
		● date_out
		● status
			1 Active
			2 Inactive
		-->
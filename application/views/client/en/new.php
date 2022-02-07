<form id="form-new-client">
	<!-- Personal Data  -->
	<div class="row">
		<div class="col-md-12">
	  		<div class="box box-solid">
			    <div class="box-header with-border">
			      <i class="fa fa-user-o"></i>
			      <h3 class="box-title">Personal Data</h3>
			    </div>
			    <!-- /.box-header -->
			    <div class="box-body">
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="name">Name</label>
						    <input type="text" class="form-control" id="name" placeholder="Name" required value="">
						</div>		
						<div class="form-group col-sm-6">
						    <label for="lastname">Last Name</label>
						    <input type="text" class="form-control" id="lastname" placeholder="Last Name">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="">Email</label>
						    <input type="email" class="form-control" id="email" name="" placeholder="Client contact Email">
						</div>		
						<div class="form-group col-sm-6">
						    <label for="">Phone</label>
						    <input type="text" class="form-control" id="phone" name="" placeholder="Phone Number">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="">Address</label>
						    <input type="text" class="form-control" id="address" placeholder="Client Address">
						</div>
						<div class="form-group col-sm-6">
						    <label for="">Country</label>
						    <select id="country" class="form-control" id="country" name="">
						    	<option value=""></option>
						    	<?php foreach ($countries as $country): ?>
						    		<option value="<?php echo($country) ?>"> <?php echo($country) ?></option>
						    	<?php endforeach ?>
						    </select>
						</div>
					</div>
			    </div>
		    	<!-- /.box-body -->
		  	</div>
		  	<!-- /.box -->
		</div>
	</div>

	<!-- Company Info  -->
	<div class="row">
		<div class="col-md-12">
	  		<div class="box box-solid">
			    <div class="box-header with-border">
			      <i class="fa fa-industry"></i>
			      <h3 class="box-title">Company Info</h3>
			    </div>
			    <!-- /.box-header -->
			    <div class="box-body">
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="name">Company Name</label>
						    <input type="text" class="form-control" id="company_name" placeholder="Company Name">
						</div>		
						<div class="form-group col-sm-6">
						    <label for="lastname">Company About</label>
						    <input type="text" class="form-control" id="company_about" placeholder="Company About">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="">Budget</label>
						    <select type="text" class="form-control" id="budget" name="" placeholder="Budget">
						    	<option value="0-500"> USD 0 - USD 500</option>
						    	<option value="500-1000"> USD 500 - USD 1000</option>
						    	<option value="1000-1500"> USD 1000 - USD 1500</option>
						    	<option value="1500-2000"> USD 1500 - USD 2000</option>
						    	<option value=">2000"> > USD 2000</option>
						    </select>
						</div>	
						<div class="form-group col-sm-6">
						    <label for="">Target Audience</label>
						    <input type="text" class="form-control" id="target_audience" name="" placeholder="Target Audience">
						</div>
					</div>
			    </div>
		    	<!-- /.box-body -->
		  	</div>
		  	<!-- /.box -->
		</div>
	</div>

	<!-- Website Info  -->
	<div class="row">
		<div class="col-md-12">
	  		<div class="box box-solid">
			    <div class="box-header with-border">
			      <i class="fa fa-globe"></i>
			      <h3 class="box-title">Website Info</h3>
			      <span class="pull-right">
			      	<input type="radio" name="has-website" id="has-website" value="existing" checked> Existing Website &nbsp;
				    <input type="radio" name="has-website" id="has-website" value="new"> New Website
			      </span>
			    </div>
			    <!-- /.box-header -->
			    <div class="box-body" id="existing-website">
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="name">Website Name</label>
						    <input type="text" class="form-control" id="website_name" placeholder="http://">
						</div>		
						<div class="form-group col-sm-6">
						    <label for="lastname">Webhost Company</label>
						    <input type="text" class="form-control" id="webhost_company" placeholder="Webhost Company">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="">Use existing website content</label>
						    <select type="text" class="form-control" id="use_existing_website_content" name="" placeholder="Budget">
						    	<option value="1"> Yes</option>
						    	<option value="0"> No</option>
						    </select>
						</div>	
						<div class="form-group col-sm-6">
						    
						</div>
					</div>
			    </div>
			    <div class="box-body" id="new-website" style="display: none;">
					<div class="row">
						<div class="form-group col-sm-6">
						    <label for="name">Intended Domain</label>
						    <input type="text" class="form-control" id="intended_domain" placeholder="http://">
						</div>		
						<div class="form-group col-sm-6">
						    
						</div>
					</div>
			    </div>
		    	<!-- /.box-body -->
		  	</div>
		  	<!-- /.box -->
		</div>
	</div>

	<!-- Website Info  -->
	<div class="row">
		<div class="col-md-12 text-right">
			<a class="btn btn-default" href="/client/viewall"><i class="fa fa-times"></i> Cancel</a>
			<a class="btn btn-primary"  id="btn-new-client"><i class="fa fa-save"></i> Add Client</a>
		</div>
	</div>
</form>
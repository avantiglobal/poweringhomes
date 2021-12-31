
	<div class="row bg-light mt-0 py-2">
		<div class="col-auto mr-auto content-header">
			<h1>Add New Product</h1>
		</div>
 		<div class="col-auto">
		    <a class="btn btn-primary btn-lg text-white" id="btn-product-save"><i class="fa fa-save"></i><i id="preloader"></i></a>
		    <a class="btn btn-default btn-lg" href="/product/viewall"><i class="fa fa-times"></i></a>
		  <!--<li class="nav-item">
		    <label class="switch">
			  <input type="checkbox" checked="">
			  <span class="slider round"></span>
			</label>
		  </li>-->
 		</div>
	</div>
	
	<div class="row bg-white">
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" href="#">Summary</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Attributes</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Sales</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Marketing</a>
			  </li>
			</ul>
		</div>
	</div>

	<div class="container mt-3">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">About</div>
					<div class="card-body">
						<form>
						  <div class="form-group row">
						    <label for="product-name" class="col-sm-2 col-form-label">Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="product-name" placeholder="Name" autofocus="">
						    </div>
						  </div>
						  <hr>
						  <!--<div class="form-group row">
						    <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" id="short_description" rows="5"></textarea>
						    </div>
						  </div>-->
						  <div class="form-group row">
						    <label for="product_description" class="col-sm-2 col-form-label">Description</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" id="product_description" rows="9"></textarea>
						      <!--<div class="summernote"></div>-->
						    </div>
						  </div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card mb-2">
					<div class="card-header">Price</div>
					<div class="card-body">
						<form>
						  <div class="form-group row">
						    <label for="price" class="col-sm-5 col-form-label">Price</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" id="price" placeholder="0.00">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="regular-price" class="col-sm-5 col-form-label">Regular price</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" id="regular-price" placeholder="Regular price (RRP)">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="sale-price" class="col-sm-5 col-form-label">Sale price</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" id="sale-price" placeholder="0.00">
						    </div>
						  </div>
						</form>
					</div>
				</div>

				<div class="card mb-2">
		          <div class="card-header">Category</div>
		          <div class="card-body">
		              <div class="form-group row">
		                <div class="col-sm-12">
		                  <select id="category">
		                  	<?php foreach ($categories as $category) { ?>
		                  		<option value="<?php echo $category['termtax_id'] ?>">
		                  			<?php echo $category['term_name'] ?>
		                  		</option>
		                  	<?php } ?>
		                  </select>
		                </label>
		                </div>
		              </div>
		          </div>
		        </div>
			</div>
			<input type="hidden" id="product-id" value="">
		</div>
	</div>
	
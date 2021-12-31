  <div class="alert alert-success text-center hidden" id="alert-dismiss" role="alert" >
    <strong>Done!</strong> Term updated successfully!&nbsp;
  </div>

  <div class="row bg-light mt-0 py-2">
    <div class="col-auto mr-auto content-header">
      <h1><?php echo $page_header ?></h1>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary btn-lg text-white" id="btn-term-save"><i class="fa fa-save"></i><i id="preloader"></i></a>
        <a class="btn btn-default btn-lg" href="/term/viewall"><i class="fa fa-times"></i></a>
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
                <label for="term-name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="term-name" placeholder="Name" autofocus="" 
                  value="<?php echo $term['name'] ?>">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-2">
          <div class="card-header">Active</div>
          <div class="card-body">
            
              <div class="form-group row m-0">
                <label for="price" class="col-sm-5 col-form-label">Active</label>
                <div class="col-sm-7">
                  <label class="switch">
                  <input type="checkbox" checked="false" id="active_toggle_switch">
                  <span class="slider round"></span>
                </label>
                </div>
              </div>
            
          </div>
        </div>
      </div>
      <input type="hidden" id="term-id" value="<?php echo $term['id'] ?>">
      <input type="hidden" id="saved-name" value="<?php echo $term['name'] ?>">
    </div>
  </div>
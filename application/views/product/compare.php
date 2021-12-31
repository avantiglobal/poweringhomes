<div class="container">
  <div class="row">
    <div class="col-md-7">
      <h1><?php echo $product['prod_name'] ?></h1>
      <p><?php echo $product['description'] ?></p>
    </div>
    <div class="col-md-5">
      <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
              <div class="card-header bg-primary text-white"><?php echo $product['prod_name'] ?></div>
              <div class="card-body py-0">
                <p><h4>Value</h4><small>Key</small></p>
                <p><h4>Value</h4><small>Key</small></p>
                <p><h4>Value</h4><small>Key</small></p>
                <p><h4>Value</h4><small>Key</small></p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
              <div class="card-header bg-info text-white"><?php echo $product['prod_name'] ?></div>
              <div class="card-body py-0">
                <p><h4>Value</h4><small>Key</small></p>
                <p><h4>Value</h4><small>Key</small></p>
                <p><h4>Value</h4><small>Key</small></p>
                <p><h4>Value</h4><small>Key</small></p>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row pt-3">
    <div class="col-md-12">
      <h4>FAQ's</h4>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header bg-white text-white" role="tab" id="headingOne">
            <h5 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collapsible Group Item #1
              </a>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block p-3">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-white text-white" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Collapsible Group Item #2
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-block p-3">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-white text-white" role="tab" id="headingThree">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Collapsible Group Item #3
              </a>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="card-block p-3">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt-5 mt-0 py-1 bg-dark text-white">
  <div class="row">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-5">
          <h1 class="display-4"> <strong>Kostenfrei</strong><span class="d-block"> und unverbindlich vergleichen</span></h1>
          <p class="pt-3">
            If you want to receive a custom evaluation according to your profile, please fill out this form and send us
            your information. In a few hours you will get an email with specific data about your case.
          </p>
        </div>
        <div class="col-md-7">
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Ja, ich akzeptiere die <a href="#">Datenschutzbestimmungen.</a>
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row my-5">
      <div class="col-md-12">
        <h2>Reviews</h2>
      </div>
  </div>
</div>
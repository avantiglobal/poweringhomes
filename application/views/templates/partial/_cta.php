<div class="cta bg-secondary">
    <div class="container text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h2 class="display-5 fw-bold text-white">Do you want to know if you qualify?</h2>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Find out if your Zip Code is within our served areas.</p>
                <form id="zipcode-checker-form">
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" type="search" name="s" id="zipcode-checker-input" title="ZIP Code" placeholder="ZIP Code" required maxlength="5">
                            <label for="floatingName">ZIP Code</label>
                        </div>
                        <div class="form-floating mb-3">
                            <button class="btn btn-primary py-3" type="submit" title="Search" id="zipcode-checker-btn" aria-label="Search">CHECK SAVINGS</button>
                        </div>
                    </div>
                    <div class="alert-danger d-none p-3" id="zipcode-form-error">&nbsp;</div>
                    <input type="hidden" name="apiURL" id="apiURL" value="<?php echo (getenv('REMOTE_ADDR') == '127.0.0.1') ? Application::getConfig('development.api.url') : Application::getConfig('production.api.url') ?>">
                </form>
            </div>
        </div>
    </div>
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Powering Homes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 px-md-5">
        <h4>Congratulations, you are in an area prime for solar savings.</h4>
        <h6>Complete your information below to continue.</h6>
        
        <form id="quote">
            <div class="row pb-4 pb-md-3">
                <div class="col-12 m-auto">
                    <div class="text-center"><span class="fs-2">1</span></div>
                    <div class="text-center">
                        <span class="fs-6">How much is your TYPICAL electricity bill?</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-4 m-auto">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-bill-amount" id="quote-bill-amount" title="$" placeholder="$" required>
                        <label for="floatingName">$</label>
                    </div>
                </div>
            </div>

            <div class="row pb-3 pb-md-4">
                <div class="col-12 m-auto">
                    <div class="text-center"><span class="fs-2">2</span></div>
                    <div class="text-center">
                        <span class="fs-6">Tell Us More About You</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-name" id="quote-name" title="Name" placeholder="Name" required>
                        <label for="quote-name">First Name</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-lastname" id="quote-lastname" title="Last Name" placeholder="Last Name" required>
                        <label for="quote-lastname">Last Name</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-address" id="quote-address" title="Address" placeholder="Address" required>
                        <label for="quote-addresss">Address</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-unit" id="quote-unit" title="unit" placeholder="unit">
                        <label for="quote-unit">Unit</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-city" id="quote-city" title="City" placeholder="City" required>
                        <label for="quote-city">City</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-state" id="quote-state" title="State" placeholder="State">
                        <label for="quote-state">State</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-zipcode" id="quote-zipcode" title="zipcode" placeholder="zipcode">
                        <label for="quote-zipcode">Zip Code</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-phone" id="quote-phone" title="Phone" placeholder="Phone" required>
                        <label for="quote-phone">Phone</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" type="text" name="quote-email" id="quote-email" title="Email" placeholder="Email">
                        <label for="quote-email">Email</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        <small class="text-muted">By submitting this request, you authorize <b><?php echo Application::getConfig('company.name') ?></b> to call you or text you on the phone number you provided and prerecorded calls or messages even if your number is on any federal, state, or local do not call list. Your consent to this agreement is not required to purchase products or services. We respect your privacy.</small>
                    </p>
                </div>
            </div>
        </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Apply for Savings</button>
      </div>
    </div>
  </div>
</div>
</div>
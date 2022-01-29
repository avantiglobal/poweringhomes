<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Powering Homes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="quote-form">
            <div class="modal-body px-3 px-md-5">
                <div id="quote-form-fields">
                    <h4>Congratulations, you are in an area prime for solar savings.</h4>
                    <h6>Complete your information below to continue.</h6>
                    <div class="row pb-4 pb-md-3">
                        <div class="col-12 m-auto">
                            <div class="text-center rounded-circle m-auto bg-secondary d-flex align-items-center justify-content-center mb-2" style="width:50px !important; height:50px !important;"><span class="fs-4 text-white">1</span></div>
                            <div class="text-center">
                                <span class="fs-6">How much is your TYPICAL electricity bill?</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 col-md-4 m-auto">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="quote-bill-amount" id="quote-bill-amount" title="Enter your bill amount" placeholder="$" required autofocus>
                                <label for="floatingName">$</label>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-3 pb-md-4">
                        <div class="col-12 m-auto">
                        <div class="text-center rounded-circle m-auto bg-secondary d-flex align-items-center justify-content-center mb-2" style="width:50px !important; height:50px !important;"><span class="fs-4 text-white">2</span></div>
                            <div class="text-center">
                                <span class="fs-6">Tell Us More About You</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="name" id="name" title="Name" placeholder="Name" required maxlength="45">
                                <label for="name">First Name</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="lastname" id="lastname" title="Last Name" placeholder="Last Name" required maxlength="45">
                                <label for="lastname">Last Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="address" id="address" title="Address" placeholder="Address" required>
                                <label for="address" maxlength="255">Address</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="unit" id="unit" title="unit" placeholder="unit" maxlength="10">
                                <label for="unit">Unit</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="city" id="city" title="City" placeholder="City" required maxlength="45" readonly>
                                <label for="city" maxlength="45">City</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="state" id="state" title="State" placeholder="State" readonly>
                                <label for="state" maxlength="2">State</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="zipcode" id="zipcode" title="zipcode" placeholder="zipcode" maxlength="5" readonly>
                                <label for="zipcode">Zip Code</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="phone" id="phone" title="Phone" placeholder="Phone" required maxlength="12">
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" type="text" name="email" id="email" title="Email" placeholder="Email" required>
                                <label for="email">Email</label>
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
                </div>
                <div id="quote-thankyou" class="d-none text-center py-5">
                    <h4>Thanks for filling out our form!</h4>
                    
                    <div class="pt-3 pt-md-4">We will look over your message and get back to you soon. 
                        In the meantime, you can check the FAQ section or browse through our latest 
                        blog posts. Please click 'Close' to continue.
                    </div>
                    <div class="pt-4">Your friends at <?php echo Application::getConfig('company.name') ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-cancel-btn">Cancel</button>
                <button type="button" class="btn btn-secondary d-none" data-bs-dismiss="modal" id="modal-close-btn">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-quote-form">Apply for Savings</button>
            </div>
        </form> 
    </div>
  </div>
</div>
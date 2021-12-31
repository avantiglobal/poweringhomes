<div class="bg-primary1">
  <div class="aligner" style="height:100vh;">
    <div class="aligner-item" style="width:25vw;">
        <form id="signup-form">
          <!-- Profile Image -->
          <div class="card p-3">
            <h3 class="profile-username text-center" id="signup-title">Sign Up</h3>

            <div class="card-body" id="signup-card">
                <div class="row">
                    <div class="form-group col-sm-12 text-center" id="add_err"></div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <input type="text" class="form-control" id="name" placeholder="Name" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 pl-5">
                        <input type="checkbox" name="" class="form-check-input" id="recruiter">
                        <label class="form-check-label" for="recruiter">I am a recruiter</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control" id="company" placeholder="Company Name" disabled="true">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control" id="linkedin" placeholder="LinkedIn Profile" disabled="true">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <a href="" class="btn btn-primary btn-block" id="signup-btn">Create Account
                            <span class="spinner-grow text-light d-none" role="status" id="preloader">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </a>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
                
            <!-- /.row -->
            <input type="hidden" name="defa_controller" id="defa_controller" value="<?php echo (Application::getConfig('default.controller')); ?>">
            <input type="hidden" name="defa_action" id="defa_action" value="<?php echo (Application::getConfig('default.action')); ?>">
        </form>
    </div>
  </div>
</div>
<div class="signup">
    <div class="container">
        <div class="row py-5 border-bottom">
            <div class="col-12 col-md-8 col-lg-5 m-auto px-3">
                <div class="justify-content-center1">
                    <form id="signup-form">
                        <img class="img-thumbnail rounded-circle mx-auto d-block" src="<?php echo '/img/logo.png' ?>" alt="Company Logo">

                        
                            <h3 class="profile-username" id="signup-title">Sign Up</h3>

                            
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group col-sm-12 text-center" id="add_err"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col d-flex">
                                        <div class="form-floating mb-3 flex-fill me-1">
                                            <input type="text" class="form-control" id="name" placeholder="name">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="form-floating mb-3 flex-fill ms-2">
                                            <input type="text" class="form-control" id="lastname" placeholder="lastname">
                                            <label for="lastname">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                                            <label for="email">Email Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" placeholder="Password">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <a href="" class="btn btn-primary d-block py-3" id="signup-btn">Create Account
                                            <span class="spinner-grow text-light d-none" role="status" id="preloader">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            
                        
                            
                        <!-- /.row -->
                        <input type="hidden" name="defa_controller" id="defa_controller" value="<?php echo (Application::getConfig('default.controller')); ?>">
                        <input type="hidden" name="defa_action" id="defa_action" value="<?php echo (Application::getConfig('default.action')); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
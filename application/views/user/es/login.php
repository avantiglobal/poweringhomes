<div class="login-form">
  <div class="container">
    <div class="row flex-margin py-5 border-bottom">
      <div class="col-12 col-md-8 col-lg-5 m-auto px-3">
        <form class="py-md-5" id="login-form">
          <img class="img-thumbnail rounded-circle mx-auto d-block" src="<?php echo '/img/logo.png' ?>" alt="company logo">

          <h3 class="profile-username text-start">User Login</h3>
          <!-- <div class="mt-3 mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Username">
          </div> -->

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" placeholder="Usuario">
            <label for="floatingName">Usuario</label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" placeholder="Contrase&ntilde;a">
            <label for="floatingName">Contrase&ntilde;a</label>
          </div>
        
          <!-- <div class="mb-3">
              <label for="">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
          </div> -->
        
          <div class="mb-3 text-center" id="add_err"></div>
        
          <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary w-100 py-3" id="btn-login">Ingresar <span id="preloader"></span></button>
          </div>
        
          <div class="col-sm-12 text-center">
            <a href="/">Regresar al Inicio</a>
          </div>

          <input type="hidden" name="defa_controller" id="defa_controller" value="<?php echo (Application::getConfig('default.controller')); ?>">
          <input type="hidden" name="defa_action" id="defa_action" value="<?php echo (Application::getConfig('default.action')); ?>">
        </form>
      </div>
    </div>
  </div>
</div>



<?php
/*
 
  $roles = array(
    'master' => array(
      'name'         => 'Master',
      'capabilities' => array(
          'user_dashboard' => 'true',
          'user_edit' => 'true',
          'user_login' => 'true',
          'user_view' => 'true',
          'user_viewall' => 'true',
          'user_new' => 'true',
          'client_edit' => 'true',
          'client_new' => 'true',
          'client_view' => 'true',
          'client_viewall' => 'true'
        ),
      'menu' => array(
        'Dashboard' => array('url' => '/user/dashboard', 'icon' => 'fa fa-dashboard'),
        'Posts' => array('url' => '/post/viewall', 'icon' => 'fa fa-edit', 'submenu' => array(
          'All posts' => array('url' => '/post/viewall'),
          'Add new' => array('url' => '/post/new')
        )),
        'Clients' => array('url' => '/client/viewall', 'icon' => 'fa fa-users', 'submenu' => array(
          'All clients' => array('url' => '/client/viewall'),
          'Add new' => array('url' => '/client/new')
        )),
        'Users' => array('url' => '/user/viewall', 'icon' => 'fa fa-user', 'submenu' => array(
          'All users' => array('url' => '/user/viewall'),
          'Add new' => array('url' => '/user/new')
        )),
        'Products' => array('url' => '/product/viewall', 'icon' => 'fa fa-cube', 'submenu' => array(
          'All products' => array('url' => '/product/viewall'),
          'Add new' => array('url' => '/product/new')
        )),
        'Settings' => array('url' => '#', 'icon' => 'fa fa-cog', 'submenu' => array(
          'Terms' => array('url' => '/term/viewall'),
          'Taxonomies' => array('url' => '/term_taxonomies/viewall')
        ))
      )
    ),
    'administrator' => array(
      'name'         => 'Administrator',
      'capabilities' => array(
          'user_dashboard' => 'true',
          'user_edit' => 'true',
          'user_login' => 'true',
          'user_view' => 'true',
          'user_viewall' => 'true',
          'user_new' => 'true',
          'client_edit' => 'true',
          'client_new' => 'true',
          'client_view' => 'true',
          'client_viewall' => 'true'
        ),
      'menu' => array(
        'Dashboard' => array('url' => '/dashboard', 'icon' => 'fa fa-grind'),
        'Users' => array('url' => '/user/viewall', 'icon' => 'ion-android-contacts', 'submenu' => array(
          'All users' => array('url' => '/user/viewall' , 'icon' => 'ion-android-contacts'),
          'Add new' => array('url' => '/user/new' , 'icon' => 'fa fa-user-plus')
        )),
        'Clients' => array('url' => '/client/viewall', 'icon' => 'fa fa-users', 'submenu' => array(
          'All users' => array('url' => '/client/viewall' , 'icon' => 'fa fa-users'),
          'Add new' => array('url' => '/client/new' , 'icon' => 'fa fa-user-plus')
        ))
      )
    )
  );
  //serialize($roles);
  //echo '<pre>';
  //var_dump($roles);
  $seri = serialize($roles);
  echo '<br>' . $seri;
  //$unseri = unserialize($seri, ['allowed_classes' => false]);
  //var_dump($unseri);
  //echo '</pre>';
*/
?>
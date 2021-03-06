<?php 
  $i        = 0;
  // $mainMenu = array(
  //   "Home" => "/", 
  //   "Resources" => array(
  //     "Areas Served" => "/areas-served",
  //     "Blog" => "/blog" ,
  //     "FAQs" => "/faqs",
  //   ),
  //   "Contact" => "/contact" 
  // );

  $mainMenu = array(
    "Inicio" => "/",
    //"Areas Served" => "/areas-served",
    "Blog" => "/blog" ,
    "Preguntas Frecuentes" => "/faqs",
    "Contacto" => "/contact"
  );
?>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="<?php echo "/img/poweringhomes-logo.png" ?>" alt="Powering Homes" class="navbar-brand__logo" >
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav me-auto mb-2 ps-3 mb-md-0 d-flex justify-content-center">
          <?php 
            $keys   = array_keys($mainMenu);
            $values = array_values($mainMenu);
              for($i = 0; $i < count($mainMenu); $i++) {
                  
                  if (gettype($values[$i]) == "array"){ ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php echo $keys[$i] ?>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($mainMenu[$keys[$i]] as $key => $value) { ?>
                          <li><a class="dropdown-item" href="<?php echo $value ?>"><?php echo $key ?></a></li>
                        <?php } ?>
                      </ul>
                    </li>
                  
                  <?php }elseif (gettype($values[$i]) == "string"){ ?>
                    <li class="nav-item">
                      <a class="nav-link <?php if ($i == 0) { echo "active"; } ?>" aria-current="page"  href="<?php echo $values[$i] ?>"><?php echo $keys[$i] ?></a>
                    </li>
                  <?php }
              }
            ?>
        </ul>
        <?php if (isset($_SESSION['id'])){ ?> 
          <div class="d-flex">
            <a href="/user/dashboard" class="px-4">Dashboard</a>
            <a href="/user/logout">Logout</a>
          </div>
        <?php }else{ 
            includeTpl("/partial/".$this->_user_language."/_check_zipcode_form");
         }?>
      </div>
    </div>
  </nav>
</header>
<div class="clear-fixed-top"></div>
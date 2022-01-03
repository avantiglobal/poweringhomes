<?php 
  $i        = 0;
  $mainMenu = array(
    "Home" => "/", 
    "Resources" => array(
      "Areas Served" => "/areas-served",
      "Blog" => "/blog" ,
      "FAQs" => "/faqs",
    ),
    "Contact" => "/contact" 
  );
?>
<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="<?php echo "/img/poweringhomes-logo.png" ?>" alt="Powering Homes">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
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
            <a href="/user/dashboard">My Account</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </nav>
</header>
<div class="clear-fixed-top"></div>
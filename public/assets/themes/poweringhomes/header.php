<?php 
  $i        = 0;
  $mainMenu = array("Home" => "/",  "Services" => "services", "Contact" => "contact" , "FAQ's" => "faqs", "Areas Served" => "areas-served"  );
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
          <?php foreach ($mainMenu as $key => $value) { ?>
            <li class="nav-item">
              <a class="nav-link <?php if ($i == 0) {?>active" aria-current="page"<?php }?> href="/<?php echo $value ?>"><?php echo $key ?></a>
            </li>
          <?php 
            $i++;
            } 
          ?>
        </ul>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Enter ZIP Code" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Get Quote</button>
        </form> -->
      </div>
    </div>
  </nav>
</header>
<div class="clear-fixed-top"></div>
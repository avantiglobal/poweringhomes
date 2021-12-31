<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo '/'.Application::getConfig('path.public-img').Application::getConfig('path.public-sys-img').'/favico.png' ?>" sizes="32x32" />
    <title><?php echo Application::getConfig("company.name") ?> - <?php echo Application::getConfig("company.slogan") ?></title>

    <!-- Bootstrap 4 core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="/assets/themes/agerig/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="aligner" style="height:100vh;">
        <div class="aligner-item text-center">
            <i class="fa fa-warning" style="color:blue; font-size:40px;"></i>
            <h3>Ooops!</h3>
            <p>Sorry. The page you requested was not found.</p>
            <small>Scroll down for more details</small>
        </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/057583ce1e.js"></script>
  </body>
</html>

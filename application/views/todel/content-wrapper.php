  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" <?php echo ($doNotRenderSidebar == 0) ? '' : 'style="margin:0;"' ; ?>>
    <!-- Content Header (Page header) -->
    <?php if ($doNotRenderContentHeader == 0) { ?>
    <section class="content-header">
      <h1>
        <?php echo $page_header ?>
        <small><?php //echo $page_description ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/<?php echo empty($level_url) ? 'user/dashboard' : $level_url; ?>"><i class="fa fa-dashboard"></i> <?php echo empty($level) ? 'Dashboard' : $level; ?></a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <?php } ?>

    <!-- Main content -->
    <section class="content container-fluid">


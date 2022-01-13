<?php //if (!isset($_SESSION['id'])){ }?> 

<main>
  <?php includeTpl('/partial/_banner') ?>
  <?php includeTpl('/partial/_about') ?>
  <?php includeTpl('/partial/_process') ?>
  <?php includeTpl('/partial/_why') ?>
  <?php includeTpl('/partial/_testimonials') ?>
  <?php includeTpl('/partial/_cta') ?>
  <?php includeTpl('/partial/_blog_feed', $this->variables) ?>
</main>

<!-- <p><a href=<?php //echo "mailto:" . Application::getConfig('company.email')  ?>><?php echo Application::getConfig('company.email') ?></a></p> -->
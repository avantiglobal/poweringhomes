<?php //if (!isset($_SESSION['id'])){ }?> 

<main>
  <!-- <div class="test"><h2>This is a test <?php //echo $this->_user_language ?></h2></div> -->
  <?php includeTpl('/partial/'.$this->_user_language.'/_banner') ?>
  <?php includeTpl('/partial/'.$this->_user_language.'/_about') ?>
  <?php includeTpl('/partial/'.$this->_user_language.'/_process') ?>
  <?php includeTpl('/partial/'.$this->_user_language.'/_why') ?>
  <?php includeTpl('/partial/'.$this->_user_language.'/_testimonials') ?>
  <?php includeTpl('/partial/'.$this->_user_language.'/_cta') ?>
  <?php includeTpl('/partial/'.$this->_user_language.'/_blog_feed', $this->variables) ?>
</main>

<!-- <p><a href=<?php //echo "mailto:" . Application::getConfig('company.email')  ?>><?php echo Application::getConfig('company.email') ?></a></p> -->
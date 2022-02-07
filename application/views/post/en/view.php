<main>
  <section class="post post__page">
      <div class="container">
        <div class="row py-2">

          <div class="row min-height-300">
            <div class="col-12 col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <div class="post__page__header">
                    <div class="text-primary text-uppercase py-2"><small><?php echo $category ?></small></div>
                    <h2><?php echo $post_title ?></h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 fs-5 d-flex align-items-center mb-3">
                  <?php echo $summary ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <img src="<?php echo $post_image ?>" alt="" class="img-fluid" style="width:100%; height:auto;">
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <?php echo $post_content ?>
                </div>  
              </div>
            </div>
            <div class="col-12 col-md-4 pe-md-5">
              <h4 class="pt-3">Browse Content</h4>
              <ul>
                <li><a href="/blog">All</a></li>
              <?php foreach ($categories as $key => $category) {
                echo '<li><a href="/blog/' . str_replace(' ','-',strtolower($category["category_name"]))  . '" >' . $category["category_name"] . '</a></li>';
              } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
  </section>
</main>
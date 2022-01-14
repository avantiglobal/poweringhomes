<main>
  <section class="post post__page">
      <div class="container">
        <div class="row py-3 py-md-4">
          <div class="col-md-12">
              <div class="post__page__header">
                <h2><?php echo $post_title ?></h2>
              </div>
            </div>
          </div>

          <div class="row min-height-300">
            <div class="col-12 col-md-8">
              <div class="row">
                <div class="col-12 col-md-6">
                  <img src="<?php echo $post_image ?>" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-6">
                <?php echo $summary ?>"
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <?php echo $post_content ?>
                </div>  
              </div>
            </div>
            <div class="col-12 col-md-4 pe-md-5">
              <h4>Browse Content</h4>
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
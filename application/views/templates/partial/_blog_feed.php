<div class="blog-feed bg-light border-bottom ">
  <div class="container px-4 py-5" id="custom-cards">
    
    <div class="text-center">
      <h3 class="display-6 fw-bold">News & Events</h3>
    </div>
    
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 pt-4 pb-0">
      <?php foreach ($blog_feed as $key => $post) { ?>
        <div class="col">
          <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?php echo $post['post_image']?>');">
            <div class="card-overlay"></div>
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 zi-2">
              <a href="<?php echo "/post/view/" . $post['title_seo'] ?>"><h2 class="pt-5 mt-5 mb-4 lh-1 fw-bold"><?php echo $post['title']?></h2></a>
              <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                  <img src="/img/favico.png" alt="PH" width="32" height="32" class="rounded-circle border border-white" loading="lazy">
                </li>
                <li class="d-flex align-items-center me-3">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                  <small><?php echo $post["category_name"] ?></small>
                </li>
                <li class="d-flex align-items-center">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                  <small><?php echo timeAgo($post['updated_on'])?></small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-12 text-center pt-4">
        <a href="/blog">View All</a>
      </div>
    </div>
</div>
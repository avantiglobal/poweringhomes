 <!-- FOOTER -->
 <footer class="container p-3 py-md-5">
  <div class="row">
    <div class="col-12 col-md-12  col-lg-3 mb-3 text-center">
      <img src="/img/poweringhomes-logo-alt.png" alt="Powering Homes" loading="lazy" class="img-fluid">
      <small class="d-block mb-3 text-muted">&copy; <?php echo date('Y'); ?> <?php echo Application::getConfig('company.name') ?>  - All Rights Reserved. </small>
    </div>
    <div class="col-6 col-lg-3 ps-md-5">
      <h5>Members</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="/login">Login</a></li>
        <li><a class="link-secondary" href="/user/signup">Sign Up</a></li>
      </ul>
    </div>
    <div class="col-6 col-lg-3 ps-md-3">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="/blog">Blog</a></li>
        <li><a class="link-secondary" href="/faqs">FAQs</a></li>
      </ul>
    </div>
    <div class="col-6 col-lg-3 ps-md-3">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="/areas-served">Areas Served</a></li>
        <li><a class="link-secondary" href="/privacy">Privacy</a></li>
        <li><a class="link-secondary" href="#">Terms</a></li>
        <li><a class="link-secondary" href="/contact">Contact</a></li>
      </ul>
    </div>
  </div>
  <!-- Modal -->
  <?php includeTpl('/partial/_modal_quote') ?>
</footer>
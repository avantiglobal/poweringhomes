<main>
  <!-- Header Template -->
  <?php include_once(TEMPLATE_PATH . '/partials/_top_menu.php')  ?>
  <section id="dashboard">
    <div class="container flex-margin">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <div class="card bg-danger mb-4 text-white">
            <div class="card-body">
              <div class="d-flex row">
                <div class="col-3 align-self-center">
                  <i class="bi-envelope bi-2x pr-2"></i>
                </div>
                <div class="col-8 ml-auto align-self-center">
                  <div class="float-right">
                    <h5 class="mt-0 round-inner text-center"><?php echo $messages_total ?></h5>
                    <p class="mb-0">Messages today</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <a href="/post/list" >
            <div class="card bg-info mb-4 text-white">
              <div class="card-body">
                <div class="d-flex row">
                  <div class="col-3 align-self-center">
                    <i class="bi-newspaper bi-2x pr-2"></i>
                  </div>
                  <div class="col-8 ml-auto align-self-center">
                    <div class="float-right">
                      <h5 class="mt-0 round-inner text-center">123</h5>
                      <p class="mb-0">Post comments</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <div class="card bg-success mb-4 text-white">
            <div class="card-body">
              <div class="d-flex row">
                <div class="col-3 align-self-center">
                  <i class="bi-person-plus bi-2x pr-2"></i>
                </div>
                <div class="col-8 ml-auto align-self-center">
                  <div class="float-right">
                    <h5 class="mt-0 round-inner text-center">123</h5>
                    <p class="mb-0">Join requests</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <div class="card bg-primary mb-4 text-white">
            <div class="card-body">
              <div class="d-flex row">
                <div class="col-3 align-self-center">
                  <i class="bi-eye bi-2x pr-2"></i>
                </div>
                <div class="col-8 ml-auto align-self-center">
                  <div class="float-right">
                    <h5 class="mt-0 round-inner text-center">&nbsp;</h5>
                    <p class="mb-0">Check insights</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
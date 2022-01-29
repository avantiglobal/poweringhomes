<div class="home-hero" style="background: url(/img/site/american-public-power-association-513dBrMJ_5w-unsplash.jpg); background-position: center; background-size:cover;">
  <div class="home-hero__video-overlay">&nbsp;</div>
  <div class="home-hero__content-wrapper">
    <div class="container">
    <div class="row text-white align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 mb-3">Cut your electricity costs and lower your carbon footprint</h1>
          <p class="col-lg-10 fs-4">Powering Homes delivers home energy solutions that save you money. We provide a solution to low cost, clean, reliable energy your family can depend on.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-4">
          <form method="post" class="zipcode-checker-form p-4 p-md-5 border rounded-3 bg-light text-dark" name="zipcode-checker-form__banner">
            <h4>Take your power back</h4>
            <p class="text-muted">
              Enter your zip code to see why <?php echo Application::getConfig('company.name') ?> is the best solution for home solar.
            </p>
            <div class="row">
              <div class="col-12 m-auto">

              <div class="form-floating mb-3">
                <input type="text" class="form-control zipcode-checker-input" name="zipcode-checker-form__banner__input" id="zipcode-checker-form__banner__input" placeholder="Zip Code" maxlength="5">
                <label for="zipcode-checker-input3">Zip Code</label>
              </div>
              <div class="text-danger d-none p-0 pb-2 text-center" id="zipcode-checker-form__banner__form-error">&nbsp;</div>
              <button class="w-100 btn btn-lg btn-secondary" type="submit">Get Started</button>



              </div>
            </div>
            <input type="hidden" class="zipcode_identifier" value="zipcode-checker-input3">
            <input type="hidden" name="apiURL" id="apiURL" value="<?php echo (getenv('REMOTE_ADDR') == '127.0.0.1') ? Application::getConfig('development.api.url') : Application::getConfig('production.api.url') ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
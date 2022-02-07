<div class="cta bg-secondary">
    <div class="container text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h2 class="display-5 fw-bold text-white">¿Quieres saber si califica?</h2>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Averigüe si su código postal se encuentra dentro de nuestras áreas de servicio.</p>
                <form class="zipcode-checker-form" name="zipcode-checker-form__cta">
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" type="search" name="s" id="zipcode-checker-form__cta__input" title="ZIP Code" placeholder="ZIP Code" required maxlength="5">
                            <label for="floatingName">Código Postal</label>
                        </div>
                        <div class="form-floating mb-3">
                            <button class="btn btn-primary py-3" type="submit" title="Search" id="zipcode-checker-btn" aria-label="Search">CONSULTAR AHORRO</button>
                        </div>
                    </div>
                    <div class="alert-danger d-none p-3" id="zipcode-checker-form__cta__form-error">&nbsp;</div>
                    <input type="hidden" name="apiURL" id="apiURL" value="<?php echo (getenv('REMOTE_ADDR') == '127.0.0.1') ? Application::getConfig('development.api.url') : Application::getConfig('production.api.url') ?>">
                </form>
            </div>
        </div>
    </div>
</div>
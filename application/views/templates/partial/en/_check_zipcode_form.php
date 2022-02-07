<form class="zipcode-checker-form" name="zipcode-checker-form__header">
    <div class="d-flex flex-row">
        <input class="form-control me-2" id="zipcode-checker-form__header__input" type="search" placeholder="ZIP Code" aria-label="ZIP Code" maxlength="5" required>
        <button class="btn btn-primary btn-primary--130" type="submit">Get Quote</button>
        <input type="hidden" name="apiURL" id="apiURL" value="<?php echo (getenv('REMOTE_ADDR') == '127.0.0.1') ? Application::getConfig('development.api.url') : Application::getConfig('production.api.url') ?>">
    </div>
    <div class="text-danger d-none p-0 pt-2 text-center" id="zipcode-checker-form__header__form-error" style="font-size:.75rem;">&nbsp;</div>
</form>
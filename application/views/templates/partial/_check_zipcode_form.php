<form class="zipcode-checker-form d-flex">
    <input class="form-control me-2" id="zipcode-checker-input2" type="search" placeholder="ZIP Code" aria-label="ZIP Code" maxlength="5" required>
    <button class="btn btn-primary btn-primary--130" type="submit">Get Quote</button>
    <input type="hidden" name="apiURL" id="apiURL" value="<?php echo (getenv('REMOTE_ADDR') == '127.0.0.1') ? Application::getConfig('development.api.url') : Application::getConfig('production.api.url') ?>">
    <div class="alert-danger d-none p-3" id="zipcode-form-error2">&nbsp;</div>
</form>
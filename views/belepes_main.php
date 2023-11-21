<h2>Regisztráció</h2>

<?php if (isset($viewData['successful_registration'])): ?>
    <div>Sikeres regisztráció.</div>
<?php endif; ?>

<form action="<?php echo SITE_ROOT . 'belepes'; ?>" method="POST">
    <input type="hidden" name="form_type" value="registration">
    <div class="form-field">
        <label for="csaladi_nev">Családi név</label>
        <input required type="text" id="csaladi_nev" name="csaladi_nev" <?php if ($viewData['form_type'] == 'registration' && !empty($viewData['validation_errors'])) display_previous_value('csaladi_nev'); ?>>
        <?php if ($viewData['form_type'] == 'registration') display_validation_error($viewData['validation_errors'], 'csaladi_nev'); ?>
    </div>
    <div class="form-field">
        <label for="utonev">Utónév</label>
        <input required type="text" id="utonev" name="utonev" <?php if ($viewData['form_type'] == 'registration' && !empty($viewData['validation_errors'])) display_previous_value('utonev'); ?>>
        <?php if ($viewData['form_type'] == 'registration') display_validation_error($viewData['validation_errors'], 'utonev'); ?>
    </div>
    <div class="form-field">
        <label for="bejelentkezes">Bejelentkezési név</label>
        <input required type="text" id="bejelentkezes" name="bejelentkezes" <?php if ($viewData['form_type'] == 'registration' && !empty($viewData['validation_errors'])) display_previous_value('bejelentkezes'); ?>>
        <?php if ($viewData['form_type'] == 'registration') display_validation_error($viewData['validation_errors'], 'bejelentkezes'); ?>
    </div>
    <div class="form-field">
        <label for="jelszo">Jelszó</label>
        <input required type="password" id="jelszo" name="jelszo">
        <?php if ($viewData['form_type'] == 'registration') display_validation_error($viewData['validation_errors'], 'jelszo'); ?>
    </div>
    <div class="form-field">
        <label for="jelszo_ujra">Jelszó újra</label>
        <input required type="password" id="jelszo_ujra" name="jelszo_ujra">
    </div>
    <div class="form-field d-flex justify-content-center">
        <button type="submit">Regisztráció</button>
    </div>
</form>

<h2>Bejelentkezés</h2>

<form action="<?php echo SITE_ROOT . 'belepes'; ?>" method="POST">
    <input type="hidden" name="form_type" value="login">
    <div class="form-field">
        <label for="bejelentkezes">Bejelentkezési név</label>
        <input required type="text" id="bejelentkezes" name="bejelentkezes" <?php if ($viewData['form_type'] == 'login' && !empty($viewData['validation_errors'])) display_previous_value('bejelentkezes'); ?>>
        <?php if ($viewData['form_type'] == 'login') display_validation_error($viewData['validation_errors'], 'bejelentkezes'); ?>
    </div>
    <div class="form-field">
        <label for="jelszo">Jelszó</label>
        <input required type="password" id="jelszo" name="jelszo">
        <?php if ($viewData['form_type'] == 'login') display_validation_error($viewData['validation_errors'], 'jelszo'); ?>
    </div>
    <div class="form-field d-flex justify-content-center">
        <button type="submit">Bejelentkezés</button>
    </div>
</form>
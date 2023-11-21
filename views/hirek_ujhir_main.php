<h2>Új hír létrehozása</h2>

<form action="<?php echo SITE_ROOT . 'hirek_ujhir' ?>" method="POST">
    <div class="form-field">
        <label for="cim">Cím</label>
        <input type="text" name="cim" id="cim" <?php display_previous_value('cim'); ?>>
        <?php display_validation_error($viewData['validation_errors'], 'cim'); ?>
    </div>

    <div class="form-field">
        <label for="tartalom">Tartalom</label>
        <textarea name="tartalom" rows="30" cols="50" id="tartalom" ><?php display_previous_value('tartalom', true); ?></textarea>
        <?php display_validation_error($viewData['validation_errors'], 'tartalom'); ?>
    </div>

    <div class="form-field d-flex justify-content-center">
        <button type="submit">Létrehozás</button>
    </div>
</form>

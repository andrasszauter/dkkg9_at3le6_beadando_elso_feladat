<h1>Új vélemény írása</h1>

<form action="<?php echo SITE_ROOT . 'hirek_ujvelemeny/' . $viewData['hir_id']; ?>" method="POST">
    <div class="form-field">
        <label for="tartalom">Tartalom</label>
        <textarea name="tartalom" rows="15" cols="50" id="tartalom" ><?php display_previous_value('tartalom', true); ?></textarea>
        <?php display_validation_error($viewData['validation_errors'], 'tartalom'); ?>
    </div>
    <div class="form-field d-flex justify-content-center">
        <button type="submit">Beküldés</button>
    </div>
</form>
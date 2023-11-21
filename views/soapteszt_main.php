<h1>Soap teszt</h1>

<form action="<?php echo SITE_ROOT; ?>/soapteszt" method="POST">
    <div class="form-field">
        <label for="ev">Év</label>
        <input required type="number" id="ev" name="ev" min="1988" max="2013" value="<?php echo $viewData['ev']; ?>">
    </div>

    <div class="form-field">
        <label for="het">Hét</label>
        <input required type="number" id="het" name="het" min="1" max="53" value="<?php echo $viewData['het']; ?>">
    </div>

    <div class="form-field d-flex justify-content-center">
        <button type="submit">Küldés</button>
    </div>
</form>
<?php if (!empty($viewData['result'])): ?>
<p>SOAP válasz:</p>
<pre>
<?php print_r($viewData['result']); ?>
</pre>
<?php endif; ?>

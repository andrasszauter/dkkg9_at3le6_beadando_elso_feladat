<h1>MNB árfolyam keresés</h1>

<form action="<?php echo SITE_ROOT; ?>mnb_arfolyamkeres" method="POST">
    <div class="form-field">
        <label for="datum">Dátum</label>
        <input required type="text" id="datum" name="datum" data-min="<?php echo $viewData['startDate']; ?>" data-max="<?php echo $viewData['endDate']; ?>" data-value="<?php echo $viewData['datum']; ?>">
    </div>
    <div class="form-field">
        <label for="deviza1">Kiinduló deviza</label>
        <select required id="deviza1" name="deviza1" disabled>
            <?php foreach ($viewData['devizak'] as $d): ?>
                <option value="<?php echo $d; ?>" <?php echo $d == $viewData['deviza1'] ? 'selected' : ''; ?>><?php echo $d; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-field">
        <label for="deviza2">Cél deviza</label>
        <select required id="deviza2" name="deviza2">
            <?php foreach ($viewData['devizak'] as $d): ?>
                <option value="<?php echo $d; ?>" <?php echo $d == $viewData['deviza2'] ? 'selected' : ''; ?>><?php echo $d; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-field d-flex justify-content-center">
        <button type="submit">Küldés</button>
    </div>
</form>

<div class="d-flex justify-content-center">
<?php if (isset($viewData['result'])): ?>
    <div>Keresés eredménye:&nbsp;</div>
    <?php echo $viewData['result']['rate']; ?>
<?php else: ?>
    <div>Nincs eredménye a keresésnek.</div>
<?php endif; ?>
</div>
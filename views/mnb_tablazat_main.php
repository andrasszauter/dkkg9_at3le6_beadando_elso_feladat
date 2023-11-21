<h1>MNB táblázat</h1>

<form action="<?php echo SITE_ROOT; ?>mnb_tablazat" method="POST">
    <div class="form-field">
        <label for="datum">Dátum</label>
        <input required type="text" id="datum" name="datum" data-min="<?php echo $viewData['startDate']; ?>" data-max="<?php echo $viewData['endDate']; ?>" data-value="<?php echo date('Y-m-d', strtotime($viewData['datum'])); ?>">
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

<?php if (!empty($viewData['result'])): ?>
    <table>
        <thead>
        <tr>
            <th>Dátum</th>
            <th>Árfolyam</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($viewData['result'] as $item): ?>
                <tr>
                    <td><?php echo $item['date']; ?></td>
                    <td><?php echo $item['rate']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <canvas id="mnb_chart"></canvas>
    <script>
        var chartData = <?php echo json_encode($viewData['result']); ?>;
    </script>
<?php endif; ?>

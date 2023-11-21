<h1><?php echo htmlspecialchars($viewData['hir']['cim']); ?></h1>
<p><?php echo htmlspecialchars($viewData['hir']['tartalom']); ?></p>
<p><strong>Létrehozás időpontja:</strong> <?php echo htmlspecialchars($viewData['hir']['letrehozas_idopontja']); ?></p>
<p><strong>Létrehozta:</strong> <?php echo htmlspecialchars($viewData['hir']['bejelentkezes']); ?></p>

<div class="d-flex justify-content-center">
<a class="btn" href="<?php echo SITE_ROOT . 'hirek_ujvelemeny/' . $viewData['hir']['id']; ?>">Új vélemény írása</a>
</div>

<?php if (count($viewData['velemenyek']) > 0): ?>
<?php foreach ($viewData['velemenyek'] as $velemeny): ?>
    <div style="margin-top: 20px;">
        <p><?php echo $velemeny['tartalom']; ?></p>
        <p><strong>Létrehozás időpontja:</strong> <?php echo htmlspecialchars($velemeny['letrehozas_idopontja']); ?></p>
        <p><strong>Létrehozta: </strong><?php echo htmlspecialchars($velemeny['bejelentkezes']); ?></p>
    </div>
    <hr>
<?php endforeach; ?>
<?php endif; ?>

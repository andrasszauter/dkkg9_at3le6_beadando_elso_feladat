<h2>Hírek</h2>

<table>
        <thead>
            <tr>
                <th>Cím</th>
                <th>Létrehozás időpontja</th>
                <th>Bejelentkezés</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewData['hirek'] as $hir): ?>
                <tr>
                    <td>
                        <a href="<?php echo SITE_ROOT . 'hirek/' . $hir['id']; ?>">
                            <?php echo htmlspecialchars($hir['cim']); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($hir['letrehozas_idopontja']); ?></td>
                    <td><?php echo htmlspecialchars($hir['bejelentkezes']); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>





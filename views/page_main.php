<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hatos Lottó</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/pickadate/classic.css">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/pickadate/classic.date.css">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
    </head>
    <body>
        <nav>
            <div id="menu">
                <?php echo Menu::getMenu($viewData['selectedItems'] ?? array('', '')); ?>
            </div>
            <?php
            if (bejelentkezve()) {
                echo '<div id="login-info">Bejelentkezve: ';
                echo bejelentkezesi_nev();
                echo '</div>';
            }
            ?>
        </nav>
        <section>
            <?php if (isset($viewData['render'])) include($viewData['render']); ?>
        </section>
        <footer>&copy; Hatos Lottó - NJE - GAMF <?php echo date("Y") ?></footer>
        <script src="<?php echo SITE_ROOT?>js/jquery-3.7.1.min.js"></script>
        <script src="<?php echo SITE_ROOT?>js/pickadate/picker.js"></script>
        <script src="<?php echo SITE_ROOT?>js/pickadate/picker.date.js"></script>
        <script src="<?php echo SITE_ROOT?>js/pickadate/translations/hu_HU.js"></script>
        <script src="<?php echo SITE_ROOT?>js/main.js"></script>
        <?php echo $viewData['js'] ?? "" ?>
    </body>
</html>
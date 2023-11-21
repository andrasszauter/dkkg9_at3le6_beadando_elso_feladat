<?php
    function display_validation_error($array, $key)
    {
        if (isset($array[$key]))
            echo '<div class="validation-error">' . $array[$key] . '</div>';
        else
            return '';
    }

    function display_previous_value($key, $raw = false)
    {
        if (!isset($_POST[$key])) {
            return;
        }

        if ($raw == false) {
            echo 'value="';

            if (isset($_POST[$key]))
                echo htmlspecialchars($_POST[$key]);

            echo '"';
        } else {
            echo htmlspecialchars($_POST[$key]);
        }
    }
?>
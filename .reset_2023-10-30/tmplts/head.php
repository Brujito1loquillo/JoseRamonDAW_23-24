<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>José-Ramón Pérez Ribelles</title>

    <!-- STYLES -->
    <?php
        foreach ($this->styles as $style) {
            if (file_exists("styles/$style.css")) {
                echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/$style.css\" />";
            }
        }
    ?>
</head>
<body>

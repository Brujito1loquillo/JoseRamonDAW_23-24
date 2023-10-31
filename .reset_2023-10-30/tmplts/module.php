<main>
    <?php
        foreach($this->practicas as $practica) {
            echo "<div>
                    <h2>$practica</h2>
                    <a href=\"/?" .
                        substr(get_class($this), 0, strpos(get_class($this), "View")) .
                        "/show/$practica\">
                            $practica
                    </a>
                </div>";
        }
    ?>
</main>
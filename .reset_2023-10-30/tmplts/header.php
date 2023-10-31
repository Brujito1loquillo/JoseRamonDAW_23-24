<header>
    <h1>
        <a href="/">José-Ramón Pérez Ribelles</a>
    </h1>

    <nav>
        <ul>
            <?php
                foreach ($this->menu as $menuElement) {
                    echo "<a href=\"/?$menuElement\">$menuElement</a>";
                }
            ?>
        </ul>
    </nav>
</header>

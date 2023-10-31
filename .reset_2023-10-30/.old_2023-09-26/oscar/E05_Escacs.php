<!DOCTYPE html>
<html>
<head>
    <!-- style>
        td {
            width: 33px;
            height: 33px;
        }

        .white {
            background-color: white;
        }

        .black {
            background-color: black;
        }
    </style -->
    <style>
        table, tr {
            width: 100%;
        }

        td {
            aspect-ratio: 1 / 1;
        }

        .white {
            background-color: white;
        }

        .black {
            background-color: black;
        }
    </style>
</head>
<body>
    <table>
        <?php
        $tamano = 8;

        for ($fila = 1; $fila <= $tamano; $fila ++) {
            echo "<tr>";
            for ($columna = 1; $columna <= $tamano; $columna ++) {
                echo "<td ";
                if (($columna + $fila) % 2 === 0)
                    echo "class=\"white\"";
                else
                    echo "class=\"black\"";
                echo "></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
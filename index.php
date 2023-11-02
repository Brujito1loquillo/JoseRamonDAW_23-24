<html>
<head>
    <title>José-Ramón Pérez Ribelles</title>
    <meta charset="UTF-8" />
</head>

<body>
    <?php
    ini_set("display_errors", 1);


    echo "<h1>José-Ramón Pérez Ribelles</h1>";

    echo "<h2>E02 Arrodonir</h2>";

    $num = 3.14159265359;

    function arrodonir (float $num, int $decimals) {
        $num *= pow(10, $decimals);
        
        /*
        if ( ($num - (int) $num) >= 0.5 ) {
            $num = (int) $num;
            $num ++;
        } else $num = (int) $num;
        */

        if ( ($num - (int) $num) >= 0.5 ) $num ++;

        $num = (int) $num;

        $num /= pow(10, $decimals);
        return $num;
    }

    echo $num . "<br />";
    echo arrodonir($num, 2) . "<br />";
    echo arrodonir($num, 3) . "<br />";
    echo arrodonir($num, 4) . "<br />";
    echo arrodonir($num, 5) . "<br />";

    echo "<h2>E03 Mates</h2>";

    $a = 2; $b = 3; $c = 1;

    function segonGrau (int $a, int $b, int $c) {
        // echo "f(x) = {$a}x<sup>2</sup> + {$b}x + $c = 0 <br />";
        $form = "f(x) = {$a}x<sup>2</sup> ";
        
        if ($b >= 0) $form .= "+{$b}x ";
        else $form .= "{$b}x ";
        
        if ($c >= 0) $form .= "+$c = 0 <br />";
        else $form .= "$c = 0 <br />";

        echo $form;


        //            ________
        //      -b ± √b² + 4ac
        // x = ----------------
        //           2a

        $part1 = $b * -1;
        // echo $part1; die();
        $part2sqrt = (pow($b, 2)) + (4 * $a * $c);
        // echo $part2sqrt; die();
        $part3 = $a * 2;
        // echo $part3; die();

        if ($part2sqrt < 0) {
            return "No hi ha resultat entre els ℝeals";
        } else if ($part2sqrt === 0) {
            return "Hi ha una sola solució: " . arrodonir(($part1 / $part3), 3);
        } else {
            $part2 = sqrt($part2sqrt);
            // echo $part2; die();
            // echo "R1: " . (($part1 + $part2) / $part3); echo "<br />";
            // echo "R2: " . (($part1 - $part2) / $part3); echo "<br />";

            return "Hi ha dos solucions: " . arrodonir((($part1 + $part2) / $part3), 3) . " i " . arrodonir((($part1 - $part2) / $part3), 3);
        }
    }

    echo segonGrau($a, $b, $c) . "<br />";

    $a = 1; $b = 2; $c = -1;

    echo segonGrau($a, $b, $c) . "<br />";

    $a = 1; $b = 2; $c = -2;

    echo segonGrau($a, $b, $c) . "<br />";

    echo "<h2>E04 Calcula l'edat</h2>";

    $any = 2000;
    $mes = 5;
    $dia = 13;

    function calculaEdat (int $any, int $mes, int $dia) {
        if ($mes > 12 || $mes < 1) return "El mes es incorrecte";
        if ($dia > 31 || $dia < 1) return "El dia es incorrecte";
        $mesos30 = [4, 6, 9, 11];
        if ($dia > 30 && in_array($mes, $mesos30)) return "El dia es incorrecte per aquest mes";
        if ($dia > 28 && date("L", strtotime("$any-01-01")) === 0) return "El dia es incorrecte par equest mes i any";

        $actualAny = date("Y");
        $actualMes = date("n");
        $actualDia = date("j");

        $edat = $actualAny - $any;

        /*
        if ($mes < $actualMes) $edat --;
        if ($mes === $actualMes && $dia < $actualDia) $edat --;
        */

        if (($mes < $actualMes) || ($mes === $actualMes && $dia < $actualDia)) $edat --;

        return "Te $edat anys <br/>";
    }

    echo calculaEdat($any, $mes, $dia);

    $any = 2000; $mes = 10; $dia = 30;
    echo calculaEdat($any, $mes, $dia);


    echo "<h2>E05 Escacs</h2>";

    $tamany = 13;

    function escacs (int $tamany = null) {
        if (is_null($tamany)) $tamany = 8;

        $return = "<table style=\"border-collapse: collapse; border: 1px solid black\">";

        for ($i = 0; $i < $tamany; $i ++) {
            $return .= "<tr>";

            for ($j = 0; $j < $tamany; $j ++) {
                $return .= "<td style=\"width: 15px; height: 15px; color: ";

                if (($j + $i) % 2 === 0) $return .= "white; background-color: white;\">";
                else $return .= "black; background-color: black\">";

                $return .= "x</td>";
            }

            $return .= "</tr>";
        }

        $return .= "</table>";

        return $return;
    }

    echo escacs();

    echo "<br />";

    echo escacs($tamany);

    $tamany = 20; echo "<br />";
    echo escacs($tamany);

    echo "<h2>E06 Punts de la brisca </h2>";

    function agafarCartes (int $quantitat = null) {
        if (is_null($quantitat)) $quantitat = 10;

        $cartes = [];

        $cartes["bastons"] = []; $cartes["ors"] = []; $cartes["espases"] = []; $cartes["copes"] = [];

        foreach (array_keys($cartes) as $pal) {
            $cartes[$pal]["as"] = 11;
            $cartes[$pal]["tres"] = 10;
            $cartes[$pal]["rei"] = 4;
            $cartes[$pal]["cavall"] = 3;
            $cartes[$pal]["sota"] = 2;

            $cartes[$pal]["2"] = 0;

            for ($i = 4; $i <= 9; $i ++) {
                $cartes[$pal]["$i"] = 0;
            }
        }
        // var_dump($cartes);

        $ma = [];

        // var_dump($cartes[$pals[rand(0,count($pals))]]);

        $countCartes = 0;
        while ( $countCartes < 10) {
            $pals = array_keys($cartes);
            
            $palKey = rand(0, count($pals) - 1);

            $pal = $pals[$palKey];

            $cartesPal = array_keys($cartes[$pal]);
            // var_dump($cartesPal); die();
            
            $cartaKey = rand(0, count($cartesPal) - 1);
            $carta = $cartesPal[$cartaKey];


            $ma[$pal][$carta] = $cartes[$pal][$carta];
            unset($cartes[$pal][$carta]);
            
            echo "<div style=\"display:grid; grid-template-columns: repeat(4, 25%); "/*background-color: grey; */ . "border: 1px solid black;\">";
                echo "<div>";
                    echo "<h3>Bastons</h3>";
                    if (isset($ma["bastons"])) var_dump($ma["bastons"]);
                echo "</div>";

                echo "<div>";
                    echo "<h3>Ors</h3>";
                    if (isset($ma["ors"])) var_dump($ma["ors"]);
                echo "</div>";

                echo "<div>";
                    echo "<h3>Espases</h3>";
                    if (isset($ma["espases"])) var_dump($ma["espases"]);
                echo "</div>";

                echo "<div>";
                    echo "<h3>Copes</h3>";
                    if (isset($ma["copes"])) var_dump($ma["copes"]);
                echo "</div>";

                echo "<div style=\"grid-columns: 4\">";
                    echo "<h3>Total de cartes:</h3>";
                    echo ++$countCartes;
                echo "</div>";
            echo "</div>";
        }

        // return $ma;
        $punts = 0;

        foreach ($ma as $nomPal => $pal) {
            foreach ($pal as $carta => $puntuacio) {
                echo "$carta de $nomPal suma $puntuacio punts. <br/>";
                $punts += $puntuacio;
            }
        }

        return $punts;
    }

    echo "Total de punts: " . agafarCartes();

    echo "<h2>E07 Arrays Iguals</h2>";
    
    function equalArrays (array $p1, array $p2) {
        $res = true;

        if (count($p1) <> count($p2)) {
            $res = false;
        } else {
            $kp1 = array_keys($p1);
            $kp2 = array_keys($p2);

            foreach ($kp1 as $key) {
                if (!in_array($key, $kp2)) {
                    $res = false;
                }
            }

            if ($res) {
                foreach ($p1 as $key => $val) {
                    if ($p2[$key] <> $val) {
                        $res = false;
                    }
                }
            }
        }

        return $res;
    }

    // PROVA 1

    $array1 = [
        "a" => 0,
        "b" => 1,
        "c" => 2
    ];

    $array2 = [
        "a" => 0,
        "b" => 1,
        "c" => 2
    ];

    $sonIguals = (equalArrays($array1, $array2)) ? "iguals" : "diferents";
    echo "Els arrays 1 y 2 son $sonIguals <br />";

    // PROVA 2

    $array1 = [
        "a" => 0,
        "b" => 1,
        "c" => 2
    ];

    $array2 = [
        "a" => 0,
        "b" => 1,
        "d" => 2
    ];

    $sonIguals = (equalArrays($array1, $array2)) ? "iguals" : "diferents";
    echo "Els arrays 1 y 2 son $sonIguals <br />";

    // PROVA 3

    $array1 = [
        "a" => 0,
        "b" => 2,
        "c" => 1
    ];

    $array2 = [
        "a" => 0,
        "b" => 1,
        "c" => 2
    ];

    $sonIguals = (equalArrays($array1, $array2)) ? "iguals" : "diferents";
    echo "Els arrays 1 y 2 son $sonIguals <br />";

    // PROVA 4

    $array1 = [
        "a" => 0,
        "b" => 1,
        "c" => 2
    ];

    $array2 = [
        "a" => 0,
        "c" => 2,
        "b" => 1
    ];

    $sonIguals = (equalArrays($array1, $array2)) ? "iguals" : "diferents";
    echo "Els arrays 1 y 2 son $sonIguals <br />";

    echo "<h2>E08 Buscar una cadena</h2>";

    function inString (String $text, String $cadena) {
        // Retorna el numero de vegades que apareix la cadena al text
        $arrayFromText = str_split($text);
        $arrayFromCadena = str_split($cadena);

        $comparing = false;
        $caracterActual = -1;

        $aparicions = 0;

        foreach ($arrayFromText as $caracter) {
            if ($caracter === $arrayFromCadena[0] && $comparing === false) {
                $comparing = true;
                $caracterActual = 0;
            }

            if ($comparing) {
                if ($caracter === $arrayFromCadena[$caracterActual]) {
                    $caracterActual ++;
                } else {
                    $comparing = false;
                    $caracterActual = -1;
                }
            }

            if ($comparing && $caracterActual === count($arrayFromCadena)) {
                $comparing = false;
                $caracterActual = -1;

                $aparicions++;
            }
        }

        return $aparicions;
    }

    $text = "acava d'acavar l'acampada";
    $cadena1 = "ava";
    $cadena2 = "aca";
    $cadena3 = "a";
    $cadena4 = $text;
    $cadena5 = "z";

    echo $text . "<hr />";

    echo "La cadena: $cadena1 apareix " . inString($text, $cadena1) . " cops <br />";
    echo "La cadena: $cadena2 apareix " . inString($text, $cadena2) . " cops <br />";
    echo "La cadena: $cadena3 apareix " . inString($text, $cadena3) . " cops <br />";
    echo "La cadena: $cadena4 apareix " . inString($text, $cadena4) . " cops <br />";
    echo "La cadena: $cadena5 apareix " . inString($text, $cadena5) . " cops <br />";

    echo "<hr />";

    function primeraAparicio (String $text, String $cadena) {
        $arrayFromText = str_split($text);
        $arrayFromCadena = str_split($cadena);

        $comparing = false;
        $caracterActual = -1;

        $primeraAparicio = false;
        $founded = false;

        foreach ($arrayFromText as $keyCaracter => $caracter) {
            if ($caracter === $arrayFromCadena[0] && $comparing === false && !$founded) {
                $comparing = true;
                $caracterActual = 0;
                
                $primeraAparicio = $keyCaracter;
            }

            if ($comparing) {
                if ($caracter === $arrayFromCadena[$caracterActual]) {
                    $caracterActual ++;
                } else {
                    $comparing = false;
                    $caracterActual = -1;

                    $primeraAparicio = false;
                }
            }

            if ($comparing && $caracterActual === count($arrayFromCadena)) {
                $comparing = false;

                $founded = true;
            }
        }

        return $primeraAparicio;
    }

    /*
    echo "El primer cop que apareix la cadena: $cadena1 es a la posició: " . primeraAparicio($text, $cadena1) . "<br />";
    echo "El primer cop que apareix la cadena: $cadena2 es a la posició: " . primeraAparicio($text, $cadena2) . "<br />";
    echo "El primer cop que apareix la cadena: $cadena3 es a la posició: " . primeraAparicio($text, $cadena3) . "<br />";
    echo "El primer cop que apareix la cadena: $cadena4 es a la posició: " . primeraAparicio($text, $cadena4) . "<br />";
    echo "El primer cop que apareix la cadena: $cadena5 es a la posició: " . primeraAparicio($text, $cadena5) . "<br />";
    */

    echo "El primer cop que apareix la cadena: <b>$cadena1</b> es a la posicio: "; var_dump(primeraAparicio($text, $cadena1)); echo "<br />";
    echo "El primer cop que apareix la cadena: <b>$cadena2</b> es a la posicio: "; var_dump(primeraAparicio($text, $cadena2)); echo "<br />";
    echo "El primer cop que apareix la cadena: <b>$cadena3</b> es a la posicio: "; var_dump(primeraAparicio($text, $cadena3)); echo "<br />";
    echo "El primer cop que apareix la cadena: <b>$cadena4</b> es a la posicio: "; var_dump(primeraAparicio($text, $cadena4)); echo "<br />";
    echo "El primer cop que apareix la cadena: <b>$cadena5</b> es a la posicio: "; var_dump(primeraAparicio($text, $cadena5)); echo "<br />";

    echo "<h2>E09 dataVerifier() - Funció verificadora d'una data de naixement</h2>";
    
    function dataVerifier (String $data) {
        $valid  = true;
        
        $dataValues = explode("/", $data);
        
        $dia = $dataValues[0]; $mes = $dataValues[1]; $any =  $dataValues[2];

        // $mesos31 = [1,3,5,7,8,10,12];
        $mesos30 = [4,6,9,11];

        if ($any < 1900 || $any > date("Y") || $mes <= 0 || $mes > 12 || $dia <= 0 || $dia > 31 || ($mes === 2 && $dia >= 29 && date("L", strtotime("$any-01-01")) === 0) || ($mes === 2 && $dia > 29) || $dia > 31 || ($dia > 30 && in_array($mes, $mesos30))) {
            $valid = false;
        }

        return $valid;
    }

    $data1 = "13/05/2000";

    echo "Data valida (<b>$data1</b>)? "; var_dump(dataVerifier($data1)); echo "<br />";
    echo "<hr />";
    
    // 01/01/1614   ERROR				
    $data = "01/01/1614";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";
    
    // 01/01/1993	OK
    $data = "01/01/1993";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 01/01/2025	ERROR
    $data = "01/01/2025";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 31/12/1899	ERROR
    $data = "31/12/1899";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";
    
    // 01/01/1900	OK
    $data = "01/01/1900";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";
    
    // today	OK
    $data = date("j/n/Y");
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // Year(DATE)==Year(today)+1 ERROR
    $data = date("j/n");
    $data .= "/" .date("Y") + 1;

    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 01/-3/2020	ERROR
    $data = "01/-3/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 01/04/2020	OK
    $data = "01/04/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 01/18/2020	ERROR
    $data = "01/18/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 01/00/2020	ERROR
    $data = "01/00/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 01/01/2020	OK
    $data = "01/01/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 01/12/2020 Ok
    $data = "01/12/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 01/13/2020	ERROR
    $data = "01/13/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // -2/12/2020	ERROR
    $data = "-2/12/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 06/03/2020	OK
    $data = "06/03/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 40/03/2020	ERROR
    $data = "40/03/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 00/01/2020	ERROR
    $data = "00/01/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 01/01/2020	OK
    $data = "01/01/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 28/04/2020	OK
    $data = "28/04/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 29/02/2019	ERROR
    $data = "29/02/2019";
    echo "<p style=\"color:red\">$data "; var_dump(dataVerifier($data)); echo "valor esperat: False</p><br />";

    // 29/02/2020	OK
    $data = "29/02/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 30/02/2021	ERROR
    $data = "30/02/2021";
    echo "<p style=\"color:red\">$data "; var_dump(dataVerifier($data)); echo "valor esperat: False</p><br />";

    // 30/04/2020	ok
    $data = "30/04/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 31/03/2020	ok
    $data = "31/03/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: Ok<br />";

    // 31/04/2020	ERROR
    $data = "31/04/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    // 32/06/2020	ERROR
    $data = "32/06/2020";
    echo "$data "; var_dump(dataVerifier($data)); echo "valor esperat: False<br />";

    ?>
</body>
</html>

<html>
<head>
  <title>José-Ramón Pérez Ribelles</title>
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

function agafarCartes (int $quantitat = null) {
    if (is_null($quantitat)) $quantitat = 10;

    $baralla = [...$cartes];

    $ma = [];

    while (count($ma) < 10) {
        
    }
}

?>
</body>
</html>
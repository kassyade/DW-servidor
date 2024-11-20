  <?php
// Crea una función que reciba dos números como parámetros,
  //los sume y retorne el resultado. Luego, invoca la función e imprime el resultado. 

$c = 5;
$d = 10;
echo "La suma es " . suma($c, $d);

function suma($a, $b) {
    $x = $a + $b;
    return $x;
}
?>

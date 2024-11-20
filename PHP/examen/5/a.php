<?php 
$numero = $_POST['numero'];
echo("<p>Tabla del numero {$numero}</p>");

for($i=1;$i<=10;$i++){
    $resultado = $i*$numero;
    echo("<p>{$i} x {$numero} ={$resultado}</p>");
};
?>

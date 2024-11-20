<?php 
session_start();
$stock = [
    "Teclados" => 50,
    "Ratones" => 50,
    "Pantallas" => 50,
    "Altavoces" => 50,
    "Led" => 50,
    "Ram" => 50
];
file_put_contents('stock.data', serialize($stock));
header('Location: tienda.php');
exit();
?>

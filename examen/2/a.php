<?php 
$num = $_POST['numero'];
$suma =0 ;
for($i=0;$i<=$num;$i++){

    $suma+=$i ;

}
echo "<p>La suma de los números de 1 a $num es: $suma</p>";

?>
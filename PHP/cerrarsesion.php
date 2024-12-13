<?php 
session_start();
session_destroy();
header("Location: passwd.php");
exit();

?>
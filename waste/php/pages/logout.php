<?php 
//Hiermee word de session van de user vernietigd en word de user uitgelogd
session_start();
session_destroy();
header("location: index.php");


?>
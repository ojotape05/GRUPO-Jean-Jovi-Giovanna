<?php
// Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "usbw";
$bd_name = "bd_comecome";

$connect = mysqli_connect($servername, $username, $password, $bd_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;
?>
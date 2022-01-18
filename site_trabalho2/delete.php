<?php
	// iniciar sessão
	session_start();

	// conexao com bd;
	require_once 'bd_conectar.php';

	// Verificar login
	if(!isset($_SESSION['logado'])):
		header('Location: index.php');
	endif;

	$id_receita = $_GET['id_receita'];
	$sql = "DELETE FROM receita WHERE CodReceita = '$id_receita'";
	$resultado = mysqli_query($connect,$sql);
	
	header("Location: home.php");
?>
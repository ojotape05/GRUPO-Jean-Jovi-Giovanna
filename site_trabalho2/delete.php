<?php
	// iniciar sessão
	session_start();

	// conexao com bd;
	require_once 'bd_conectar.php';

	// Verificar login
	if(!isset($_SESSION['logado'])):
		header('Location: index.php');
	endif;
	
	$id_usuario = $_SESSION['id_usuario'];
	
	if(!empty($_GET['id_receita'])):
		$id_receita = $_GET['id_receita'];
		$sql = "DELETE FROM receita WHERE CodReceita = '$id_receita'";
		$resultado = mysqli_query($connect,$sql);
		
		mysqli_close($connect);
	else:
		header("Location: home.php");
	endif;
	
	header("Location: perfil.php?id_usuario=$id_usuario&meuperfil=1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
	// conexao com bd;
	require_once 'bd_conectar.php';

	// iniciar sessão
	session_start();

	// botao enviar
	if(isset($_POST['cadastrar'])): //chegando se o usuário clicou em Enviar
		$erros = array();
		$login = mysqli_escape_string($connect, $_POST['email']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		
		if(empty($login) or empty($senha)):
			$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
		else:
			$sql = "SELECT email FROM usuario WHERE email = '$login'";
			$resultado = mysqli_query($connect, $sql);
			
			if(mysqli_num_rows($resultado) > 0):
				
				$sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'";
				$resultado = mysqli_query($connect,$sql);
				
				if (mysqli_num_rows($resultado) == 1):
					$dados = mysqli_fetch_array($resultado); //transformando o resultado sql em um array para $dados
					$_SESSION['logado'] = true;
					$_SESSION['id_usuario'] = $dados['id'];
					header('Location: home.php');
				else:
					$erros[] = "<li> Usuário e senha não conferem </li>";
				endif;
				
			else:
				$erros[] = "<li> Usuário inexiste </li>";
			endif;
		endif;
		
	endif;
?>


<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>ComeCome</title>
		<link href="css/style.css" rel="stylesheet">
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Geany 1.37.1" />
	</head>
	<body>
		<div class="header">
			<div class="conteudo">
				<figure><img src="images/comecome.png" alt="logo"></figure>
			</div>
			
		</div>
		
		<div id="login"> 
			<form action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<h1> Login </h1>
				<input type="text" name="email" placeholder="Email">
				<br><br>
				<input type="password" name="senha" placeholder="Senha">
				<br><br>
				<button type="submit" name="cadastrar"> Enviar </button>
			</form>
		
		</div>
		<?php
			if (!empty($erros)):
				foreach($erros as $erro):
					echo $erro;
				endforeach;
			endif;
			?>
	
	</body>
</html>

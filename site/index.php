<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
			<form action= "<?php echo $_SERVER['PHP_SELF']; ?>"method="POST">
				<h1> Login </h1>
				<input type="text" name="nome" placeholder="Nome de Usuário">
				<br><br>
				<input type="password" name="senha" placeholder="Senha">
				<br><br>
				<button type="submit" name="cadastrar"> Enviar </button>
			</div>
		</form>
		
		<?php
		
		?>
		
	</body>
</html>

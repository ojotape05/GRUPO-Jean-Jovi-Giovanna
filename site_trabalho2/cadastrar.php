<?php
include_once 'includes/header.php';
?>

<?php
	// conexao com bd;
	require_once 'bd_conectar.php';
	// iniciar sessão
	session_start();

	if(isset($_POST['cadastrar'])): //chegando se o usuário clicou em Enviar
		$erros = Array();
		$formatosPermitidos = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG");
		$extensao = pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION);

		if(in_array($extensao, $formatosPermitidos)):
			$pasta = "fotosperfil/"; // criando a variavel do caminho para fazer o upload do arqv
			$temporario = $_FILES['imagem']['tmp_name']; //selecionando o nome temporario do arqv;
			$novoNome = uniqid().'.'.$extensao; //transformando o nome do arqv em um nome unico; organização
			
			if(move_uploaded_file($temporario, $pasta.$novoNome)): /*retorna true caso o arqv temporario consiga
			ir para o destino; altera o nome do arquivo*/

				
				$nome =  filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
				$descricao =  filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
				$login = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
				$senha = mysqli_real_escape_string($connect, md5($_POST['senha']));
				
				if(empty($login) or empty($senha) or empty($nome)):
					$erros[] = "<script>alert('Os campos Nome, Login e Senha são obrigatórios');</script>";
				else:
					$sql = "SELECT * FROM usuario WHERE email = '$login'";
					$resultado = mysqli_query($connect, $sql);

					if(mysqli_num_rows($resultado) == 1):
						$erros[] = "<script>alert('O login $login já está cadastrado');</script>";
					else:
						if(empty($descricao)):
							$sql = "INSERT INTO usuario (nome, email,senha,imagem) VALUES ('$nome','$login','$senha','$novoNome')";
							$resultado = mysqli_query($connect,$sql);
							if ($resultado):
								$_SESSION['logado'] = true;
								$_SESSION['id_usuario'] = mysqli_insert_id($connect);
								mysqli_close();
								header('Location: home.php');
							else:
								"<script>alert('Não foi possível inserir as informações ao banco de dados');</script>";
							endif;
						else:
							$sql = "INSERT INTO usuario (nome, email,senha,imagem,sobre) VALUES ('$nome','$login','$senha','$novoNome','$descricao')";
							$resultado = mysqli_query($connect,$sql);
							if ($resultado):
								$_SESSION['logado'] = true;
								$_SESSION['id_usuario'] = mysqli_insert_id($connect);
								mysqli_close();
								header('Location: home.php');
							endif;
						endif;
					endif;
				endif;
			else:
				$erros[] = "<script>alert('Erro de upload de imagem');</script>";
			endif;
		else:
			$erros[] = "<script>alert('Imagem com formato não suportado ou vazia');</script>";
		endif;	

		if(!empty($erros)):
			foreach($erros as $erro):
				echo $erro;
			endforeach;
		endif;

	endif;
?>
	<header>
		<nav class="#fbc02d yellow darken-2" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo left">ComeCome</a>
			  <ul class="right">
				<li><a href="index.php" class="btn-floating #f57f17 yellow darken-4"> <i class= "material-icons"> subdirectory_arrow_right </i> </a> </li>
			  </ul>
			</div>
		</nav>
	</header>
	
	<main>
		<div class="row container">
			<form class="col s12" action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
				
				<h1 align="center"> Cadastro </h1>
				
				<div align="center">
					<img id="fotopreview" class="circle" height="200px" width="200px" src="<?=$foto?>"><br>
					<label> Foto de Perfil </label> <br>
					<input id="uploadfoto" type="file" name="imagem">
				</div>
				
				<script>
					var uploadfoto = document.getElementById('uploadfoto');
					var fotopreview = document.getElementById('fotopreview');

					uploadfoto.addEventListener('change', function(e) { //adiciona o evento "change" no input
						showThumbnail(this.files); //chama a função showThumbnail utilizando os arquivos carregados pelo input
					});

					function showThumbnail(files) { 
						if (files && files[0]) { // se existir algum arquivo
						var reader = new FileReader(); // adiciona a função de leitor à reader

						reader.onload = function (e) { // uma vez que o upload foi carregado
						   fotopreview.src = e.target.result; // troca o src da foto preview para a url do arquiv
						}

						reader.readAsDataURL(files[0]); // lê o caminho do arquivo que foi carregado
						}
					}
				</script>
				
				<div class="row">
					<div class="input-field inline col s6 offset-s3">
						<input placeholder="Nome" name="nome" type="text" class="validate">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field inline col s6 offset-s3">
						<input placeholder="Descrição" name="descricao" type="text" class="validate">
						<span class="helper-text">Uma descrição sobre você</span>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field inline col s6 offset-s3">
						<input placeholder="Email" name="email" type="email" class="validate">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field inline col s6 offset-s3">
					  <input placeholder="Senha" name="senha" type="password" class="validate">
					</div>
				</div>
				
				<button type="submit" name="cadastrar" class="col s6 offset-s3 btn waves-effect #f57f17 yellow darken-4">
				Enviar  <i class="material-icons right">send</i> </button>
			</form>
		</div>
	</main>
		

<?php
include_once 'includes/footer.php';
?>

<?php
include_once 'includes/header.php';

// iniciar sessão
session_start();

// conexao com bd;
require_once 'bd_conectar.php';

// Verificar login
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;


$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE codusu = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_assoc($resultado);


if(!empty( $_GET['id_receita'])):
	$id_receita = $_GET['id_receita'];
	$resultado = mysqli_query($connect,"SELECT * FROM receita WHERE codreceita = '$id_receita'");
	$dados_receita = mysqli_fetch_assoc($resultado);
else:
	header("Location: home.php");
endif;
?>

<body>
	<header>
		<nav class="#fbc02d yellow darken-2" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo left">ComeCome</a>
		  <ul class="right">
			<li><a href="perfil.php?id_usuario=<?php $meuperfil = true; echo $id.'&meuperfil='.$meuperfil;?>" class="btn-floating"> <img class="circle z-depth-2" height='50px' width='50px' src="fotosperfil/<?php echo $dados['imagem']; ?>"> </a> </li>
			<li><a href="logout.php" class="btn-floating #f57f17 yellow darken-4"> <i class= "material-icons"> stop </i> </a> </li>
		  </ul>
		</div>
		</nav>
	</header>
	
	<main>
		<div class="row container z-depth-2">
			<form class="col s12" action="<?php echo $_SERVER['PHP_SELF']."?id_receita=$id_receita"; ?>" method="POST" enctype="multipart/form-data">
				<h1 align="center"> Edita </h1>
				
				<div align="center">
					<img id="fotopreview" class="post" src="arquivos/<?php $imagem = $dados_receita['imagem']; echo $imagem; ?>"><br>
					<label> Foto da Receita </label> <br>
					<input id="uploadfoto" type="file" name="imagem" value="arquivos/<?php $imagem = $dados_receita['imagem']; echo $imagem; ?>">
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
					<div class="input-field col s6 offset-s3">
						<input placeholder="<?php echo $dados_receita['nomerec']?>" name="nome_receita" type="text" class="validate">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s6 offset-s3">
						<input placeholder="<?php echo $dados_receita['sobre'];?>" name="descricao" type="text" class="validate">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s6 offset-s3">
						<textarea placeholder="<?php echo $dados_receita['preparo']; ?>" name="preparo" type="text" class="validate"></textarea>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6 offset-s3">
						<label> Ingredientes </label><br><br>
							<div id='lines'></div>
							<button type="button" onclick="addInput('lines')">+</button><br>
							<button type="submit" name="enviar" class="col s6 offset-s3 btn waves-effect #f57f17 yellow darken-4">
					Enviar  <i class="material-icons right">send</i> </button>
					</div>
				</div>
		</form>
			<?php
				if(isset($_POST['enviar'])):
					if(!empty($_FILES['imagem']['name'])):
						$erros = Array();
						$formatosPermitidos = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG");
						$extensao = pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION);

						if(in_array($extensao, $formatosPermitidos)):
							$pasta = "arquivos/"; // criando o caminho para fazer o upload do arqv
							$temporario = $_FILES['imagem']['tmp_name']; //selecionando o nome temporario do arqv;
							$novoNome = uniqid().'.'.$extensao; //transformando o nome do arqv em um nome unico; organização
							
							if(move_uploaded_file($temporario, $pasta.$novoNome)): /*retorna true caso o arqv temporario consiga
							ir para o destino; altera o nome do arquivo*/
							
								$nome =  filter_input(INPUT_POST,'nome_receita',FILTER_SANITIZE_SPECIAL_CHARS);
								$desc = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
								$preparo = filter_input(INPUT_POST,'preparo',FILTER_SANITIZE_SPECIAL_CHARS);
								$ingredientes = "";
								
								$n=1;
								
								if(!empty($_POST['ingrediente1'])):
									$ingredientes = "<ul>";
									
									while(!empty($_POST['ingrediente'.$n])):
										$ingrediente = $_POST["ingrediente".$n];
										$ingredientes = $ingredientes."<li> $ingrediente </li>";
										$n = $n + 1;
									endwhile;
									$ingredientes = $ingredientes."</ul>";
									
								endif;

								$n=0;
								$valores = [$nome,$preparo,$novoNome,$desc,$ingredientes];
								$colunasEditaveis = ['nomerec','preparo','imagem','sobre','ingrediente'];
								while($n<5):
									if(!empty($valores[$n])):
										$sql = "UPDATE receita SET $colunasEditaveis[$n] = '$valores[$n]' WHERE codreceita = '$id_receita'";
										$resultado = mysqli_query($connect,$sql);
									endif;
									$n = $n + 1;
									
								endwhile;
								header("Location: receita.php?id_receita=$id_receita");
								mysqli_close($connect);
								
							else:
								$erros[] = "<script>alert('Erro, não foi possível fazer o upload');</script>";
							endif;

						else:
							$erros[] = "<script>alert('Imagem com formato não suportado ou vazia');</script>";
						endif;
						
						if(!empty($erros)):
						
							foreach($erros as $erro):
								echo $erro;
							endforeach;
							
							if(!empty($pasta) or !empty($novoNome)):
								if(is_file($pasta.$novoNome)):
									$deletar = unlink($pasta.$novoNome);
								endif;
							endif;
							
						endif;
						
					else:
						
						$nome =  filter_input(INPUT_POST,'nome_receita',FILTER_SANITIZE_SPECIAL_CHARS);
						$desc = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
						$preparo = filter_input(INPUT_POST,'preparo',FILTER_SANITIZE_SPECIAL_CHARS);
						$ingredientes = "";
						
						$n=1;
						
						if(!empty($_POST['ingrediente1'])):
							$ingredientes = "<ul>";
							
							while(!empty($_POST['ingrediente'.$n])):
								$ingrediente = $_POST["ingrediente".$n];
								$ingredientes = $ingredientes."<li> $ingrediente </li>";
								$n = $n + 1;
							endwhile;
							$ingredientes = $ingredientes."</ul>";
							
						endif;

						$n=0;
						$valores = [$nome,$preparo,$desc,$ingredientes];
						$colunasEditaveis = ['nomerec','preparo','sobre','ingrediente'];

						while($n<4):
							if($valores[$n]!= null):
								$sql = "UPDATE receita SET $colunasEditaveis[$n] = '$valores[$n]' WHERE codreceita = '$id_receita'";
								$resultado = mysqli_query($connect,$sql);
							endif;
							$n = $n +1;
						endwhile;
						header("Location: receita.php?id_receita=$id_receita");
						mysqli_close($connect);
					endif;
				endif;
			?>
			
			
			<script>
				var n = 1;
				function addInput(lines){
					var newdiv = document.createElement('div');
					newdiv.innerHTML  = 'Digite a quantidade necessária e o ingrediente';
					newdiv.innerHTML += '<input type="text" name="ingrediente'+n+'" placeholder="Ex.: Uma colher de manteiga">';
					document.getElementById(lines).appendChild(newdiv);
					n++;
				}
			</script>
	</main>
	



<?php
include_once 'includes/footer.php';
?>

<?php
include_once 'includes/header.php';
?>

<?php

// iniciar sessão
session_start();

// conexao com bd;
require_once 'bd_conectar.php';

// Verificar login
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;

$id = $_SESSION['id_usuario'];

// dados usuário
if(!empty( $_GET['id_usuario'])):
	$id_usuario = $_GET['id_usuario'];
	$sql = "SELECT * FROM usuario WHERE CodigoUsu = '$id_usuario'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_assoc($resultado);
else:
	header('Location: home.php');
endif;
?>

<body>
	
	<header>
		<nav class="#fbc02d yellow darken-2" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo left">ComeCome</a>
		  <ul class="right">
			<li><a href="post.php" class="btn-floating #f57f17 yellow darken-4"> <i class= "material-icons"> add_circle </i> </a> </li>
			<li><a href="perfil.php?id_usuario=<?php $meuperfil = true; echo $id.'&meuperfil='.$meuperfil;?>" class="btn-floating #f57f17 yellow darken-4"> <i class= "material-icons"> account_circle </i> </a> </li>
			<li><a href="logout.php" class="btn-floating #f57f17 yellow darken-4"> <i class= "material-icons"> stop </i> </a> </li>
		  </ul>
		</div>
		</nav>
	</header>
	
	<main>	
		<div name="conteudo" class="container row">
			<div id="perfilarea" class='col s12 #fbc02d yellow darken-2 z-depth-2'>
				<div class="white-text fotonome">
					<img class="circle z-depth-2" height='300px' width='300px' src="fotosperfil/<?php echo $dados['foto']; ?>">
					<h3 class='texto'> <?php echo $dados['nome']; ?></h3>
					<h5 class='texto'>
						<?php 
							$sql = "SELECT seguido FROM seguidos WHERE seguido = '$id_usuario'";
							$resultado = mysqli_query($connect, $sql);
							$seguidores = Array();
							while ($row = mysqli_fetch_assoc($resultado)):
									$seguidores[] = $row['seguido'];
							endwhile;
							echo "Seguidores: ".count($seguidores);
							
							$sql = "SELECT CodReceita FROM receita WHERE fk_Usuario_CodigoUsu = '$id_usuario'";
							$resultado = mysqli_query($connect, $sql);
							$receitas = Array();
							while ($row = mysqli_fetch_assoc($resultado)):
								$receitas[] = $row['CodReceita'];
							endwhile;
							echo " Receitas: ".count($receitas)."</div>";
						?>
				</h5>
				<?php
				// FUNÇÃO DESCRIÇÃO
				if(!empty($dados['descricaoPerfil'])):
					$descricaoPerfil = $dados['descricaoPerfil'];
					echo "<br><br><div id='divdescricao'>";
					echo "<label> Descrição de Perfil </label><br>";
					echo "<input id='descricao' type='text' value='$descricaoPerfil' name='descricao' readonly> </div>";
				endif;
				
				
				//FUNÇÃO DO BUTTON
					$meuperfil = $_GET['meuperfil'];
					if(!$meuperfil):
					
						$sql = "SELECT seguido FROM seguidos WHERE seguindo = $id";
						$resultado = mysqli_query($connect, $sql);
						$seguido = mysqli_fetch_assoc($resultado);
						$seguido = $seguido['seguido'];
					
						if($seguido != $id_usuario):
							$server = $_SERVER['PHP_SELF'];
							echo "<form id='seguir' action='$server' method='GET'>
								<input type='hidden' name='id_usuario'value='$id_usuario'>
								<input type='hidden' name='meuperfil' value=''>
								<button type='submit' name='seguir'> SEGUIR </button>
								</form>";
							if(isset($_GET['seguir'])):
								
								$sql = "INSERT INTO seguidos(seguindo, seguido) values ('$id','$id_usuario')";
								$resultado = mysqli_query($connect, $sql);
								
							endif;
						else:
							echo "<div id='seguir'><button> SEGUINDO </button></div>";
						endif;
					endif;
				?>	
			</div>
			
			<div>
				<?php
				if($meuperfil):
					echo "<label class='receitade'> MINHAS RECEITAS: </label>";
				else:
					$nome = $dados['nome'];
					$nome = strtoupper($nome);
					echo "<label class='receitade'> RECEITAS DE $nome: </label>";
				endif;
				
				?>
				<table>
				<tr>
				<?php
					$sql = "SELECT CodReceita FROM receita WHERE fk_Usuario_CodigoUsu = '$id_usuario' ORDER BY `receita`.`data` DESC";
					$resultado = mysqli_query($connect, $sql);
					$receitas = Array();
					while ($row = mysqli_fetch_assoc($resultado)):
						$receitas[] = $row['CodReceita'];
					endwhile;
					$n = 0;
					if(count($receitas) > 0):
						while($n < count($receitas)):
							$receita = $receitas[$n];
							
							// selecionando os dados da receita
							$sql = "SELECT * FROM receita WHERE CodReceita = '$receita'";
							$resultado = mysqli_query($connect, $sql);
							$dados_receita = mysqli_fetch_assoc($resultado);
							
							$id_receita = $dados_receita['CodReceita'];
							$imagem_receita = $dados_receita['imagem'];
							
							echo "<td> <a href='receita.php?id_receita=$id_receita'><img class='minhasreceitas' src='arquivos/$imagem_receita'></a></td>";
							$n = $n + 1;
						endwhile;
					else:
						echo "<td> Esse usuário não tem receitas postadas </td>";
					endif;
				?> </tr>
				</table>
				
				
			
				
			</div>
			
			<div>
				<label class='receitade'> FAVORITADAS: </label>

				<table>
				<tr>
				<?php
					$sql = "SELECT codreceita FROM favorito WHERE codusu = '$id_usuario'";
					$resultado = mysqli_query($connect, $sql);
					$receitasFav = Array();
					while ($rowFav = mysqli_fetch_assoc($resultado)):
						$receitasFav[] = $rowFav['codreceita'];
					endwhile;
				
					$n = 0;
					if(count($receitasFav) > 0):
						while($n < count($receitasFav)):
							$receita = $receitasFav[$n];
							
							// selecionando os dados da receita
							$sql = "SELECT * FROM receita WHERE CodReceita = '$receita'";
							$resultado = mysqli_query($connect, $sql);
							$dados_receita = mysqli_fetch_assoc($resultado);
							
							$id_receita = $dados_receita['CodReceita'];
							$imagem_receita = $dados_receita['imagem'];
							
							echo "<td> <a href='receita.php?id_receita=$id_receita'><img class='minhasreceitas' src='arquivos/$imagem_receita'></a></td>";
							$n = $n + 1;
						endwhile;
					else:
						echo "<td> Esse usuário não tem receitas favoritadas </td>";
					endif;
				?> </tr>
				</table>
				  
				  <script>
					 var instance = M.Tabs.init(el, options);
				  </script>
				
			
				
			</div>
		</div>
			
		
		
	</main>
<?php
include_once 'includes/footer.php';
?>
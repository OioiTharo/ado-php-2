<!DOCTYPE html>
<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$musicas = [];
	$Id = filter_input(INPUT_GET, "Id");
	if($Id){
		$sql = $pdo->prepare("SELECT * FROM lista WHERE Id =:Id");
		$sql->bindValue(':Id',$Id);
		$sql->execute();
		$musicas = $sql->fetch(PDO::FETCH_ASSOC);
		if(!$musicas){
			header("Location: index.php");
			
			exit;
		}
	}
	else{
			header("Location: index.php");
			
			exit;
	}
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KARAOKE GTG</title>
		<link rel="icon" href="icon.gif" type="image/x-icon"/>
		<link rel="shortcut icon" href="icon.gif" type="image/x-icon"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link href="main.css" rel="stylesheet">
	</head>
	<body>
		<div class="cabecalho">
			<img class="gif" src="icon.gif"> 
			<br>
			<img src="https://see.fontimg.com/api/renderfont4/Rpz16/eyJyIjoiZHciLCJoIjo4MSwidyI6MTI1MCwiZnMiOjY1LCJmZ2MiOiIjMDAwMDAwIiwiYmdjIjoiI0ZGRkZGRiJ9/S0FSQU9LRSBHVEcg/kakekakeitalicpersonaluse-nmi.png" alt="Fancy fonts">
		</div>
		<div class="dFor2">
			<form method="POST" action="edAcao.php" class="row">
				<h2>Editar musica</h2>
				<input type="hidden" value="<?=$musicas['Id'];?>" name="Id"/>
				<p class="pad"></p>
				<div class="col-3">
					<label for="Musica" class="form-label">Musica:</label>
					<input type="text" class="form-control" id="Musica" value="<?=$musicas['musica'];?>" name="musica">
				</div>
				<div class="col-3">
					<label for="Cantor" class="form-label">Cantor:</label>
					<input type="text" class="form-control" id="Cantor" value="<?=$musicas['cantor'];?>" name="cantor">
				</div>
				<div class="col-3">
					<label for="Album" class="form-label">Album:</label>
					<input type="text" class="form-control" id="Album" value="<?=$musicas['album'];?>" name="album">
				</div>
				<div class="col-2">
					<label for="Ano" class="form-label">Ano de lançamento:</label>
					<input type="text" class="form-control" id="Ano" value="<?=$musicas['anoLanc'];?>" name="anoLanc">
				</div>
				<p class="pad"></p>
				<div class="col-6">
					<label for="Compositor" class="form-label">Compositor:</label>
					<input type="text" class="form-control" id="Compositor" value="<?=$musicas['compositor'];?>" name="compositor">
				</div>
				<div class="col-2">
					<label for="Genero" class="form-label">Genero:</label>
					<input type="text" class="form-control" id="Genero" value="<?=$musicas['genero'];?>" name="genero">
				</div>
				<p class="pad"></p>
				<input class="btn btn-primary sal" type="submit" value="SALVAR"/>
			</form>
		</div>
		<div class="dBot fixed-bottom">
			<p>by: ©GTG</p>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>
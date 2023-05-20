<?php
	require 'conexao.php';
	$pdo = conectar();
	$listaa=[];
	$sql = "SELECT * FROM lista";
	$resultado = $pdo->query($sql);
	while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$listaa[] = $linha;
	}
?>
<!DOCTYPE html>
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
		<div class="dTa"><table class="table table-striped tMus">
			<tr>
				<th>ID</th>
				<th>Musica</th>
				<th>Cantor</th>
				<th>Compositor</th>
				<th>Ano de lançamento</th>
				<th>Genero</th>
				<th>Album</th>
				<th></th>
			</tr>
			<tr>
			<?php foreach($listaa as $lista): ?>
			<tr>
				<td><?=$lista['Id'];?></td>
				<td><?=$lista['musica'];?></td>
				<td><?=$lista['cantor'];?></td>
				<td><?=$lista['compositor'];?></td>
				<td><?=$lista['anoLanc'];?></td>
				<td><?=$lista['genero'];?></td>
				<td><?=$lista['album'];?></td>
				<td>
					<a href="excluir.php?Id=<?=$lista['Id'];?>"><input type="button" class="btn" value="Deletar"></a> 
					<a href="editar.php?Id=<?=$lista['Id'];?>"> <input type="button" class=" btn" value="Editar"></a>
				</td>
			</tr>
			<?php endforeach ; ?>
		</table></div>
		<div class="dBot fixed-bottom">
			<a href="cadastro.php"><input type="button" class="btn btn-primary prin" value="Cadastrar Musica"></a>
			<p>by: ©GTG</p>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>

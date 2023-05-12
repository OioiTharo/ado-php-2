<?php
	require 'conexao.php';
	
	$listaa=[];
	$sql = $pdo->query("SELECT * FROM lista")
	if($sql->rowCount()>0){
		$listaa = $sql->fetchAll(PDO::FETCH_ASSOC);
	}
?>

<h1>Lista de Musicas</h1>

<table>
	<tr>
		<th>ID</th>
		<th>Musica</th>
		<th>Cantor</th>
		<th>Ações</th>
	</tr>
	<?php foreach($listaa as $lista): ?>
		<tr>
			<td><?$lista['id'];?></td>
			<td><?$lista['musica'];?></td>
			<td><?$lista['cantor'];?></td>
			<td>
				<a href="editar.php?id=<?$lista['id'];?>">EDITAR</a>
				<a href="excluir.php?id=<?$lista['id'];?>">EXCLUIR</a>
			</td>
		</tr>
	<?php endforeach ; ?>
	
</table>

<a href="cadastro.php">Cadastrar musica</a>


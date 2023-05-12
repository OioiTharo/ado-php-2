<?php
	require 'conexao.php';
	
	$musicas = [];
	$id = filter_input(INPUT_GET, "id");
	if($id){
		$sql = $pdo->prepare("SELECT * FROM lista WHERE id =:id");
		$sql->bindValue(':id',$id);
		$sql->execute()
		if($sql->rowCount()>0){
			$musicas = $sql->fetch(PDO::FETCH_ASSOC);
		}
		else{
			header("Location: index.php");
			exit;
		}
	}
	else{
			header("Location: index.php");
	}
?>

<h1> Editar Usuário </h1>
<form method="POST" action="edAcao.php">
	<input type="hidden" name="id" value="<?=$lista['id'];?>"/>
	<label>Musica</label>
	<input type="text" name="musica" value="<?=$lista['musica'];?>"/>
	<label>Cantor</label>
	<input type="text" name="cantor" value="<?=$lista['cantor'];?>"/>
	<input type="submit" value="ALTERAR"/>
</form>
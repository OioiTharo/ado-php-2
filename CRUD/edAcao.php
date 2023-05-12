<?php
	require 'conexao.php';
	
	$id = filter_input(INPUT_POST, 'id');
	$musica = filter_input(INPUT_POST, 'musica');
	$cantor = filter_input(INPUT_POST, 'cantor');
	
	if($id && $musica && $cantor){
		$sql = $pdo->prepare("UPDATE lista SET musica = :musica, cantor = :cantor WHERE id = :id")
		$sql->bindValue(':musica', $musica);
		$sql->bindValue(':cantor', $cantor);
		$sql->bindValue(':id', $id);
		$sql->execute();
		header("Location: index.php");
		exit;
	}
	else{
		header("Location: index.php");
		exit;
	}
?>
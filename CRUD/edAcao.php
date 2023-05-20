<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$Id = filter_input(INPUT_POST, 'Id');	
	$musica = filter_input(INPUT_POST, 'musica');
	$cantor = filter_input(INPUT_POST, 'cantor');
	$compositor = filter_input(INPUT_POST, 'compositor');
	$anoLanc = filter_input(INPUT_POST, 'anoLanc');
	$album = filter_input(INPUT_POST, 'album');
	$genero = filter_input(INPUT_POST, 'genero');
	
	if($Id && $musica && $cantor && $compositor && $anoLanc && $album && $genero){
		$sql = $pdo->prepare("UPDATE lista SET musica = :musica, cantor = :cantor, compositor = :compositor, anoLanc = :anoLanc, album = :album, genero = :genero WHERE Id = :Id");
		$sql->bindValue(':musica', $musica);
		$sql->bindValue(':cantor', $cantor);
		$sql->bindValue(':compositor', $compositor);
		$sql->bindValue(':anoLanc', $anoLanc);
		$sql->bindValue(':album', $album);
		$sql->bindValue(':genero', $genero);
		$sql->bindValue(':Id', $Id);
		$sql->execute();
		header("Location: index.php");
		exit;
	}
	else{
		header("Location: index.php"); 
		exit;
	}
?>
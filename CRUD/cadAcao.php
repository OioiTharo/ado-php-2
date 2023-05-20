<?php
	require 'conexao.php';
	$pdo = conectar();
	

	$musica = filter_input(INPUT_POST, 'musica');
	$cantor = filter_input(INPUT_POST, 'cantor');
	$compositor = filter_input(INPUT_POST, 'compositor');
	$anoLanc = filter_input(INPUT_POST, 'anoLanc');
	$album = filter_input(INPUT_POST, 'album');
	$genero = filter_input(INPUT_POST, 'genero');
	
	if($musica && $cantor && $compositor && $anoLanc && $album && $genero){
		$sql = $pdo->prepare("SELECT * FROM lista WHERE musica = :musica");
		$sql->bindValue(':musica', $musica);
		$sql->execute();
		
		if($sql->rowCount() === 0){
			$sql = $pdo->prepare("INSERT INTO lista (musica, cantor,compositor,anoLanc, album, genero) VALUES (:musica, :cantor,:compositor,:anoLanc, :album, :genero)");
			$sql->bindValue(':musica', $musica);
			$sql->bindValue(':cantor', $cantor);
			$sql->bindValue(':compositor', $compositor);
			$sql->bindValue(':anoLanc', $anoLanc);
			$sql->bindValue(':album', $album);
			$sql->bindValue(':genero', $genero);
			$sql->execute();
	
			header("Location: index.php");
			exit;
		}
		else{
			header("Location: cadastro.php");
		
			exit;
		}
	}
	else{
		header("Location: cadastro.php");
		exit;
	}
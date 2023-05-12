<?php
	require 'conexao.php';
	
	$musica = filter_input(INPUT_POST, 'musica');
	$cantor = filter_input(INPUT_POST, 'cantor');
	
	if($musica && $cantor){
		$sql = $pdo->prepare("SELECT * FROM lista WHERE musica = :musica");
		$sql->bindValue(':musica', $musica);
		$sql->execute();
		
		if($sql->rowCount() === 0){
			$sql = $pdo->prepare("INSERT INTO lista (musica, cantor) VALUES (:musica, :cantor)");
			$sql->bindValue(':musica', $musica);
			$sql->bindValue(':cantor', $cantor);
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
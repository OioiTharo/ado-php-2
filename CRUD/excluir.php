<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$Id = filter_input(INPUT_GET, 'Id');
	
	if($Id){
		$sql = $pdo->prepare("DELETE FROM lista WHERE Id = :Id");
		$sql->bindValue(":Id", $Id);
		$sql->execute();
	}
	header("Location: index.php");
	
?>
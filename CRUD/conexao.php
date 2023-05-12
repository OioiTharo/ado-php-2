<?php 

	$host = 144.22.157.228;
	$user = "gtg";
	$pass = "gtg";
	$dbname = "gtgKaraoque";
	$port = 3306;
	
	try{
		$conn = new PDO("mysql:$host;port=$port;dbname=" . $dbname, $user, $pass);
		
	} catch(PDOException $err){
		echo "Erro: Conexão com banco de dados não foi realizada com sucesso." . $err->getMessage();
	}
	
?>
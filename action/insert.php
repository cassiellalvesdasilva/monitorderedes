<?php

// Faz o link entre a página e aconexão

require_once 'db_connect.php';

if($_POST) {
	
	$nomecomputador =$_POST['nomecomputador'];
	$ip             =$_POST['ip'];	
	
	$sql = "insert into computadores (nome, ip) values ('$nomecomputador', '$ip')";
	
	// Vericar se deu tudo certo
	
	if($connect->query($sql) === true) {
		echo "Dados inseridos com sucesso1";		
	} else{
		echo "Erro: ".$sql.$connect->connect_error;
	}
	
	
	$connect->close();

header("location:../index.php");

}




?>
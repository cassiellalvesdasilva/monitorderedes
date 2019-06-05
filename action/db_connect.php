<?php
	// definindo variáveis de conexão
	$servidor = "Faccon-0359";
	$usuario  = "root";
	$senha    = "faccon";
	$banco    = "monitorderedes";
	
	// Criar conexão
	
	$connect = new mysqli($servidor, $usuario, $senha, $banco);
	
	// checar conexão
	
	if($connect->connect_error) {
		die("conexão falhou : ".$connect->connect_error);
	} else {
		echo "conexão realizada com sucesso!";
	}
?>
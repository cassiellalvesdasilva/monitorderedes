<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<!-- MONITOR REDE 
	 ADICIONAR
	 DELETAR
	 ALTERAR
	 SELECT
-->
<link rel="stylesheet" href="css/estilo.css">
<!-- comentário -->
<title>Monitor de Redes</title>
<?php require_once 'action/db_connect.php'; ?>
</head>
<body>
<div class="container">
<h1>Monitor de Redes</h1>
<form method="post" class="form-inline" action="action/insert.php">
<div class="row">

<div class="col">
<input type="text" placeholder="Nome" name="nomecomputador" class="form-control">
</div>

<div class="col">
<input type="text" placeholder="IP" name="ip" class="form-control">
</div>

<div class="col">
<input type="submit" class="btn btn-outline-secondary" value="salvar" />
</div>

</div>
</form>





<?php
function verificaStatus($ip){
	$ping = `ping $ip -n 1 -l 1`;
	if (preg_match("/bytes=/", $ping)) {
		return true;
	} else {
		return false;
	}
    }
	?>






<?php
// SQL selecional informaçoes na basde de dados
$sql = "select * from computadores";
$result = $connect->query($sql);
   while($dado = $result->fetch_assoc()){
	   $nome = $dado['nome'];
	   $ip = $dado['ip'];
	   $id = $dado['id'];
	   if(verificaStatus ($ip) == true)
	   {
		   echo $nome. " - ".$ip. " -Online <br>";
	   }
	 else
	 {
		 echo $nome." - ".$ip. " -Offline <br>";
		 
	 }
		   
		   
		   
		   
	   /*echo $dado ['nome'] . " -  " .
	   $dado['ip'] . "- <a href='action/delete.php?id=".$dado['id']." '>Excluir</a>
	   "."<br>";*/
	   
	   
   }
?>



<div class="row">
<div class="col">
<div class="bloco online">
<b>127.0.0.1</b><br>
ONLINE
</div>
<div class="bloco offline">
<b>127.0.0.2</b><br>
OFFLINE
</div>
</div>
</div>

</div>

</body>
</html>
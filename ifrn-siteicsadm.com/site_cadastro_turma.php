<?php
include('verifica_login.php');
include('connection.php');
$sql = "select * from turma";
$dados = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, initi

al-scale=1.0">

<link rel="stylesheet" href="style.css">
<title>Cadastro De Turmas </title>
</head>
<body>
<div class="container">
<h2>Cadastro de Turmas</h2>
<form action="cadastro_turma.php" method="post">
<label for "nome_turma">Nome * :</label>
<input type="text" id="nome_turma" name="nome_turma" r

equired>

<label for ="ano"> Ano da Turma * : </label>
<input type="number" id="ano" name="ano">
<label for "turma_id">Id Da Turma * :</label>
<input type="number" id="turma_id" name="turma_id" req

uired>

<button type="submit">Cadastrar</button>

</body>
</html>

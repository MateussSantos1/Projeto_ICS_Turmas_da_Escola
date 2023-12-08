<?php
include('connection.php');
$sql = "select * from alunos";
$dados = mysqli_query($mysqli, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, initi

al-scale=1.0">

<link rel="stylesheet" href="style.css">
<title>Cadastro De Alunos </title>
</head>
<body>
<div class="container">
<h2>Cadastro de Aluno</h2>
<form action="cadastro_aluno.php" method="post">
<label for "nome">Nome:</label>
<input type="text" id="telefone" name="nome" required>
<label for "email">Email:</label>
<input type="email" id="email" name="email" required>
<label for "telefone">Telefone:</label>
<input type="tel" id="telefone" name="telefone" requir

ed>

<label for "senha">Senha:</label>
<input type="password" id="senha" name="senha" require

d>

<button type="submit">Cadastrar</button>
</form>
<p><a href="login_aluno.php">Já Cadastrado? (Clique Aqui)<

/a></p>
</body>
</html>

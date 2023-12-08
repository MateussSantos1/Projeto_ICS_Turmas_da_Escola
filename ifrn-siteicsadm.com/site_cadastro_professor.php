<?php
include('verifica_login.php');
include('connection.php');
$sql = "select * from professor";

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
<h2>Cadastro de Professor</h2>
<form action="cadastro_professor.php" method="post">
<label for "nome_professor">Nome * :</label>
<input type="text" id="nome_professor" name="nome_prof

essor" required>

<label for "turma_id"> ID da Turma :</label>
<input type="number" id="turma_id" name="turma_id">
<h3>Disciplina:</h3>
<select name="disciplina">
<option value="Matematica">Matemática</option>
<option value = "Portugues">Português</option>
<option value = "Ciencias"> Ciencias </option>
<option value = "Geografia"> Geografia </option>
<option value = "Historia"> Historia </option>
<option value = "Ingles"> Ingles </option>
</select>
<button type="submit">Cadastrar</button>
</form>
</body>
</html>

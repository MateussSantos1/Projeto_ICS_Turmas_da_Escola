<?php
session_start();
include('connection.php');
if(!$mysqli) {
die("Conexão falhou !!! " . my_sqli_connect_error());
}
if(!isset($_SESSION['id'])) {
header("Location: login_aluno.php");
exit();
}
if(isset($_POST['sair'])) {
session_destroy();
header("Location: login_aluno.php");
exit();
}
$alunologado = $_SESSION['id'];
$sqlAluno = "SELECT * FROM alunos WHERE id = $alunologado";
$resultAluno = $mysqli->query($sqlAluno);
if ($resultAluno->num_rows > 0) {
$aluno = $resultAluno->fetch_assoc();
$turmaId = $aluno['turma_id'];
if($turmaId !== null) {
$sqlTurma = "SELECT * FROM turma WHERE turma_id = $turmaId ";
$resultTurma = $mysqli->query($sqlTurma);
if ($resultTurma->num_rows > 0) {
$turma = $resultTurma->fetch_assoc();
}} else {
echo"Turma não encontrada.";
}
} else{
echo"Aluno não encontrado.";
}
highlight_file('site_principal_aluno.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, initi

al-scale=1.0">

<link rel="stylesheet" href="style.css">
<title>Minhas Informações - Aluno </title>
</head>
<body>
<header>
<form method="post">
<button type="submit" name="sair" style="background: red;
color: white;width:10%;position: absolute;top:10px;right:10px;">Sa
ir</button>

</form></header>
<div class="container">
<h2 style="text-align: left;">Minhas Informações</h2>

<div> <table style="margin-bottom: 0.5em;">

<thead>
<tr>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $aluno['nome']; ?></td>
<td><?php echo $aluno['email']; ?></td>
<td><?php echo $aluno['telefone']; ?></td>
</tr>
</tbody>
</table>
</div>

<div style="margin-bottom:2em;justify-content:left; align-
itens:left; text-align:left;">

<button><a style="text-decoration: none;color:white;" href="ed
itar_aluno.php">Editar Minhas Informações</a></button>
</div>

<h2 style="text-align:left;">Informações da Minha Turma</h

2>

<div class="tabela" style="width:112%;">
<table style="margin-bottom: 4em;">
<thead>
<tr>
<th>Nome</th>
<th>Ação</th>
</tr></thead><tbody><tr>
<?php
if (isset($aluno['turma_id']) && $aluno['turma_id'] !== nu

ll) {

echo"<td><strong>Nome da Turma:</strong> {$turma['nome_tur

ma']}</td>";

echo"<td><a href='ver_turma_aluno.php'>Mais Informaçõe

s</a></td>";}

else{ echo "<td> Você não está associado a nenhuma turma,

no momento.</td>";}

?>
</tr>
</tbody>
</table>
</div>
</body>
</html>

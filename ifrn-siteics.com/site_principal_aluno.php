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
highlight_file("site_principal_aluno.php");
$alunologado = $_SESSION['id'];
$sqlAluno = "SELECT * FROM alunos WHERE id = $alunologado";
$resultAluno = $mysqli->query($sqlAluno);
if ($resultAluno->num_rows > 0) {
$aluno = $resultAluno->fetch_assoc();
$turmaId = $aluno['turma_id'];
$sqlTurma = "SELECT * FROM turma WHERE turma_id = $turmaId";
$resultTurma = $mysqli->query($sqlTurma);
if ($resultTurma->num_rows > 0) {
$turma = $resultTurma->fetch_assoc();
} else {
echo"Turma não encontrada.";
}
} else{
echo"Aluno não encontrado.";
}
$mysqli->close();
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
<h2>Minhas Informações</h2>

<table>
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

<h2>Informações da Minha Turma</h2>
<table>
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

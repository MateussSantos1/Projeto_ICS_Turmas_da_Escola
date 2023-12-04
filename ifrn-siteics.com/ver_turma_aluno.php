<?php
session_start();
include('connection.php');
if(!$mysqli) {
die("Conexão falhou !!!" . my_sqli_connect_error());}
if(!isset($_SESSION['id'])) {
header("Location: login_aluno.php");
exit();
}
$alunoId = $_SESSION['id'];
$sqlAluno = "SELECT * FROM alunos WHERE id = $alunoId";
$resultAluno = $mysqli->query($sqlAluno);
if($resultAluno->num_rows > 0) {
$aluno = $resultAluno->fetch_assoc();
$turmaId = $aluno['turma_id'];
$sqlTurma = "SELECT * FROM turma WHERE turma_id = $turmaId";
$resultTurma = $mysqli->query($sqlTurma);
$sqlListaAlunos = "SELECT * FROM turma WHERE turma_id = $turma
Id";
$resultListaAlunos = $mysqli->query($sqlListaAlunos);
}
if($resultTurma->num_rows > 0) { $turma = $resultTurma-
>fetch_assoc();}
else {

echo"Aluno não encontrado";
exit();
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2 style="margin-top:2em;">Ver Turma: <?php echo $turm
a['nome_turma']; ?> - <?php echo $turma['ano']; ?> o Ano</h2>
<h3> Alunos na Turma</h3>
<form method="post" style="margin-bottom:20px;width:50%;">
<label for="termo_busca">Buscar:</label>
<input type="text" name="termo_busca" id="termo_busca">
<button type="submit">Buscar</button>
</form>
<div class="tabela">
<table>
<thead>
<tr>
<th>Nome</th>
<th>Email</th>
</tr>
</thead>

<tbody>
<?php
$sql_alunos = " select * from alunos where turma_id = {$tu

rmaId}";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['t

ermo_busca'])) {

$termoBusca = $_POST['termo_busca'];
$sql_alunos = "select * from alunos where turma_id = {$tur

maId} and nome like '%$termoBusca%'";

}
$result_alunos = $mysqli->query($sql_alunos);
if($result_alunos->num_rows > 0) {
while ($aluno = $result_alunos->fetch_assoc()) {
?>
<tr>
<td><?php echo $aluno['nome']; ?></td>
<td><?php echo $aluno['email'];?></td>
</tr>
<?php
}
}
else {
echo "<tr><td colspan='3'> Nenhum aluno encontrado nes

ta turma.</td></tr>";

}
?>
</tbody>
</table></div>
<h3>Professores da Turma:</h3>
<form method="post" style="margin-bottom:20px;width:50%">
<label for="prof_busca">Buscar:</label>
<input type="text" name="prof_busca" id="prof_busca">
<button type="submit">Buscar</button>
</form>
<div class="tabela">
<table style="margin-bottom:3em;">
<thead>
<tr>
<th>Nome</th>
<th>Disciplina</th>
</tr>
</thead>
<tbody>
<?php
$sql_professores = "select * from professor where turma_id

= {$turmaId}";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['p

rof_busca'])) {

$profBusca = $_POST['prof_busca'];
$sql_professores = "select * from professor where turma_id

= {$turmaId} and nome_professor like '%$profBusca%'";

}
$result_professores = $mysqli->query($sql_professores);

if($result_professores->num_rows > 0) {
while($professor = $result_professores->fetch_assoc())

{

?>
<tr>
<td><?php echo $professor['nome_professor']; ?></td>
<td><?php echo $professor['disciplina']; ?></td>
</tr>
<?php

}
}

else{
echo"<tr><td colspan='3'> Nenhum professor associado a

essa turma</td></tr>";

}
?>
</tbody>
</table>
</div>

</body>
</html>

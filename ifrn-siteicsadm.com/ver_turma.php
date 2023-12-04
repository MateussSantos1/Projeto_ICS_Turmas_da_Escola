<?php
include('verifica_login.php');
include('connection.php');
$turmaId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($turmaId> 0) {
$sql_turma = "SELECT * from turma where turma_id = {$turmaId}";
$result_turma = $conexao->query($sql_turma);
if ($result_turma->num_rows > 0) {
$turmaSelecionada = $result_turma->fetch_assoc();}
else {echo "Nenhuma turma encontrada!";}
}
else { echo"ID INVÁLIDo!!";
header("Location: login_adm.php");}
?>
<html>
<head>
<style>button{ margin-right:2em;margin-left:0;}</style>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2 style="margin-top:2em;">Ver Turma: <?php echo $turmaSelecionad
a['nome_turma']; ?></h2>
<h2 style="color:brown;"><?php echo $turmaSelecionada['ano']; ?> o
Ano</h2>
<h2 style="margin-bottom:2em;"> Alunos na Turma</h2>
<?php
echo"<button><a href='edicao_turma.php?id={$turmaId}'>Alterar Nome
/ Ano</a></button>";
echo"<button><a href='aluno_para_turma.php?
id={$turmaId}'>Adicionar Alunos</a></button>";
echo"<button style='color:white;background:red'><a href='processar
_exclusao_turma.php?id={$turmaId}'>Excluir Turma</a></button>";
?>
<form method="post" style="margin-top:3em;margin-bottom: 20px;
display:flex;flex-direction:row;width:50%;">

<label for="aluno_busca" style="margin-right:1em;margin-
top:0.3em;">Buscar:</label>

<input style="width:50%;margin-right:1em;" type="text" name="a
luno_busca" id="aluno_busca">
<button style="height:2.4em;" type="submit">Buscar</button>
</form>

<div class="tabela" style="max-
height:250px;overflow:auto;overflow-x:hidden;">

<table>
<thead style="position:sticky;top:0;">
<tr>
<th>Nome</th>
<th>Email</th>
</tr>
</thead>
<tbody>
<?php

$sql_alunos = " select * from alunos where turma_id = {$tu

rmaId}";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['a

luno_busca'])) {

$alunoBusca = $_POST['aluno_busca'];
$sql_alunos = " SELECT * FROM alunos where turma_id = {$tu

rmaId} AND nome LIKE '%$alunoBusca%'";}

$result_alunos = $conexao->query($sql_alunos);
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
<h2> Professores da Turma</h2>

<form method="post" style="margin-bottom: 20px;margin-
top:3em;display:flex;flex-direction:row;width:50%;">

<label for="prof_busca" style="margin-right:1em;margin-
top:0.3em;">Buscar:</label>

<input style="width:50%;margin-right:1em;"type="text" name="pr
of_busca" id="prof_busca">
<button style="height:2.4em;" type="submit">Buscar</button>
</form>

<div class="tabela" style="max-height:250px;overflow-
y:auto;margin-bottom:2em;overflow-x:hidden;">

<table>
<thead style="position:sticky;top:0;">
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
$sql_professores = "SELECT * FROM professor where turma_id

= {$turmaId} and nome_professor LIKE '%$profBusca%'";}

$result_professores = $conexao->query($sql_professores);

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

</body>
</html>

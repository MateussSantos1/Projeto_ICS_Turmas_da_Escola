<?php
include('verifica_login.php');
include('connection.php');
$turmaId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql_alunos = "SELECT * FROM alunos where turma_id is null";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aluno
_busca'])) {
$alunoBusca = $_POST['aluno_busca'];
$sql_alunos = "SELECT * FROM alunos where turma_id is null and
nome LIKE '%$alunoBusca%'";}
$result_alunos = $conexao->query($sql_alunos);
echo "ID da turma:" . $turmaId;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, init

ial-scale=1.0">

<link rel="stylesheet" href="style.css">
<title> Adicão de Alunos na Turma </title>
</head>
<body>
<h3>Informações de Alunos</h3>
<form method="post" style="margin-bottom: 20px;">
<label style="margin-top:2em;" for="aluno_busca">Buscar:</

label>

<input type="text" name="aluno_busca" id="aluno_busca">
<button type = "submit">Buscar</button>
</form>
<form action="processar_adicao_aluno.php" method="post" st

yle="margin-top:3em;">

<input type="hidden" name="turma_id" value="<?php echo $tu

rmaId; ?>">

<div class="tabela" style="max-
height:270px;overflow:auto;overflow-x:hidden;">

<table>
<thead style="position:sticky;top:0;">
<tr>
<th>Nome</th>
<th>Turma ID</th>
<th>Tipo</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
<?php
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '

';

if ($filtro == 'alunos' && $result_alunos->num_rows >

0){

while ($aluno = $result_alunos->fetch_assoc()) {

echo "<tr>";
echo "<td>{$aluno['nome']}</td>";
if (isset($aluno['turma_id'])) {
echo"<td>{$aluno['turma_id']}</td>";

} else {
echo"<td> Não associado a uma turma</td>";
}

echo "<td>Aluno</td>";
echo "<td><button><a href='processar_adicao_al
uno.php?id={$aluno['id']}'>Adicionar à Turma</a></button></td>";

echo "</tr>";
}
} else {
while ($aluno = $result_alunos->fetch_assoc()) {
echo "<tr>";
echo "<td>{$aluno['nome']}</td>";
if(isset($aluno['turma_id'])) {echo "<td>{$aluno['turm

a_id']}</td>";}

else{ echo"<td>Não associado a uma turma</td>";}
echo "<td>Aluno</td>";
echo "<td><button type='submit' name='adicionar' v

alue={$aluno['id']}'>Adicionar à Turma</button></td>";

echo "</tr>";
}
}
?>_
</tbody>
</table></div>
</form>
</body>
</html>

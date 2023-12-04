<?php
include('verifica_login.php');
include('connection.php');
if(isset($_POST['sair'])) {
session_destroy();
header("Location: login_adm.php");
exit();
}
$sql_turmas = "SELECT * FROM turma";

$sql_alunos = "SELECT * FROM alunos";

$sql_professores = "SELECT * FROM professor";
$sqllimpa = "delete from alunos where char_length(nome) <=0; "
;
$conexao->query($sqllimpa);

//BUSCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['termo
_busca'])) {
$termoBusca = $_POST['termo_busca'];
$sql_alunos = "SELECT * FROM alunos WHERE nome LIKE '$termoBus
ca%'";
$sql_professores = "SELECT * FROM professor WHERE nome_profess
or LIKE '%$termoBusca%'";
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['turma
_busca'])) {
$turmaBusca = $_POST['turma_busca'];
$sql_turmas = " SELECT * FROM turma WHERE nome_turma LIKE '%
$turmaBusca%'";
}

$result_turmas = $conexao->query($sql_turmas);
$result_alunos = $conexao->query($sql_alunos);
$result_professores = $conexao->query($sql_professores);

highlight_file('siteadm.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, init

ial-scale=1.0">

<link rel="stylesheet" href="style.css">
<title> Logar no SistemaADM </title>
</head>

<body style="margin-top:1em;margin-left:1em;margin-
right:1em;">

<header>
<button><a href="http://ifrn-siteicsadm.com/site_cadastro_

turma.php">Cadastrar Nova Turma</a></button>

<button><a href="http://ifrn-siteicsadm.com/site_cadastro_

professor.php">Cadastrar Novo Professor</a></button>

<form method="post">
<button type="submit" name="sair" style="position:absolute

;top:1em;right:1em;background:red;">Sair</button>

</form>
</header>
<h3>Turmas Cadastradas</h3>
<form method="post" style="margin-top: 20px;display:flex;f

lex-direction:row;">

<label for="turma_busca" style="margin-right:1em;margin-
top:0.3em;"> Buscar</label>

<input style="width:50%;margin-right:1em;" type="text" nam

e="turma_busca" id="turma_busca" value="<?php echo isset
($turmaBusca) ? htmlspecialchars($turmaBusca, ENT_QUOTES) : ''; ?
>">

<button style="width:10%;height:2.2em;"type="submit"> Busc

ar</button>
</form>

<div class="tabela" style="max-
height:150px;overflow:auto;">

<table>
<thead style="position:sticky;top:0;">
<tr>
<th> ID da Turma </th>
<th> Nome da Turma </th>
<th> Ações </th>
</tr>
</thead>
<tbody>
<?php
if($result_turmas->num_rows > 0) {
while ($turma = $result_turmas->fetch_assoc()) {
echo "<tr>";
echo "<td>{$turma['turma_id']}</td>";
echo "<td>{$turma['nome_turma']} - {$turma['ano']}

o ano</td>";

echo "<td><a href='ver_turma.php?
id={$turma['turma_id']}'>Ver Turma</a></td>";

echo "</tr>";
}
}
if($result_turmas->num_rows <= 0){
echo "<tr><td colspan='3'> Nenhuma turma encontrad

a.</td></tr>";
}
?>
</tbody>
</table>
</div>
<h3>Informações de Alunos e Professores</h3>
<a href="?filtro=alunos"><button onclick="location.href='?

filtro=alunos';">Alunos</button></a>

<a href="?filtro=professores"><button onclick="location.hr

ef='?filtro=professores';">Professores</button></a>

<form method="post" style="margin-top: 20px;display:flex;f

lex-direction:row;width:auto;">

<label for="termo_busca" style="margin-right:1em;margin-
top:0.3em;" >Buscar:</label>

<input style="width:50%;margin-right:1em;" type="text" nam

e="termo_busca" id="termo_busca" value="<?php echo isset
($termoBusca) ? htmlspecialchars($termoBusca, ENT_QUOTES) : ''; ?
>">

<button style="width:10%;height:2.2em;" type="submit">Busc

ar</button>
</form>

<div class="tabela" style="max-
height:250px;overflow:auto;">

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
echo "<td><a href='editar_aluno.php?

id={$aluno['id']}'>Editar</a></td>";
echo "</tr>";
}
} elseif ($filtro == 'professores' && $result_professo

res->num_rows >= 0){

while ($professor = $result_professores-

>fetch_assoc()) {

echo "<tr>";
echo "<td>{$professor['nome_professor']}</td>";
if (isset($professor['turma_id'])) {
echo"<td>{$professor['turma_id']}</td>";
} else {
echo"<td> Não associado a uma turma</td>";
}
echo "<td>{$professor['disciplina']}</td>";
echo "<td><a href ='editar_professor.php?

id={$professor['professor_id']}'>Editar</a></td>";

echo "</tr>";
}
} else {
while ($aluno = $result_alunos->fetch_assoc()) {
echo "<tr>";
echo "<td>{$aluno['nome']}</td>";
if(isset($aluno['turma_id'])){
echo "<td>{$aluno['turma_id']}</td>";}
else{ echo "<td>Não associado a uma turma</td>";}
echo "<td>Aluno</td>";
echo "<td><a href='editar_aluno.php?

id={$aluno['id']}'>Editar</a></td>";

echo "</tr>";
}
}
?>
</tbody>
</table>
</div>
</body>
</html>

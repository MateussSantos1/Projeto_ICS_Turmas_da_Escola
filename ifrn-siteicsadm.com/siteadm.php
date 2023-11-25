<?php
$servidor = '192.168.100.20';
$usuario = 'ics';
$senha = 'conectado';
$nomebd = 'sistemanotas';
$conexao = mysqli_connect($servidor, $usuario, $senha, $nomebd
);
if(!$conexao) {
die("Conexao falhou!!!" + mysqli_connect_error());
}
highlight_file('connection.php');
?>
<?php
include('connection.php');
$sql_turmas = "SELECT * FROM turma";
$result_turmas = $conexao->query($sql_turmas);
$sql_alunos = "SELECT * FROM alunos";
$result_alunos = $conexao->query($sql_alunos);
$sql_professores = "SELECT * FROM professor";
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
<body>
<button><a href="http://ifrn-siteicsadm.com/site_cadastro_
turma.php"> Cadastrar Nova Turma</a></button>
<button><a href="http://ifrn-siteics.com/site.php">Novo Al
uno</a></button>
<button><a href="http://ifrn-siteicsadm.com/site_cadastro_
professor.php">Novo Professor</a></button>
<h3>Turmas Cadastradas</h3>
<table>
<thead>
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
echo "<td>{$turma['nome_turma']}</td>";
echo "<td><a href='ver_turma.php?
id={$turma['turma_id']}'>Ver Turma</a></td>";
echo "</tr>";
}
}
else{
echo "<tr><td colspan='3'> nenhuma turma encontrad
a.</td></tr>";
}
?>
</tbody>
</table>
<h3>Informações de Alunos e Professores</h3>
<a href="?filtro=alunos"><button onclick="location.href='?
filtro=alunos';">Alunos</button></a>
<a href="?filtro=professores"><button onclick="location.hr
ef='?filtro=professores';">Professores</button></a>
<table>
<thead>
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
res->num_rows > 0){
while ($professor = $result_professores-
>fetch_assoc()) {
echo "<tr>";
echo "<td>{$professor['nome_professor']}</td>";
if (isset($professor['turma_id'])) {
echo"<td>{$professor['turma_id']}</td>";
} else {
echo"<td> Não associado a uma turma</td>";
}
echo "<td> Professor</td>";
echo "<td><a href ='editar_professor.php?
id={$professor['professor_id']}'>Editar</a></td>";
echo "</tr>";
}
} else {
while ($aluno = $result_alunos->fetch_assoc()) {
echo "<tr>";
echo "<td>{$aluno['nome']}</td>";
echo "<td>{$aluno['turma_id']}</td>";
echo "<td>Aluno</td>";
echo "<td><a href='editar_aluno.php?
id={$aluno['id']}'>Editar</a></td>";
echo "</tr>";
}
}
?>_
</tbody>
</table>
</body>
</html>
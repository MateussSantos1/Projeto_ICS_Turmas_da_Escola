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
$turmaId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql_alunos = "SELECT * FROM alunos where turma_id is null";
$result_alunos = $conexao->query($sql_alunos);
$sql_professores = "SELECT * FROM professor ";
$result_professores = $conexao->query($sql_professores);
echo "ID da turma:" . $turmaId;
highlight_file('aluno_para_turma.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, init
ial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title> Adicão de Entidades na Turma </title>
</head>
<body>
<h3>Informações de Alunos e Professores</h3>
<a href="?filtro=alunos"><button onclick="location.href='?
filtro=alunos';">Alunos</button></a>
<a href="?filtro=professores"><button onclick="location.hr
ef='?filtro=professores';">Professores</button></a>
<form action="processar_adicao_aluno.php" method="post">
<input type="hidden" name="turma_id" value="<?php echo $tu
rmaId; ?>">
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
echo "<td><button><a href='processar_adicao_al
uno.php?id={$aluno['id']}'>Adicionar à Turma</a></button></td>";
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
echo "<td><a href ='.php?
id={$professor['professor_id']}'>Editar</a></td>";
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
</table>
</form>
</body>
</html>

<?php
$servidor = '192.168.100.20';
$usuario = 'ics';
$senha = 'conectado';
$nomebd = 'sistemanotas';
$conexao = mysqli_connect($servidor, $usuario, $senha, $nomebd);
if(!$conexao) {
die("Conexao falhou!!!" + mysqli_connect_error());
}
highlight_file('connection.php');
?>
<?php
include('connection.php');
$alunoId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($alunoId> 0){
$sql = "SELECT * FROM alunos where id = $alunoId";
$result = $conexao->query($sql);
if($result->num_rows > 0){
$aluno = $result->fetch_assoc();
} else{
die("Aluno não encontrado.");
}
}
else{
die("ID desse aluno não foi fornecido.");
}
$conexao->close();
highlight_file('editar_aluno.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Editar Aluno</h2>
<form action="processar_edicao_aluno.php" method="post">
<input type="hidden" name="id" value=<?php echo $aluno['id']; ?>">
<label for="nome">Nome:</label>
<input type="text" name="nome" value="<?php echo $aluno['nome']; ?
>">
<label for="telefone">Telefone:</label>
<input type="text" name="telefone" value="<?php echo $alun
o['telefone']; ?>">
<label for="senha">Senha:</label>
<input type="password" name="senha" value="<?php echo $alun
o['senha']; ?>">
<label for="turma_id"> Turma ID:</label>
<input type="number" name="turma_id" value="<?php echo $alun
o['turma_id']; ?>">
<?php echo"<button><a href='processar_edicao_aluno.php?
id={$aluno['id']}'>Salvar Alterações</a></button>";?>
</form>
<form action="processar_exclusao_aluno.php" method="post">
<input type="hidden" name="id" value=<?php echo $aluno['id']; ?
>">
<button type="submit">Excluir Alunos</button>
</form>
</div>
</body>
</html>
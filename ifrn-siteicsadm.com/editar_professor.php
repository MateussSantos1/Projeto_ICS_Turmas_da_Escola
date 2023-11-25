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
$professorId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($professorId> 0){
$sql = "SELECT * FROM professor where professor_id = $professorId";
$result = $conexao->query($sql);
if($result->num_rows > 0){
$professor = $result->fetch_assoc();
} else{
die("Professor não encontrado.");
}
}
else{
die("ID desse Professor não foi fornecido.");
}
highlight_file('editar_professor.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Editar Professor</h2>
<form action="processar_edicao_professor.php" method="post">
<input type="hidden" name="id" value=<?php echo $professo
r['professor_id']; ?>">
<label for="nome_professor">Nome:</label>
<input type="text" name="nome_professor" value="<?php echo $professo
r['nome_professor']; ?>">
<label for="senha_professor">Senha:</label>
<input type="password" name="senha_professor" value="<?php echo $pro
fessor['senha_professor']; ?>">
<label for="turma_id"> Turma ID:</label>
<input type="number" name="turma_id" value="<?php echo $professo
r['turma_id']; ?>">
<?php echo"<button><a href='processar_edicao_professor.php?
id={$professor['professor_id']}'>Salvar Alterações</a></button>";?>
</form>
</div>
</body>
</html>
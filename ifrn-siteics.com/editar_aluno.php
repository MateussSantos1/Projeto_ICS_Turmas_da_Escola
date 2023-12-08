<?php
session_start();
include('connection.php');
if(!isset($_SESSION['id'])) {
header("Location: login_aluno.php");
exit();}
$alunoId = $_SESSION['id'];
if($alunoId> 0){
$sql = "SELECT * FROM alunos where id = $alunoId";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
$aluno = $result->fetch_assoc();
} else{
die("Aluno não encontrado.");
}
}
else{
die("ID desse aluno não foi fornecido.");
}
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
<label for="nome">Nome:</label>
<input type="text" name="nome" value="<?php echo $alun

o['nome']; ?>">

<label for="telefone">Telefone:</label>
<input type="text" name="telefone" value="<?php echo $

aluno['telefone']; ?>">

<label for="senha">Senha:</label>
<input type="text" name="senha" value="<?php echo $alu

no['senha']; ?>">

<button>Salvar Alterações</button>
</form>
</div>
</body>
</html>

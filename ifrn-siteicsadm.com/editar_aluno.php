<?php
include('verifica_login.php');
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
<input type="hidden" name="id" value="<?php echo $alun

o['id']; ?>">

<label for="nome">Nome:</label>
<input type="text" name="nome" value="<?php echo $alun

o['nome']; ?>">

<label for="telefone">Telefone:</label>
<input type="text" name="telefone" value="<?php echo $

aluno['telefone']; ?>">

<label for="email">Email</label>
<input type="email" name="email" value="<?php echo $al

uno['email']; ?>">

<label for="senha">Senha:</label>
<input type="text" name="senha" value="<?php echo $alu

no['senha']; ?>">

<label for="turma_id"> Turma ID:</label>
<input type="number" name="turma_id" value="<?php echo

$aluno['turma_id']; ?>">

<?php echo"<button><a href='processar_edicao_aluno.php?

id={$aluno['id']}'>Salvar Alterações</a></button>";?>

</form>
<form action="processar_exclusao_aluno.php" method="po

st">

<input type="hidden" name="id" value=<?php echo $a

luno['id']; ?>">

<button style="background:red;margin-top:1em;" type="submit">Excluir Alunos</button>

</form>
</div>
</body>
</html>

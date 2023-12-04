<?php
include('verifica_login.php');
include('connection.php');
$turma_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$novo_nome = $_POST['novo_nome'];
$novo_ano = $_POST['novo_ano'];
$sql = "UPDATE turma SET nome_turma = '$novo_nome', ano = '$no
vo_ano' WHERE turma_id = $turma_id";
if($conexao->query($sql) === TRUE){
echo "Dados da turma atualizados com sucesso!!!";
header("Location: ver_turma.php?id={$turma_id}");
exit();
} else{
echo "Erro ao atualizar os dados da turma: " . $conexao-
>error;
exit();
}
}
$sqlTurma = "SELECT * FROM turma WHERE turma_id= $turma_id";
$resultTurma = $conexao->query($sqlTurma);
if($resultTurma->num_rows > 0) {
$turma = $resultTurma->fetch_assoc();
}
else{
echo "Turma não encontrada.";
exit();
}
$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="style.css">
<title>Atualizar Turma</title>
</head>
<body>
<h2>Atualizar Turma</h2>
<form action="" method="post">
<label for="novo_nome">Nome * :</label>
<input type="text" name="novo_nome" value="<?php echo $turm
a['nome_turma']; ?>" required>
<label for="novo_ano">Ano:</label>
<input type="number" name="novo_ano" value="<?php echo $turm
a['ano']; ?>" required>
<button type="submit">Atualizar Turma</button>
</form>
</body>
</html>

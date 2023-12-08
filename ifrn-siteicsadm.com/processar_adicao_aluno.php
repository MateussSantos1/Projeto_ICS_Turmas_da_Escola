<?php
include('verifica_login.php');
include('connection.php');
if(!$conexao){
die("Conexao Falhou!" + mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$idParaAdicionar = isset($_POST['adicionar']) ? intval($_POST[
'adicionar']) : 0;
$turmaId = isset($_POST['turma_id']) ? $_POST['turma_id'] : 0;
$sql = "UPDATE alunos SET turma_id = '$turmaId' WHERE id = '$i
dParaAdicionar'";
if($conexao->query($sql) === TRUE) {
echo "Aluno/Professor adicionado à turma com sucesso.";
header("Location: ver_turma.php?id=" . $turmaId);
} else{
echo "Erro ao adicionar à turma: " . $conexao->error;
}
}
else{
echo" Ops! Algo deu errado!!" . $conexao->error;}

?>

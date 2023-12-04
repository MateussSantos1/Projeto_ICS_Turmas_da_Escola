<?php
include('verifica_login.php');
include('connection.php');
$aluno = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$alunoId = intval($_POST["id"]);
$sql = "DELETE FROM alunos WHERE id = '$alunoId'";
if($conexao->query($sql) === TRUE){
echo "Aluno Excluído com sucesso =)";
header("Location: siteadm.php");
} else{
echo "Erro ao excluir o aluno =( " . $conexao->error;
}
}
?>

<?php
include('verifica_login.php');
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$nome = $_POST["nome"];
$aluno = $_POST["id"];
$turmaId = $_POST["turma_id"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
}
if ($turmaId > 0) {
$sql = "UPDATE alunos SET nome = '$nome', telefone = '$telefon
e', email = '$email', turma_id = '$turmaId' WHERE id = '$aluno'";
}
if ($turmaId <= 0){
$sql = "UPDATE alunos SET nome = '$nome', telefone = '$telefon
e', email = '$email', turma_id = null WHERE id = '$aluno'";
}
if($conexao->query($sql) === TRUE){
echo "Alterações salvas com suceso =)";
header("Location: siteadm.php");
exit();
} else if($conexao->query($sql) !== TRUE){
echo "Erro ao salvar as seguintes alteraçoes: " . $conexao

->error;

exit();
}
else{echo"Algo Inesperado ocorreu:" . $conexao->error;
exit();}
?>

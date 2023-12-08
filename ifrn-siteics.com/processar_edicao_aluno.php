<?php
session_start();
include('connection.php');
if(!isset($_SESSION['id'])) {
header("Location: login_aluno.php");
exit();
}
$alunoId = intval($_SESSION['id']);
if($_SERVER["REQUEST_METHOD"] == "POST"){
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$senha = $_POST["senha"];
$sql = "UPDATE alunos SET nome = '$nome', telefone = '$telefon
e', senha = '$senha' WHERE id = '$alunoId'";
if($mysqli->query($sql) === TRUE){
echo "Alterações salvas com sucesso =)";
header("Location: site_principal_aluno.php");
}} else{
echo "Erro ao salvar as seguintes alteraçoes: " . $mysqli-

>error;
}
exit();
?>

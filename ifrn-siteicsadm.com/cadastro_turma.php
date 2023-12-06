<?php
include('verifica_login.php');
include('connection.php');
if(!$conexao){
die("Conexao Falhou!" + mysqli_connect_error());
}
$turma_id = $_POST['turma_id'];
$nome_turma = $_POST['nome_turma'];
$ano_turma = $_POST['ano'];
$sql = "insert into turma (turma_id, nome_turma, ano) values (
'$turma_id', '$nome_turma', '$ano_turma' )";
if (mysqli_query($conexao, $sql)){
echo "Turma Cadastrada com sucesso =)";
header("Location: siteadm.php");
}
else{
echo"Ops! Ocorreu algum erro. Por favor verifique as infor

mações!";
}
?>

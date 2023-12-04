<?php
include('verifica_login.php');
include('connection.php');
if(!$conexao){
die("Conexao Falhou!" + mysqli_connect_error());
}
$nome = $_POST['nome_professor'];
$turma_id = $_POST['turma_id'];
$disciplina = $_POST['disciplina'];
$sqlVerificar = "SELECT * FROM professor WHERE turma_id = '$tu
rma_id' AND disciplina = '$disciplina'";
$resultVerificar = mysqli_query($conexao, $sqlVerificar);
if(mysqli_num_rows($resultVerificar) > 0) {
echo "ERRO!!! Um professor já tem essa disciplina atribuída ne
sta turma!!";
exit();}
if($turma_id > 0) {
$sql = "insert into professor (nome_professor, turma_id, disci
plina) values ('$nome', '$turma_id', '$disciplina')";
}
else if($turma_id <= 0) {
$sql = "insert into professor (nome_professor, turma_id, disci
plina) values ('$nome', null, '$disciplina')";
}
if (mysqli_query($conexao, $sql)){
echo "Professor Cadastrado com sucesso =)";
header("Location: siteadm.php");
exit();
}
else{
echo"Não foi possível cadastrar =(";

}
mysqli_close($conexao);
?>

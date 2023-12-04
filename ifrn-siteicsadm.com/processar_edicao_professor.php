<?php
include('verifica_login.php');
include('connection.php');
$professor = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$nome = $_POST["nome_professor"];
$turmaId = $_POST["turma_id"];
$novadisciplina = $_POST["disciplina"];
$professorId = intval($_POST["id"]);
$sqlVerificar = "SELECT * FROM professor WHERE turma_id = '$tu
rmaId' AND disciplina = '$novadisciplina' AND professor_id != $pro
fessorId";
$resultVerificar = $conexao->query($sqlVerificar);
if($resultVerificar->num_rows > 0) {
echo "Não é possivel atualizar a disciplina, já existe outro p
rofessor encarregado dela";
echo "<a href='siteadm.php'>Voltar</a>";
exit();
}
$sql = "SELECT * FROM professor";
if ($turmaId > 0) {
$sql = "UPDATE professor SET nome_professor = '$nome', discipl
ina = '$novadisciplina', turma_id = '$turmaId' WHERE professor_id
= '$professorId'";
}
if ($turmaId <= 0){
$sql = "UPDATE professor SET nome_professor = '$nome', discipl
ina = '$novadisciplina', turma_id = null WHERE professor_id = '$pr
ofessorId'";
}
if($conexao->query($sql) === TRUE){
echo "Alterações salvas com suceso =)";
header("Location: siteadm.php");
$conexao->close();
exit();
} }
else{echo"Algo Inesperado ocorreu:" . $conexao->error;}
exit();
?>

<?php
include('verifica_login.php');
include('connection.php');
$professor = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$profId = intval($_POST["id"]);
$sql = "DELETE FROM professor WHERE professor_id = '$profId'";
if($conexao->query($sql) === TRUE){
echo "Professor Excluído com sucesso =)";
header("Location: siteadm.php");
} else{
echo "Erro ao excluir o professor=( " . $conexao->error;
}
}
$conexao->close();
?>

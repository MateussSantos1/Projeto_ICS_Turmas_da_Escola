<?php
$servidor = '192.168.100.20';
$usuario = 'ics';
$senha = 'conectado';
$nomebd = 'sistemanotas';
$conexao = mysqli_connect($servidor, $usuario, $senha, $nomebd);
if(!$conexao) {
die("Conexao falhou!!!" + mysqli_connect_error());
}
highlight_file('connection.php');
?>
<?php
include('connection.php');
$aluno = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$alunoId = intval($_POST["id"]);
$sql = "DELETE FROM alunos WHERE id = '$alunoId'";
if($conexao->query($sql) === TRUE){
echo "Aluno Excluído com sucesso =)";
} else{
echo "Erro ao excluir o aluno =( " . $conexao->error;
}
}
highlight_file('processar_exclusao_aluno.php');
?>
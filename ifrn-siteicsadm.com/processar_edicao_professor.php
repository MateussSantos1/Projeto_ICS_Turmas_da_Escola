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
$professor = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$nome = $_POST["nome_professor"];
$senha = $_POST["senha_professor"];
$turmaId = $_POST["turma_id"];
$professorId = intval($_POST["id"]);
$sql = "UPDATE professor SET nome_professor = '$nome', senha_professor = '$s
enha', turma_id = '$turmaId' WHERE professor_id = '$professorId'";
if($conexao->query($sql) === TRUE){
echo "Alterações salvas com suceso =)";
} else{
echo "Erro ao salvar as seguintes alteraçoes: " . $conexao->error;
}
}
highlight_file('processar_edicao_professor.php');
?>
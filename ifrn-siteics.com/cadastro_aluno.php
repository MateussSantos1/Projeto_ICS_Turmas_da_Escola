<?php
$servidor = '192.168.100.20';
$usuario = 'ics';
$senha = 'conectado';
$nomebd = 'sistemanotas';
$conexao = mysqli_connect($servidor, $usuario, $senha, $nomebd
);
if(!$conexao){
die("Conexao Falhou!" + mysqli_connect_error());
}
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$sql = "insert into alunos (nome, email, telefone, senha) valu
es ('$nome', '$email', '$telefone', '$senha')";
$sqlEmail = "SELECT COUNT(*) as count FROM alunos WHERE email
= '$email'";
$result = $conexao->query($sqlEmail);
if ($result === false) { die("Erro na consulta: " . $conexao-
>error);}
$row = $result->fetch_assoc();
$count = $row['count'];
if($count > 0) {
echo "O email informado já está em uso!!!"; echo "<a href

='site.php'> Voltar para o cadastro..</a>"; exit();}
else if (mysqli_query($conexao, $sql)){
echo "Aluno Cadastrado com sucesso =)";
header("Location: login_aluno.php");
exit();
}
else{echo "Erro ao cadastrar";}
$conexao->close();
?>

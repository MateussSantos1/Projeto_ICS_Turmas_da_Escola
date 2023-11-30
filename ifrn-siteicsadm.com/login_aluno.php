<?php
session_start();
include('connection.php');
if($mysqli->connect_error) {
die("Falha na conexão com o banco de dados: " . $mysqli-
>connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = "SELECT id, nome FROM alunos WHERE email = '$email' AND
senha = '$senha'";
$result = $mysqli->query($sql);
if($result->num_rows > 0) {
$row = $result->fetch_assoc();
$_SESSION['id'] = $row['id'];
header("Location: site_principal_aluno.php");
exit();
} else {
$erro_login = "Email e/ou Senha inválidos. Tente Novamente

!!!";
}
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, init

ial-scale=1.0">

<link rel="stylesheet" href="style.css">
<title> Login do Aluno </title>
</head>
<body>
<div class="container">
<h2>Login do Aluno</h2>
<form action="" method="post">
<p>
<label for "email">Email:<label>
</p>
<p>
<input type="email" name="email" required style="width

: 100%">

</p>
<p>
<label for "senha">Senha:</label>
</p>
<p>
<input type="password" name="senha" required style = "

width: 100%">
</p>
<button type="submit">Logar</button>
</form>
<p><a href="site.php">Não Cadastrado? (Clique Aqui)</a></p

>
<?php
if(isset($erro_login)){
echo"<p>$erro_login</p>";}

?>
</div>
</body>
</html>

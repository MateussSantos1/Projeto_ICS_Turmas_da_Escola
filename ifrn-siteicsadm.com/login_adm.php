<?php
session_start();
include('connection.php');
if($conexao->connect_error) {
die("Falha na conexão com o banco de dados: " . $conexao-
>connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$id_equipe = $_POST['id_equipe'];
$senha = $_POST['senha'];
$sql = "SELECT id_equipe, nome_equipe FROM equipe_tecnica WHER
E id_equipe = '$id_equipe' AND senha = '$senha'";
$result = $conexao->query($sql);
if($result->num_rows > 0) {
$row = $result->fetch_assoc();
$_SESSION['id_equipe'] = $row['id_equipe'];
$_SESSION['id_equipe'] = true;
header("Location: siteadm.php");
exit();
} else {
$erro_login = "Email e/ou Senha inválidos. Tente Novamente

!!!";
}
}
$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, init

ial-scale=1.0">

<link rel="stylesheet" href="style.css">
<title> Login do ADM </title>
</head>
<body>
<div class="container">
<h2>Login do ADM</h2>
<form action="" method="post">
<p>
<label for "id_equipe">ID ADM:<label>
</p>
<p>
<input type="number" name="id_equipe" required style="

width: 100%">
</p>
<p>
<label for "senha">Senha:</label>
</p>
<p>
<input type="password" name="senha" required style = "

width: 100%">
</p>
<button type="submit">Login</button>
</form>

<?php
if(isset($erro_login)){
echo"<p>$erro_login</p>";}

?>
</div>
</body>
</html>

<?php
$servidor = '192.168.100.20';
$usuario = 'ics';
$senha = 'conectado';
$nomebd = 'sistemanotas';
$conexao = mysqli_connect($servidor, $usuario, $senha, $nomebd
);
if(!$conexao) {
die("Conexao falhou!!!" + mysqli_connect_error());
}
highlight_file('connection.php');
?>
<?php
include('connection.php');
$sql = "select * from professor";
highlight_file('site_cadastro_professor.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, initi
al-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Cadastro De Professores </title>
</head>
<body>
<div class="container">
<h2>Cadastro de Professor</h2>
<form action="cadastro_professor.php" method="post">
<label for "nome_professor">Nome:</label>
<input type="text" id="nome_professor" name="nome_prof
essor">
<label for "senha_professor">Senha:</label>
<input type="password" id="senha" name="senha_professo
r">
<label for "turma_id"> ID da Turma * :</label>
<input type="number" id="turma_id" name="turma_id" req
uired>
<button type="submit">Cadastrar</button>
</body>
</html>
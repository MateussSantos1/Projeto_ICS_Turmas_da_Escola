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
$sql = "select * from turma";
$dados = mysqli_query($conexao, $sql);
highlight_file('site_cadastro_turma.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset "UTF-8">
<meta name = "viewport" content="width=device-width, initi
al-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Cadastro De Tumas </title>
</head>
<body>
<div class="container">
<h2>Cadastro de Turma</h2>
<form action="cadastro_turma.php" method="post">
<label for "nome_turma">Nome:</label>
<input type="text" id="nome_turma" name="nome_turma">
<label for "turma_id">Id Da Turma * :</label>
<input type="number" id="turma_id" name="turma_id" req
uired>
<label for "professor_id">Id Do Professor:</label>
<input type="number" id="professor_id" name="professor
_id">
<button type="submit">Cadastrar</button>
</body>
</html>
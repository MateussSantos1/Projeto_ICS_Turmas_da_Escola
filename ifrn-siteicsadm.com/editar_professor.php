<?php
include('verifica_login.php');
include('connection.php');
$professorId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($professorId> 0){
$sql = "SELECT * FROM professor where professor_id = $professo
rId";
$result = $conexao->query($sql);
if($result->num_rows > 0){
$professor = $result->fetch_assoc();
} else{
die("Professor não encontrado.");
}
}
else{
die("ID desse Professor não foi fornecido.");
}
$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Editar Professor</h2>
<form action="processar_edicao_professor.php" method="po

st">

<input type="hidden" name="id" value=<?php echo $profe

ssor['professor_id']; ?>">

<label for="nome_professor">Nome:</label>
<input type="text" name="nome_professor" value="<?php

echo $professor['nome_professor']; ?>">

<label for="turma_id"> Turma ID:</label>
<input type="number" name="turma_id" value="<?php echo

$professor['turma_id']; ?>">
<h3>Disciplina</h3>
<select name="disciplina">
<option value="Matematica">Matematica</option>
<option value="Portugues"> Portugues</option>
<option value="Ciencias"> Ciencias </option>
<option value="Geografia"> Geografia </option>
<option value ="Historia"> Historia </option>
<option value="Ingles"> Ingles </option>
</select>
<?php echo"<button><a href='processar_edicao_professor.
php?id={$professor['professor_id']}'>Salvar Alterações</a></
button>";?>

</form>
<form action="processar_exclusao_professor.php" method

="post">

<input type="hidden" name="id" value=<?php echo $p

rofessor['professor_id']; ?>">

<button style="background:red;margin-top:1em;" typ

e="submit">Excluir Professor</button>

</form>
</div>
</body>
</html>

<?php
session_start();
if(isset($_SESSION['id'])) {
header("Location: site_principal_aluno.php");
exit();
}
else{
header("Location: login_aluno.php");
exit();
}
?>

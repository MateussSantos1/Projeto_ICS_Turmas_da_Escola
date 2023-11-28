<?php
session_start();
if (!isset($_SESSION['id_equipe']) || $_SESSION['id_equipe'] !== true){
header("Location: login_adm.php");
exit();
}
?>

<?php
session_start();
if(isset($_SESSION['id_equipe'])) {
header("Location: siteadm.php");
exit();
}
else{
header("Location: login_adm.php");
exit();
}
?>

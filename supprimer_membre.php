<?php

include_once "connexion.php";

$id = $_GET['id'];
$req = mysqli_query($connexion, "DELETE from utilisateur WHERE uid = $id"); 

header('location: admin_panel.php');
?>
<?php


include_once "connexion.php";
session_start();

?>

<form method="POST" action="">

  <input type="text" name="nom" placeholder="nom">
  <input type="text" name="email" placeholder="email">
  <input type="boolean" name="tribune" placeholder="tribune">
  <input type="submit" name="ajouter" value="ajouter">
</form>


<?php

$_SESSION["nom"];
$_COOKIE["nom"];

if(isset($_POST['ajouter'])){
  extract($_POST);

  
  if(isset($prenom) && isset($email)){
    
    $ajt = mysqli_query($con, "INSERT INTO membres (id, prenom, nom, email) VALUES ('', '$nom', '$email', '$tribune')");
    if($ajt){
    
      header('location: Test.html');
    }else {
        $message = "Erreur lors de la modification du membre.";
    }

}else {
  $message = "Veuillez remplir tous les champs.";
}
}

session_destroy();
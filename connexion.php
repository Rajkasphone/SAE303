<?php
$host = "localhost"; // Hôte de la base de données
$base_de_donnees = "sae303"; // Nom de la base de données
$utilisateur = "root"; // Nom d'utilisateur de la base de données
$mot_de_passe = "root"; // Mot de passe de la base de données

try {
    $bdd = new PDO("mysql:host=$host;dbname=$base_de_donnees;charset=utf8", $utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

$connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $base_de_donnees);
?>







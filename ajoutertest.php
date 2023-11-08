<?php
// Remplacez ces valeurs par les informations de connexion à votre base de données
$serveur = "localhost";
$utilisateur = "votre_utilisateur";
$mot_de_passe = "votre_mot_de_passe";
$base_de_donnees = "sae303";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Ajouter un intervenant
if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $horaire = $_POST['horaire'];

    // Requête d'insertion
    $requete = "INSERT INTO intervenant (nom, email, horaire) VALUES ('$nom', '$email', '$horaire')";

    if ($connexion->query($requete) === TRUE) {
        echo "Intervenant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'intervenant : " . $connexion->error;
    }
}

// Retirer un intervenant
if (isset($_POST['retirer'])) {
    $id = $_POST['id'];

    // Requête de suppression
    $requete = "DELETE FROM intervenant WHERE id = $id";

    if ($connexion->query($requete) === TRUE) {
        echo "Intervenant retiré avec succès.";
    } else {
        echo "Erreur lors du retrait de l'intervenant : " . $connexion->error;
    }
}

// Fermer la connexion à la base de données
$connexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des intervenants</title>
</head>
<body>
    <h1>Ajouter un intervenant</h1>
    <form method="post">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" required><br>
        <label for="email">Email : </label>
        <input type="email" name="email" required><br>
        <label for="horaire">Horaire : </label>
        <input type="datetime-local" name="horaire" required><br>
        <input type="submit" name="ajouter" value="Ajouter">
    </form>

    <h1>Retirer un intervenant</h1>
    <form method="post">
        <label for="id">ID de l'intervenant à retirer : </label>
        <input type="number" name="id" required><br>
        <input type="submit" name="retirer" value="Retirer">
    </form>
</body>
</html>

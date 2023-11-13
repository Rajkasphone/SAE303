<?php
// Connexion à la base de données (à configurer avec vos informations)
include_once "connexion.php";

try {
    $bdd = new PDO("mysql:host=$host;dbname=$base_de_donnees;charset=utf8", $utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Traitement pour supprimer un utilisateur
if (isset($_POST['supprimer'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
    $sql = "DELETE FROM `utilisateur` WHERE `id` = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$id_utilisateur]);

    // Vous pouvez également supprimer l'entrée correspondante dans la table intervenant ou spectateur
    // en fonction du type d'utilisateur.
    // Assurez-vous de gérer les contraintes de clé étrangère.

    header('Location: admin.php'); // Redirection vers la page d'administration
    exit();
}

// Traitement pour modifier un utilisateur (à implémenter)
if (isset($_POST['modifier'])) {
    // Vous devez implémenter la logique pour modifier un utilisateur ici.
    // Vous pouvez utiliser un formulaire de modification pour collecter les nouvelles informations.
    // Assurez-vous de valider et mettre à jour les données dans la base de données.
}

// Récupération de la liste des utilisateurs
$sql = "SELECT u.id, u.nom_utilisateur, u.email, u.mot_de_passe, 
               i.nom AS nom_intervenant, s.nom AS nom_spectateur
        FROM `utilisateur` u
        LEFT JOIN `intervenant` i ON u.id = i.id_utilisateur
        LEFT JOIN `spectateur` s ON u.id = s.id_utilisateur";
$stmt = $bdd->query($sql);
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
</head>
<body>
    <h1>Page d'Administration</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom d'Utilisateur</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur) { ?>
            <tr>
                <td><?= $utilisateur['id'] ?></td>
                <td><?= $utilisateur['nom_utilisateur'] ?></td>
                <td><?= $utilisateur['email'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id_utilisateur" value="<?= $utilisateur['id'] ?>">
                        <button type="submit" name="supprimer">Supprimer</button>
                        <!-- Ajoutez un bouton de modification avec un formulaire pour chaque utilisateur -->
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

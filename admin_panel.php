<?php
// Vérification du mot de passe (à intégrer à votre page d'administration)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mot_de_passe_saisi = $_POST['mot_de_passe'];

    if ($mot_de_passe_saisi !== 'admin') {
        // Mot de passe incorrect, rediriger vers la page de connexion
        header('Location: admin_login.php');
        exit();
    }
} else {
    // Si le formulaire n'a pas été soumis, rediriger vers la page de connexion
    header('Location: admin_login.php');
    exit();
}

// Connexion à la base de données (à configurer avec vos informations)
include_once "connexion.php";

try {
    $bdd = new PDO("mysql:host=$host;dbname=$base_de_donnees;charset=utf8", $utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Récupération de la liste des membres inscrits
// $sql = "SELECT u.id, u.nom_utilisateur, u.email, u.mot_de_passe, 
//                i.nom, u.type_utilisateur AS nom_intervenant, s.nom AS nom_spectateur
//         FROM `utilisateur` u
//         LEFT JOIN `intervenant` i ON u.id = i.id_utilisateur
//         LEFT JOIN `spectateur` s ON u.id = s.id_utilisateur";
$sql = "SELECT * FROM utilisateur LEFT JOIN spectateur ON utilisateur.uid = spectateur.id_utilisateur LEFT JOIN intervenant ON utilisateur.uid = intervenant.id_utilisateur";

$stmt = $bdd->query($sql);
$membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Interface d'Administration</title>
</head>
<body>
    <h1>Interface d'Administration</h1>
    <a href="admin_login.php">Déconnexion</a>
    
    <h2>Liste des Membres Inscrits</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom d'Utilisateur</th>
            <th>Email</th>
            <TH>Type</TH>
            <th>Horaire de passage/tribune</th>
            <th>Action</th>
        </tr>
        <?php foreach ($membres as $membre) { ?>
            <tr>
                <td><?= $membre['uid'] ?></td>
                <td><?= $membre['nom_utilisateur'] ?></td>
                <td><?= $membre['uemail'] ?></td>
                <td><?= $membre['type_utilisateur']?></td>
                <td><?php if(isset($membre['horaire'])){
                    echo $membre['horaire'];
                }else {
                    echo $membre["tribune"];
                } ?></td>
                <td>
                    <!-- Ajoutez ici des liens ou boutons pour modifier et supprimer les membres -->
                    <a href="modifier_membre.php?id=<?php if(isset($membre['horaire'])){
                    echo $membre['uid'] .'&horaire='. $membre['horaire'];
                }else {
                    echo $membre['uid'] .'&tribune='. $membre['tribune'];
                } ?>">Modifier</a>
                    <a href="supprimer_membre.php?id=<?= $membre['uid'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

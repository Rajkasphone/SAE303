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
    <link rel="stylesheet" href="stylerphp.css">
    <link href="https://fonts.googleapis.com/css?family=Faster+One&display=swap" rel="stylesheet" />
</head>
<body>

<div class="menucntr">

<header>

    <nav>
        <ul>
            <li><a href="#quoid">Quoi</a></li>
            <li><a href="#quiid">Qui</a></li>
            <li><a href="#lieuid">Où</a></li>
            <li><a href="#participerid">Participer</a></li>
        </ul>
    </nav>
    
    <div class="divA">
        <a href="index.php">
            <img alt='Logo' class="logoimg" src='data:image/png;base64,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' />
        </a>
   </div>

</header>

</div>


<div class="general3">

    <div class="partctnr3">
            <h2 class="parttitre3">Interface d'administration</h2>
    </div>

</div> 

<div class="divglobal">
    
    <h2 class="liste">Liste des Membres Inscrits</h2>
    <table class="tableadmin">
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

    <a href="admin_login.php" class="deconnexion">Déconnexion</a>
   

</div> 



</body>
</html>

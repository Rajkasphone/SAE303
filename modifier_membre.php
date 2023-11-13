<?php
require_once 'connexion.php'; // Inclure le fichier de configuration de la base de données
    // Récupérez l'ID de l'utilisateur à modifier depuis l'URL
    $id_utilisateur = $_GET['id'];
    if(isset($_GET['horaire'])) {

    $horaire = $_GET['horaire'];
    } else if(isset($_GET['tribune'])) {
    $tribune = $_GET['tribune'];
    };
    // Chargez les informations de l'utilisateur à partir de la base de données

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT u.uid, u.nom_utilisateur, u.uemail, i.horaire, s.tribune, u.type_utilisateur
            FROM `utilisateur` u
            LEFT JOIN `intervenant` i ON u.uid = i.id_utilisateur
            LEFT JOIN `spectateur` s ON u.uid = s.id_utilisateur
            WHERE u.uid = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id_utilisateur, PDO::PARAM_INT);
    $stmt->execute();
    $membre = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php

if(isset($_POST['modifier'])){
    extract($_POST);
        $sqlintervenant = mysqli_query($connexion, "UPDATE utilisateur SET nom_utilisateur = '$nom_utilisateur' , uemail = '$email' WHERE uid = '$id_utilisateur'");
        if($sqlintervenant) {
            echo"ok";

    }else {
        echo "erruer";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier Membre</title>
    <link rel="stylesheet" href="stylerphp.css">
    <link href="https://fonts.googleapis.com/css?family=Faster+One&display=swap" rel="stylesheet" />
</head>
</head>
<body>

<div class="divheader">

<header>

    <nav>
        <ul>
            <li><a href="#quoid">Quoi</a></li>
            <li><a href="#quiid">Qui</a></li>
            <li><a href="#lieuid">Où</a></li>
            <li><a href="#participerid">Participer</a></li>
        </ul>
    </nav>
    <a href="index.php"><img src="image/logo.png" alt="logo" class="logoimg"></a>

</header>

</div>

<div class="modifier">
 
<div class="general4">

    <div class="partctnr4">
            <h2 class="parttitre4">Modifier un membre</h2>
    </div>

</div>
    
    <form method="POST" action="">
        <input type="hidden" name="id_utilisateur" value="<?= $membre['uid'] ?>">
        <label for="nom_utilisateur">Nom d'Utilisateur :</label>
        <input type="text" id="nom_utilisateur" name="nom_utilisateur" value="<?= $membre['nom_utilisateur'] ?>" required><br><br>
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $membre['uemail'] ?>" required><br><br>

        <?php 
        if(isset($tribune)){
            ?>
        <label for="tribune">Tribune (pour les spectateurs) :</label>
            <select id="tribune" name="tribune">
                <?php 

                    if(isset($tribune) && $tribune == 'bas') {
                ?>
                <option value="haut">Tribune du haut</option>
                <option value="bas" selected>Tribune du bas</option>

            <?php
                    }else if(isset($tribune) && $tribune == 'haut'){
                        ?>
                        <option value="haut" selected>Tribune du haut</option>
                        <option value="bas" >Tribune du bas</option>
                        <?php
                    }
            ?>
            </select>

            <?php
        }else {
            ?>
            <label for="horaire">Horaire de passage (pour les intervenants) :</label>
            <input type="datetime-local" id="horaire" name="horaire" value="<?=$membre["horaire"]?>">
            <?php
        }
        
        ?>
        
        <input type="submit" name="modifier" value="Modifier">
    </form>

    </div>

</body>
</html>
<?php
// } else {
//     // Redirigez en cas de requête incorrecte
//     // header('Location: admin_panel.php');
//     // exit();
?>

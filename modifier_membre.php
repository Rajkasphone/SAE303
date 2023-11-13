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

    <div class="divA">
        <a href="index.php">
            <img alt='Logo' class="logoimg" src='data:image/png;base64,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' />
        </a>
   </div>
   
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

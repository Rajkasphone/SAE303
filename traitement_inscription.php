<?php

    // Récupérez les données du formulaire
    $mail = $_POST['mail'];
    $type_utilisateur = $_POST['type_utilisateur'];
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    include_once "connexion.php";
    

    try {
        

        // Insertion dans la table "utilisateur" (pour l'authentification)
        $mot_de_passe_hache = hash("sha256", $_POST['mot_de_passe']);
        $sql = "INSERT INTO `utilisateur` (`nom_utilisateur`, `mot_de_passe`, `uemail`, `type_utilisateur`) VALUES (?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$nom_utilisateur, $mot_de_passe_hache, $mail, $type_utilisateur]);

        // Récupérez l'ID de l'utilisateur inséré
        $id_utilisateur = $bdd->lastInsertId();

        // Insérez des informations spécifiques à l'intervenant ou au spectateur
        if ($type_utilisateur === 'intervenant') {
            $horaire = $_POST['horaire'];

            $sql = "INSERT INTO `intervenant` (`id_utilisateur`, `horaire`) VALUES (?, ?)";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$id_utilisateur, $horaire]);
        } elseif ($type_utilisateur === 'spectateur') {
            $tribune = $_POST['tribune'];

            $sql = "INSERT INTO `spectateur` (`id_utilisateur`, `tribune`) VALUES (?, ?)";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$id_utilisateur, $tribune]);
        }

        // Redirigez l'utilisateur vers une page de confirmation ou une autre page appropriée
        header('Location: confirmation.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

?>

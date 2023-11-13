<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<a href="admin_login.php" class="button">Accéder à la page d'administration</a>
<body>
    <h1>Inscription</h1>
    <form action="traitement_inscription.php" method="post">

        <label for="mail">Adresse e-mail :</label>
        <input type="email" id="mail" name="mail" required><br><br>

        <label for="type_utilisateur">Type d'utilisateur :</label>
        <select id="type_utilisateur" name="type_utilisateur">
            <option value="intervenant" >Intervenant</option>
            <option value="spectateur" selected>Spectateur</option>
        </select><br><br>

        <label for="nom_utilisateur">Nom d'utilisateur :</label>
        <input type="text" id="nom_utilisateur" name="nom_utilisateur" required><br><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <div id="tribune_field" style="display: block;">
            <label for="tribune">Tribune (pour les spectateurs) :</label>
            <select id="tribune" name="tribune">
                <option value="haut">Tribune du haut</option>
                <option value="bas">Tribune du bas</option>
            </select>
        </div><br>

        <div id="horaire_field" style="display: none;">
            <label for="horaire">Horaire de passage (pour les intervenants) :</label>
            <input type="datetime-local" id="horaire" name="horaire">
        </div><br>

        <button type="submit">S'inscrire</button>
    </form>

    <script>
        // JavaScript pour afficher le champ "Tribune" ou "Horaire" en fonction du type d'utilisateur
        const typeUtilisateurSelect = document.getElementById('type_utilisateur');
        const tribuneField = document.getElementById('tribune_field');
        const horaireField = document.getElementById('horaire_field');
        typeUtilisateurSelect.addEventListener('change', function () {
            if (typeUtilisateurSelect.value === 'spectateur') {
                tribuneField.style.display = 'block';
                horaireField.style.display = 'none'; // correction : "display" au lieu de "display"
            } else if (typeUtilisateurSelect.value === 'intervenant') {
                tribuneField.style.display = 'none';
                horaireField.style.display = 'block';
            }
        });
    </script>
</body>
</html>

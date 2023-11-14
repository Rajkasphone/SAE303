<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="stylerphp.css">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Faster+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Avenir&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
</head>


<body>

 <!-- menu  -->

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

<!-- FIN menu  -->

<div class="general">

    <div class="partctnr">
            <h2 class="parttitre">Inscription</h2>
    </div>

</div> 


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
        <a href="login.php">J'ai déjà un compte</a>
    </form>

    <div class="admincntr">
        
        <a href="admin_login.php" class="administration">Accéder à la page d'administration</a>

    </div>


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




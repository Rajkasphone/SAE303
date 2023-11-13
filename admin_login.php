<!DOCTYPE html>
<html>
<head>
    <title>Connexion à l'Administration</title>
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
    <a href="index.php"><img src="image/logo.png" alt="logo" class="logoimg"></a>

</header>

</div>

<div class="general2">

    <div class="partctnr2">
            <h2 class="parttitre2">Se connecter</h2>
    </div>

</div> 



    <form method="post" action="admin_panel.php">
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

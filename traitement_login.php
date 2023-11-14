<?php 
$mail = $_POST["mail"];
$pass = $_POST["mot_de_passe"];
$hashpass = hash("sha256", $pass);

include_once "connexion.php";

$sql = mysqli_query($connexion, "SELECT * FROM utilisateur WHERE uemail = '$mail' LIMIT 1");
if($sql) {
    if(mysqli_num_rows($sql) == 1) {
       while($row = mysqli_fetch_assoc($sql)){
        $hashedPassword = $row['mot_de_passe'];
        if ($hashpass == $hashedPassword)
            {
                session_start();
                $_SESSION['id'] = $row['uid'];
                $_SESSION['logged'] = true;
                header('location: compte.php');
            }
            else
            {
                header('location: login.php');
            }
        }
        
}else {
    echo'erreur 1';
}
}else {
    echo "Erreur de connexion";

}




?>
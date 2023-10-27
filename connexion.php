

<?php 

    $con = mysqli_connect("localhost", "root", "", "sae303");

    if(!$con){
        echo "Vous n'êtes pas connecté à la bdd";
    }

?>
<?php
require('config.php');

if (isset($_REQUEST['username'], $_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['password'])){

    $username = $_REQUEST['username'];
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $password = $_REQUEST['password'];

    
    $query = "INSERT into `utilisateur` (username, prenom,nom, password)
                VALUES ('$username', '$prenom', '$nom', ' $password')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
             </div>";
    }
}else{}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
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
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="nom" placeholder="nom" required />
    <input type="text" class="box-input" name="prenom" placeholder="prenom" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>
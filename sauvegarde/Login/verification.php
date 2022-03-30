<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'ipdl';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    $profil = mysqli_real_escape_string($db,htmlspecialchars($_POST['profil']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              username = '".$username."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            if ($profil=='admin')
             {
               $_SESSION['username'] = $username;
               $_SESSION['profil'] = $profil;
               header('Location: ../Admin/dash_admin.php');
             }
            else if ($profil=='professeur')
             {
               $_SESSION['username'] = $username;
               $_SESSION['profil'] = $profil;
               header('Location: ../Professeur/dash_prof.php');
             }
             else if ($profil=='etudiant')
             {
                $_SESSION['username'] = $username;
                $_SESSION['profil'] = $profil;
                header('Location: ../Etudiant/dash_etu.php');
             }
             else if ($profil=='surveillant')
             {
                $_SESSION['username'] = $username;
                $_SESSION['profil'] = $profil;
                header('Location: ../Surveillant/dash_surv.php');
             }
             else
            {
               echo 'Profils non reconnu';
            }
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>
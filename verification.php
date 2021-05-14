<?php

session_start();
if(isset($_POST['name']) && isset($_POST['firstname'])&& isset($_POST['mail_Address'])&& isset($_POST['login'])&& isset($_POST['password']) && isset($_POST['Registration_date']))
{
    // connexion à la base de données
    
    require ("connexion_bdd.php"); // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase("localhost","root","","jarditou"); // Appel de la fonction de connexion
    
    $db = connexionBase("localhost","root","","jarditou")
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $name = mysqli_real_escape_string($db,htmlspecialchars($_POST['name'])); 
    $firstname = mysqli_real_escape_string($db,htmlspecialchars($_POST['firstname']));
    $mail_Address = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail_Address']));
    $login = mysqli_real_escape_string($db,htmlspecialchars($_POST['login']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    $Registration_date = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($name !== "" && $firstname !== ""&& $mail_Address !== ""&& $login !== ""&& $password !== ""&& $Registration_date !== "")
    {
        $requete = "SELECT count(*) FROM users where 
              nom = '".$name."' and prenom = '".$firstname."' and E-mail = '".$mail_Address."' and login = '".$login."' and Mot de passe = '".$password."'and Date d'inscription = '".$Registration_date."'" ;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // prise en compte de tout les champs renseigné
        {
           $_SESSION['name'] = $name;
           header('Location: principal.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // informations incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // informations vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>
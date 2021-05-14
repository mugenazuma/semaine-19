<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire de connexion</title>
    <br>
    <!-- fichier de style -->
    <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />    
    <?php
    require ("connexion_bdd.php"); // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase("localhost","root","","jarditou"); // Appel de la fonction de connexion
    
    ?>
    </head>
    
    <body>
    <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Connexion Utilisateur</h1>
                
                <label><b>Nom </b></label>
                <input type="text" placeholder="Entrer un nom " name="name" required>
                <br>
                <label><b>Prenom </b></label>
                <input type="text" placeholder="Entrer un prenom " name="firstname" required>
                <br>
                <label><b>E-mail</b></label>
                <input type="text" placeholder="Entrer une adresse mail" name="mail_Address" required>
                <br>
                <label><b>Login</b></label>
                <input type="text" placeholder="Entrer un login" name="Login" required>
                <br>
                <label><b>Mot de passe</b></label>
                <input type="text" placeholder="Entrer un mot de passe" name="password" required>
                <br>
                <label><b>Date d'inscription</b></label>
                <input type="text" placeholder="Entrer une date d'inscription" name="Registration_date" required>
                <br>
            

                <input type="submit" id='submit' value='Connexion' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
        <!--fichiers Javascript nécessaires à Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </body>
</html>
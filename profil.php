<?php
    require 'connect.php';

    if(isset($_GET["formResearch"])){
        $recherche = $_GET["recherche"];

        $requeteSearch = $database->prepare("SELECT * FROM tweet WHERE contenu LIKE '%$recherche%' ORDER BY tweet_date DESC");
        $requeteSearch -> execute();
        $tweets = $requeteSearch -> fetchAll(PDO::FETCH_ASSOC);
    }


    $requete = $database->prepare("SELECT * FROM tweet ORDER BY tweet_date DESC");
    $requete->execute();
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
        <title>Twitter</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
    <!-- Connexion -->
        <div class="header">
            <button class="twitter-btn"><a href="login.php">connexion</a></button>
    <!-- barre de recherche -->
            <form class="search-bar" action="Accueil.php" method="GET">
                <input type="hidden" name="find" value="recherche">
                <input  type="text" name="recherche" placeholder="Rechercher...">
                <button class="search-btn" type="submit">Rechercher</button>
            </form>
        </div>
        
    <!-- sidenav -->
        <button class="openbtn" onclick="openNav()"><img class="openbtn" src="./Images/menu.svg"></button>
        <div id="MySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php"><img class="img-icons" src="./Images/Home.svg" alt="Accueil">Accueil</a>
            <a href="profil.php"><img class="img-icons" src="./Images/userblanc.svg" alt="Profil">Profil</a>
        </div>

    <!--Formulaire !BOOSTRAP! -->
        <form class="form">

            <div class="form-group">
                <input type="Pseudo" class="form-control" id="exampleFormControlInput1" placeholder="Pseudo...">
            </div>

            <div class="form-group">
                <input type="Email" class="form-control" id="exampleFormControlInput1" placeholder="Email...">
            </div>

            <div class="form-group">
                <input type="Mot de passe" class="form-control" id="exampleFormControlInput1" placeholder="Mot de passe...">
            </div>

    <!-- ajouter une image !BOOSTRAP! -->
            <div class="form-group">
                <label for="exampleFormControlFile1">Image de profil</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

        </form>

    <!-- Se créer un compte -->
        <button class="co-btn"><a href="Créer_compte.php">Créer un compte</a></button>

    <script src="JS/sidenav.js"></script>
    <script src="JS/popup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    </body>
</html>
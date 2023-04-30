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

        <div class="zone-post">
    <!-- Voir les tweets -->
            <h2>Récents posts</h2>

            <?php foreach($tweets as $tweet) { ?>
                <div class="block">
                    <img class="avatar" src="./Images/user.svg">
                    <h3 class="tweet"> <?php echo $tweet['tweet_contenu'] ?> </h3>
                    <p class="tweet"> <?php echo $tweet['tweet_tag'] ?> </p>
                    <p class="tweet"> Crée le <?php echo $tweet['tweet_date'] ?> </p>
                    <button type="submit" class="trash-icon" onclick="showPopup()"><img src="./Images/Trash.svg"></button>
                    <!-- Supprimer les posts -->
                    <div id="autrepopup" style="display: none;">
                        <h2>Voulez-vous supprimer votre tweet ?</h2>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name='supprimer' value="<?php echo $tweet['tweet_id']; ?>">
                            <button type="submit" class="btn-supp">supprimer</button>
                        </form>
                        <button onclick="hidePopup()" class="btn-close">Fermer</button>
                    </div>
                </div>
            <?php } ?>
        </div>

        <button class="popup-btn" onclick="openPopup()">Tweeter</button>
        
        <div id="popup" class="tweet-post">
    <!-- Tweet -->
        <img src ="./Images/annuler.svg" class="annuler" onclick="closePopup()">
            <form class="tweet-post" action="insert.php" method="POST">
                <input type="textpost" name="tweet" id="tweet" placeholder="Nouveau post..." > 
    <!-- les tags -->
                <select class="tag" name="tag" id="tag-list">
                    <option value="Choisir un tag">Choisir un tag</option>
                    <option value="#Art">#Art</option>
                    <option value="#Voyage">#Voyage</option>
                    <option value="#Musique">#Musique</option>
                    <option value="#Cinéma">#Cinéma</option>
                    <option value="#JeuxVidéos">#JeuxVidéos</option>
                    <option value="#Actualités">#Actualités</option>
                    <option value="#Vie">#Vie</option>
                    <option value="#Merci">#Merci</option>
                </select> 
                <button type="submit" onclick="closePopup()">Publier</button>
            </form>    
        </div> 

        <script src="JS/sidenav.js"></script>
        <script src="JS/autrepopup.js"></script>
        <script src="JS/popup.js"></script>

    </body>
</html>
<?php
    require 'connect.php';

    $requete = $database->prepare("INSERT INTO tweet(tweet_contenu, tweet_tag) VALUES (:formTweet, :formTag)");
    $requete->execute(
        [
            "formTweet" => $_POST["tweet"],
            "formTag" => $_POST['tag']
        ]
    );
    header("Location: index.php");

?>


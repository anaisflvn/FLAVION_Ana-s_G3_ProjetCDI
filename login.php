<?php
    require 'connect.php';

    if (isset($_POST['submit'])) {
    
        $username = $_POST['username'];
        $password = $_POST['password'];
    
    header("Location: index.php");
}
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
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>


<body>

<!-- formulaire de connexion -->
    <form class="login-form" method="post">
        <h1 class="title">Connexion</h1>
        <label for="username"></label>
        <input type="username" name="username" placeholder="Pseudo..." id="username" required>

        <label for="email"></label>
        <input type="email" name="email" placeholder="Email..." id="email" required>

        <label for="password"></label>
        <input type="password" name="password" placeholder="Mot de passe..." id="password" required>

        <a href = "index.php"><input type="submit" name="submit" value="Se connecter"></a>
    </form>

</body>
</html>

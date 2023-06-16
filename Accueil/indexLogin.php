<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Style/User.css"/>
   

</head>

<body>

    
    <header>
    
    <img src="../Style/img/Logo$Cars.png" alt="">
    
    <menu>
        <a href="/DollarCars/Acceuil/indexHome.php">Accueil</a>
        <a href="/Models/Cars.php">Voitures</a>
    </menu>
    </header>

    

    <div class="formconnect">
        
        <h2>  Connectez-vous</h2>
        <form action="/Accueil/indexLogin.php" method="POST" class="formconnect2">
            <input type="text" id="Username" name="Username" placeholder="Identifiant" required />
            <input type="text" id="password" name="password" placeholder="Mot-de-passe" required />
            <input type="text" id="email" name="email" placeholder="Email" required />

            <button type="submit" value="Connection">Connection</button>
        </form>
        
    </div>

    <?php

   // include_once __DIR__ . "\DollarCars\Models\User.php";

    //use DollarCars\Models\User;

   // if ($_SERVER) {
    //    $connected = $new(
   //         $_POST["username"],
   //         $_POST["password"],
    //        $_POST["email"],
            

   //     );
    //    $connected->displayAnnonce();
    //} ?>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>
</body>

</html>
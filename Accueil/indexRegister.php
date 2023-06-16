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
        <a href="../Accueil/indexHome.php">Accueil</a>
        <a href="../Accueil/indexLogin.php">Connexion</a>
    </menu>
    </header>

    

    <div class="formconnect">
        
        <h2> Inscrivez-vous</h2>
        <form action="/Accueil/indexRegister.php" method="POST" class="formconnect2">
             <input type="text" id="nom" name="nom" placeholder="Nom" required />
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required />
            <input type="text" id="email" name="email" placeholder="Email" required />
            <input type="password" id="password" name="password" placeholder="Mot-de-passe" required />
            

            <button type="submit" value="Connection">Valider</button>
        </form>
        
    </div>

    <?php

   include_once __DIR__ . "\DollarCars\Models\User.php";

   


   if ($_SERVER) {
        $connected = new USER(
           $_POST["nom"],
           $_POST["prenom"],
            $_POST["email"],
            $_POST["password"],
            

       );
    }
       $connected->displayAnnonce();
     ?>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>
</body>

</html>
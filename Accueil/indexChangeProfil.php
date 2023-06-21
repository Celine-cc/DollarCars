<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChangeProfil</title>
    <link rel="stylesheet" href="../Style/ChangeProfil.css" />


</head>

<body>


    <header>
        <img src="../Style/img/Logo3.jpeg" alt="">

        <menu>
            <a href="../Accueil/indexHome.php">Accueil</a>
        </menu>
    </header>

    <div class="formWrapper">
        
        <h1> Profil</h1>
        <h3>Modification de votre profil utilisateur</h3>
      
        <form action="/DollarCars/Accueil/indexChangeProfil.php" method="POST" class="formprofil">
            <input type="text" name="nom" placeholder="Nom" required />
            <input type="text" name="prenom" placeholder="Prénom" required /> 
            <input type="text" name="email" placeholder="Email" required /> 
            <input type="text" name="password" placeholder="Mot-de-passe" required />   
        </form>
        <div class="allbtn">
            <button type="submit" value="Connection">Modifier mon profil</button>
            <button type="submit" value="Connection">Annuler</button>
        </div>
    </div>


    <footer>


        <h4>Pour tout renseignement complémentaire contactez-nous :</h4>
        <div>
            <span>📮 123 Bocal, 06000 Nice</span>
            <span>📞 06.00.34.34.54</span>
            <span>📩 $Cars@societe$Cars.fr</span>
        </div>
       

</footer>
  
 

</body>

</html>
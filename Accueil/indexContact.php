<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Style/Contact.css" />


</head>

<body>


    <header>

        <img src="../Style/img/Logo$Cars.png" alt="">

        <menu>
            <a href="../Accueil/indexHome.php">Accueil</a>
        </menu>
    </header>



    <div class="formcontact">

        <h2> Contact-nous</h2>
        <p>Remplissez le formulaire pour une prise de contact avec nous pour toutes informations ou autres demandes de votre part.</p>
        <div>
            <span>123 Bocal, 06000 Nice</span>
            <span>06.00.34.34.54</span>
            <span>$Cars@societe$Cars.fr</span>
        </div>
        <form action="/DollarCars/Accueil/indexContact.php" method="POST" class="formcontact1">
            <input type="text" name="name" placeholder="Nom" required />
            <input type="text" name="email" placeholder="Email" required /> 
            <input type="textarea" name="text" placeholder="Ecrivez votre requête ici" required />
          


            <button type="submit" value="Connection">Soumettre</button>
        </form>

    </div>
  


</body>

</html>
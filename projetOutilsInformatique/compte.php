<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);


?>

<!DOCTYPE html>
<html>
<html lang="fr">
  <head>
    <title>Vente de Billets</title>
    <link rel="stylesheet" href="compte.css">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBKBtGJlT_jSr1DaLRwApuU4ouGr2ModSOrQ&usqp=CAU">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
    <a href="page acceuil.html">
      <h1>SeatBooker</h1>
    </a>
    <input type="search" id="recherche" size="55" placeholder="Chercher des Evénement">
    
    <nav>
      <ul>
        <li><a href="page acceuil.html">Accueil</a></li>
        <li><a href="Ticket Sales.html">Billet de Concert</a></li>
        <li><a href="Théatre.html">Billet de Théâtre</a></li>
        <li><a href="Sport.html">Billet de Sport</a></li>
        <li><a href="#">Panier</a></li>
        <li><a href="compte.php">Mon Compte</a></li>
    
      </ul>
    </nav>
  </header>
    <body>
        <div class="information">
            <h1>Mon compte</h1>
            <p>Bonjour, <?php echo $user_data['user_name']; ?></p>

            <a id="logout" href="logout.php">Se déconnecter</a>
        </div>
    </body>

    <footer>
      <p>Durée Limitée</p>
    </footer>
     

</html>
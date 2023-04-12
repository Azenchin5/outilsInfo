<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] == $password){

                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: compte.php");
                        die;

                    }
                }
            }
           

            echo "Wrong username or password";
    }
            
        else{
            echo "Wrong username or password";
        }

}


?>



<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Vente de Billets</title>
    <link rel="stylesheet" href="login.css">
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
  <div class="compte">
    <div class="login">
        <h1>Authentification</h1>
        <form name="connexion" method="post">

            <input type="text" name="user_name" id="emailconnexion" size="50" placeholder="Nom d'utilisateur"/><br>
            <input type="password" name="password" id="passwordconnexion" size="50" placeholder="Mot De Passe"/><br><br>
            
            <input type="checkbox" id="check1"/>Se souvenir de moi<br>
          
            <input type="submit" name="login" id="login1" size="50" value="Se Connecter"><br><br>

        </form>

        <div class="otherlogin">
          <p>Autres méthodes de connexion</p><br><br>
          <a href="https://fr-fr.facebook.com/"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" /> </a>
          <a href="https://accounts.google.com/ServiceLogin?hl=fr"> <img src="data:image/png;base64,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"/> </a>
        </div>

        <br><br><br><br><br><a id="inscrit" href="signup.php">S'inscrire</a>
        
    </div>

   

    <div class="loginimage">
        <img src="https://media.timeout.com/images/105948176/750/562/image.jpg" alt="event" height="650px" width="800px">
    </div>

</div>
    
    <footer>
      <p>Durée Limitée</p>
    </footer>
  </body>
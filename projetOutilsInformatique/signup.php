<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

            //save to database
            $user_id = random_num(20);
            $query = "insert users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;


        }

        else{
            echo "Please enter some Valide information!";
        }

    }
    



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="login.css">
        <script type="text/javascript" src="compte.js"></script>
    </head>
    <body onload="javascript:refreshCaptcha()">
        <div id="box">
            <form method="post">

                <div class="login1">Signup</div>

                <input id="text" type="text" name="user_name"><br><br>
                <input id="text" type="password" name="password"><br><br>

                <input id="button" type="submit" value="signup"><br><br>
 
                <a href="login.php">Click to Login</a><br><br>

                <canvas id="captcha" width="348" height="100"></canvas>
                <br>
                <p>Veuillez entrer le code ci-dessus:</p>
                <input type="text" id="captcha-input" size="30">

                <button onclick="verifyCaptcha('captcha-input')" id="submit1">Envoyer</button>
                <button onclick="refreshCaptcha()" id="refresh">Rafraichir</button>


            </form>
        </div>

    </body>
</html>
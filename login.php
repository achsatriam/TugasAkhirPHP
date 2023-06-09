<?php
    include_once("env.php");

    session_start();
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($mysqli, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

        if($result->num_rows == 1){
            $_SESSION['login'] = 'masuk';
            header('Location: home.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">   
        <div class="card">
            <form action="" method="post">
                <div class="center">
                    <h1>Login</h1>
                </div>
                <div class="padding">
                    <input class="input" type="text" placeholder="username" id="username" name="username"><br>
                </div>
                <div class="padding">   
                    <input class="input" type="password" placeholder="password" id="password" name="password"><br>
                </div>
                <div class="submit">
                    <button name="submit" id="submit" type="submit" class="button">Submit</button>
                </div>
                <div>
                    <p class="center">don't have any account? <a href="register.php">Sign Up</a> </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    require_once('env.php');

    $created = false;

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (isset($username) && isset($password)) {
            $result = mysqli_query($mysqli, "INSERT INTO admin(username, password) VALUES('$username', '$password')");
        }

        $created = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">   
        <div class="card">
            <form action="" method="post">
                <div class="center">
                    <h1>Register</h1>
                </div>
                <div class="padding">
                    <input class="input" type="text" placeholder="username" id="username" name="username"><br>
                </div>
                <div class="padding">   
                    <input class="input" type="password" placeholder="password" id="password" name="password"><br>
                </div>
                <?php if($created == true): ?>
                    <p style="margin: 10px 0 0 0; display:block">Register successfully. <a href="home.php">Login?</a></p>
                <?php endif; ?>
                <div class="submit">
                    <button type="submit" name="submit" id="submit" class="button">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
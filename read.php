<?php
$id = $_GET['id'];

include_once("env.php");

$result = mysqli_query($mysqli, "SELECT * FROM data WHERE id='$id' ");

while($user_data = mysqli_fetch_array($result))
{

    $name = $user_data['name'];
    $pass = $user_data['password'];
    $image = $user_data["image"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <a href="home.php"><button class="button-user" >Home</button></a>
    <div class="containertable">   
        <div class="tablecard">
            <div style="display:flex; align-items:center; gap:50px;">
                <div>
                    <img style="width: 300px;" src="img/<?= $image?>" alt="">
                </div>
                <div style="width: 65%;">
                    <p>Nama : </p>
                    <p><?= $name?></p>
                    <p>Password : </p>
                    <p><?= $pass?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
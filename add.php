<?php
    $created = false;

    if(isset($_POST['submit'])) {

        $name = $_POST["name"];
        $pass = $_POST["password"];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        
        include_once("env.php");  

        $namaFile = $_FILES['image']['name'];
        $ukuranFile = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $ekstensiImageValid = ['jpg', 'jpeg', 'png'];
        $ekstensiImage = explode('.', $namaFile);
        $ekstensiImage = strtolower(end($ekstensiImage));

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiImage;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        
        $result = mysqli_query($mysqli,"INSERT INTO data(name, password, image) VALUES('$name','$pass','$namaFileBaru')");

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
    <title>Add</title>
</head>
<body>
    <a href="home.php"><button class="button-user" >Home</button></a>
    <form action="add.php" enctype="multipart/form-data" method="post" name="form1">
        <table>
            <div class="containertable">   
                <div class="tablecard">
                    <div class="center">
                        <h1>Create</h1>
                    </div>
                    <div class="form-content">
                        <div class="submit">
                            <label for="name">Nama:</label><br>
                            <input class="input" type="text" name="name" id="name">
                        </div>
                        <div class="submit">
                            <label for="pass">password:</label> 
                            <input class="input" type="password" name="password" id="pass">
                        </div>
                        <div class="submit">
                            <label for="image">Image:</label>
                            <input class="input" type="file" name="image" id="image">
                        </div>
                        <?php if($created == true): ?>
                            <p style="margin: 35px 0 0 0; display:block">User added successfully. <a href="home.php">View User</a></p>
                        <?php endif; ?>
                        <div class="submit">
                            <button class="button" type="input" name="submit">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </form>
</body>
</html>
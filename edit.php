<?php
$created = false;

include_once("env.php");

if(isset($_POST['update'])) 
{	
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    md5($_POST['password']);

    if (count($_FILES) !== 0) {
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
        $image = $namaFileBaru;
    } else {
        $image = $_POST['imageLama'];
    }

    
    $result = mysqli_query($mysqli, "UPDATE data SET name='$name',password='$pass',image='$image' WHERE id='$id' ");
    
    header("Location: home.php");

    $created = false;
}
?>

<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM data WHERE id='$id' ");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['name'];
    $pass = $user_data['password'];
    $imageLama = $user_data['image'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <a href="home.php"><button class="button-user" >Home</button></a>
    <form action="edit.php" method="post" enctype="multipart/form-data" name="update_user">
        <table> 
            <div class="containertable">   
                <div class="tablecard">
                    <div class="center">
                        <h1>Edit</h1>
                    </div>
                    <div class="form-content">
                        <input type="hidden" name="imageLama" value="<?= $imageLama ?>">
                        <div class="submit">
                            <label for="name">Nama:</label><br>
                            <input required class="input" value="<?= $name; ?>" type="text" name="name">
                        </div>
                        <div class="submit">
                            <label for="pass">password:</label> 
                            <input required class="input" value="<?= $pass; ?>" type="text" name="password">
                        </div>
                        <div class="submit">
                            <label for="image">Image:</label>
                            <input class="input" type="file" name="image">
                        </div>
                        <div class="submit">
                            <img style="width: 100%;" src="img/<?=$imageLama ?>" alt="">
                        </div>
                        <?php if($created == true): ?>
                        <p style="margin: 35px 0 0 0; display:block">User added successfully. <a href="home.php">View User</a></p>
                        <?php endif; ?>
                        <div class="submit">
                            <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
                            <input class="button" type="submit" name="update" value="Update" role="button">
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </form>
</body>
</html>
<?php
include_once("env.php");

session_start();

if(!isset($_SESSION['login'])){
    header('Location: login.php');
}

$result = mysqli_query($mysqli, "SELECT * FROM data ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
    <body>
        <div style="width: 100%; display:flex; justify-content:space-between">
            <a href="add.php"><button class="button-user" >Add</button></a>
            <a href="logout.php"><button class="button-user" >Logout</button></a>
        </div>
        <div class="containertable">
                <div class="tablecard-home">
                    <table class="padding" width="100%"  style="border-collapse: collapse;">
                        <tr>
                            <th>No</th> 
                            <th>Nama</th>
                            <th>foto</th>
                            <th>Action</th>
                        </tr>
                        <?php $i=1?>
                        <?php while($user_data = mysqli_fetch_array($result)): ?>
                            <tr >
                                <td class="center" style="width: 10%">
                                    <?= $i; ?>
                                </td>
                                <td class="center" style="width: 31%;">
                                    <?= $user_data['name']; ?>
                                </td>
                                <td class="center" style="width: 40%;">
                                    <?= $user_data['image']?>
                                </td>
                                <td class="center" style="padding: 8px 0; width: 19%">
                                    <div class="d-flex" style="display:flex; gap: 18px; justify-content:center">
                                    <a class="text-action" href='read.php?id=<?= $user_data['id']?>'>
                                        <button class="btn-action" style="padding-top: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </button>
                                    </a>
                                    <a class="text-action" href='edit.php?id=<?= $user_data['id']?>'>
                                        <button class="btn-action" style="padding-top: 10px;">
                                            <svg xmlns="http://wwzw.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>
                                    </a>
                                    <a class="text-action" href='delete.php?id=<?= $user_data['id']?>'>
                                        <button class="btn-action" style="padding-top: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            <?php endwhile; ?>
                    </table>
                </div>
        </div>
    </body>
    </html>
<?php
include_once("env.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM data WHERE id=$id");

header("Location:home.php");
?>
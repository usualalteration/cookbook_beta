<?php
    require "connessione.php";
    $title = mysqli_real_escape_string($conn,$POST['title']);
    $ingredienti = mysqli_real_escape_string($conn,$POST['ingredients']);
    $title = mysqli_real_escape_string($conn,$POST['method']);
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $path = 'img/'.$foto;

    move_uploaded_file($tmp_name, $path);

    $sql = "INSERT INTO recipes (title,photo,ingredients,method)
    VALUES ('$title','$path','$ingredients','$method')";
?>
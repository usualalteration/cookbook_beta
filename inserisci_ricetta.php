<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php
            $errors=array();
            require "connessione.php";
            $title = mysqli_real_escape_string($conn,$POST['recipe_name']);
            $photo = $_FILES['photo']['name'];
            $ingredients = mysqli_real_escape_string($conn,$POST['ingredients']);
            $method = mysqli_real_escape_string($conn,$POST['method']);
            $tmp_name = $_FILES['photo']['tmp_name'];
            $path = 'img/'.$foto;

            move_uploaded_file($tmp_name, $path);

            $sql = "INSERT INTO recipes (recipe_name,photo,ingredients,method)
            VALUES ('$title','$path','$ingredients','$method')";
            mysqli_close($conn);
            header('Location: index.php');
            exit();
        ?>
    </body>
</html>
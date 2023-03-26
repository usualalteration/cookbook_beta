<?php
require "connessione.php";

if(isset($_POST['submit'])) {
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $method = $_POST['method'];
    $recipe_id = $_POST['recipe_id'];
    $photo = '';

    if(isset($_FILES['photo'])) {
        $file_name = $_FILES['photo']['name'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_ext = strtolower(end(explode('.',$file_name)));
        $extensions = array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions) === false){
            $errors[] = "Estensione del file non consentita, scegliere un file JPEG o PNG.";
        }

        if(empty($errors)) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
            $photo = "images/" . $file_name;
        }
    }

    if(!empty($recipe_name) && !empty($ingredients) && !empty($method)) {
        $sql = "UPDATE recipes SET title='$recipe_name', ingredients='$ingredients', method='$method'";
        if(!empty($photo)) {
            $sql .= ", photo='$photo'";
        }
        $sql .= " WHERE id='$recipe_id'";

        if(mysqli_query($conn, $sql)) {
            echo "Dati della ricetta aggiornati con successo!";
        }
        
        else
        {
            echo "Errore nell'aggiornamento dei dati della ricetta: " . mysqli_error($conn);
        }
    }
    
    else
    {
        echo "Per favore, inserisci tutti i campi obbligatori.";
    }
}

mysqli_close($conn);
?>
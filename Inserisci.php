<!DOCTYPE html>
<html>

	<head>
	</head>

	<body>
		<form name="module" method="post">
			Nome ricetta: <input type="text" name="recipe_name"><br><br>
			<!--Tipo: <br>
				<input type="radio" name="kind">Primo<br>
				<input type="radio" name="kind">Secondo<br>
				<input type="radio" name="kind">Dolce<br><br>-->
			<input type="file" name="image"><br>
			Ingredienti: <input type="text" name="ingredients"><br>
			Procedimento: <input type="text" name="method"><br>
			<input type="submit" value="invia">
		</form>
		<?php
		$con = new mysqli("localhost", "root", "", "cookbook");
		if (mysqli_connect_errno()) {
			echo ("Errore di connessione");
			exit();
		}

		if(isset($_POST['recipe_name'])){
			$recipe_name = $POST["recipe_name"];
			$image = $FILES["image"]["name"];
			$ingredients = $POST["ingredients"];
			$method = $POST["method"];

			$sql = "INSERT INTO recipes(recipe_name,image,ingredients,method) VALUES ('$recipe_name','$image','$ingredients,'$method')";
			if ($con->query($sql) === TRUE){
				echo "Ricetta inserita con successo!";
			}
			else{
				echo "Errore durante l'inserimento della ricetta.";
			}
			$con->close();
		}
		?>
	</body>
</html>
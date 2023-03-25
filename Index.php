<html>
	<head>
	</head>
	<body>
		<form name="module" method="post" action="foreach.php">
			Nome ricetta: <input type="text" name="recipe_name"><br><br>
			Tipo: <br>
			<input type="radio" name="kind">Primo<br>
			<input type="radio" name="kind">Secondo<br>
			<input type="radio" name="kind">Dolce<br><br>
			<input type="file" name="image"><br>
			Ingredienti: <input type="text" name="ingredients"><br>
			Procedimento: <input type="text" name="method"><br>
		</form>   
		<?php
			
		?>
	</body>
</html>

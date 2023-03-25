<html>
	<head>
	</head>
	<body>
		<form name="module" method="post" action="foreach.php">
			Nome ricetta: <input type="text" name="recipe_name"><br><br>
			Tipo: <br>
			<input type="radio" name="tipo_ricetta">Primo<br>
			<input type="radio" name="tipo_ricetta">Secondo<br>
			<input type="radio" name="tipo_ricetta">Dolce<br>
			<!--TODO: foto-->
			Ingredienti: <input type="text" name="ingredients"><br>
			Procedimento: <input type="text" name="method"><br>
		</form>   
		<?php
			
		?>
	</body>
</html>

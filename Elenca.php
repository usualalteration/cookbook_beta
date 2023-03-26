<?php
//Creazione oggetto mysqli per realizzare la connessione 
$con = new mysqli("localhost","root","","cookbook");
if (mysqli_connect_errno()) {
    echo("Connessione non effettuata: ".mysqli_connect_error()."<BR>");
    exit();
}
//Definizione stringa contenente comando SQL
$sql = "SELECT id_recipe,recipe_name,id_image.filename,ingredients,method FROM recipes";
//Esecuzione query che restituisce $ris
$ris = $con->query($sql) or die ("Query fallita!");
//Ciclo foreach legge gli elementi del resultset $ris
foreach($ris as $riga) 
{
    echo "<TR><TD>".$riga["id_recipe"];
    echo "<TD>".$riga["recipe_name"];
    echo "<TD>".$riga["id_image.filename"];
    echo "<TD>".$riga["ingredients"];
    echo "<TD>".$riga["method"];
}
//rilascio connessione
$con->close();
?>


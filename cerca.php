<form method="post" action="cerca.php">
    <input type="text" name="text" /><br/>
    <input type="submit" value="search"/>
    </form>

<h2 class="header">Risultati della tua ricerca</h2>
<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "cookbook";

$conn= mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connessione non riuscita");
}

$sql_search = "SELECT * FROM recipes WHERE recipe_name LIKE '%'";

$result = mysqli_query($conn,$sql_search);

    while ($row = mysqli_fetch_assoc($result))
    {

        echo "<tr>";
        echo "<td>",$row["recipe_name"],"</td>";
        echo "<td><img src='" . $row["photo"] . "'/></td>";
        echo "<td>",$row["ingredients"],"</td>";
        echo "<td>",$row["method"],"</td>";
        echo "</tr>";


    }
?>
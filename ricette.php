<table>
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Foto</th>
            <th>Ingredienti</th>
            <th>Preparazione</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require "connessione.php";
        $sql = "SELECT * FROM recipes";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td><img src='".$row['photo']."'></td>";
            echo "<td>" . $row['ingredients'] . "</td>";
            echo "<td>" . $row['method'] . "</td>";
            echo "<td>";
            echo "<a href='modifica_ricetta.php?recipe_id=" . $row['id']. "'>Modifica</a>" . "</td>";
            echo "<tr>";
        }
        ?>
    </tbody>
</table>

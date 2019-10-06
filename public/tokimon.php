<!DOCTYPE html>
<html>
    <head>
        <link href="stylesheets/a2style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <h1> TokiPedia </h1>
        <?php
            $conn = pg_connect("host=localhost user=postgres password=1234 dbname=users");
            $result = pg_query($conn, "SELECT * FROM users2");

            echo "<table>";
            while($row = pg_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
            }
            echo "</table>";

            pg_close($conn);
        ?>
    </body>
</html>


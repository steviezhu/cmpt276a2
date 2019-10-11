<!DOCTYPE html>
<html>
    <head>
        <link href="stylesheets/a2style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <h1> TokiPedia </h1>
        <?php
            $conn = pg_connect('host=localhost dbname=postgres user=postgres password=1234');
            if($conn->connect_error){
                die("Connection failed: ");
            }
            $result = pg_query($conn, "SELECT * FROM users");

            echo "<table>";
            while($row = pg_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
            }
            echo "</table>";

            $conn->close();
        ?>
    </body>
</html>



<?php
    $conn = pg_connect("host=localhost user=postgres password=1234 dbname=tokimon_database");

    $result = pg_query($conn, "SELECT * FROM tokimon_table");

    echo "<h1> Table of All Tokimon in Database </h1>";

    echo "<table class='display_table'>";
    echo "<tr>";
    echo "<th> Name </th>";
    echo "<th> Weight </th>";
    echo "<th> Height </th>";
    echo "<th> Fly </th>";
    echo "<th> Fight </th>";
    echo "<th> Fire </th>";
    echo "<th> Water </th>";
    echo "<th> Electric </th>";
    echo "<th> Ice </th>";
    echo "<th> Total </th>";
    echo "<th> Trainer's Name </th>";
    while($row = pg_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["weight"] . "</td>";
        echo "<td>" . $row["height"] . "</td>";
        echo "<td>" . $row["fly"] . "</td>";
        echo "<td>" . $row["fight"] . "</td>";
        echo "<td>" . $row["fire"] . "</td>";
        echo "<td>" . $row["water"] . "</td>";
        echo "<td>" . $row["electric"] . "</td>";
        echo "<td>" . $row["ice"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "<td>" . $row["trainer_name"] . "</td>";
    }
    echo "</table> <br>";
    
    pg_close($conn);
?>

<html>
    <style type="text/css">
        body{
            background-image: url("stylesheets/background.jpg");
            background-size: cover;
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        .display_table{
            border: 3px solid black;
            border-collapse: collapse;
        }
        th{
            padding: 5px;
        }
        td,th,tr{
            border: 2px solid black;
            border-collapse: collapse;
        }
    </style>

    <body>
        <script>
        function goBack(){
            window.history.back();
        }
        </script>
        <form action="sort.php" method="post">
        <select name="sortBy">
            <option value="0"> Select... </option>
            <option value="ascName"> Ascending Name </option>
            <option value="dscName"> Descending Name </option>
            <option value="ascWeight"> Ascending Weight </option>
            <option value="dscWeight"> Descending Weight </option>
            <option value="ascHeight"> Ascending Height </option>
            <option value="dscHeight"> Descending Height </option>
            <option value="ascFly"> Ascending Fly </option>
            <option value="dscFly"> Descending Fly </option>
            <option value="ascFight"> Ascending Fight </option>
            <option value="dscFight"> Descending Fight </option>
            <option value="ascFire"> Ascending Fire </option>
            <option value="dscFire"> Descending Fire </option>
            <option value="ascWater"> Ascending Water </option>
            <option value="dscWater"> Descending Water </option>
            <option value="ascElectric"> Ascending Electric </option>
            <option value="dscElectric"> Descending Electric </option>
            <option value="ascIce"> Ascending Ice </option>
            <option value="dscIce"> Descending Ice </option>
            <option value="ascTotal"> Ascending Total </option>
            <option value="dscTotal"> Descending Total </option>
            <option value="ascTrainer"> Ascending Trainer's Name </option>
            <option value="dscTrainer"> Descending Trainer's Name </option>
        </select>
        <input type="submit" value="Display Sorted">
        </form>
        
        <p> Press the button below to return to the main page. </p>
        <button onclick="goBack()"> Main Page </button>
    </body>
</html>
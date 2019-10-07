<?php
    $conn = pg_connect("host=localhost user=postgres password=1234 dbname=tokimon_database");

    $sortValue = $_POST['sortBy'];

    if($sortValue == "ascName"){
        $query = "SELECT * FROM tokimon_table ORDER BY name ASC;";
    }
    if($sortValue == "dscName"){
        $query = "SELECT * FROM tokimon_table ORDER BY name DESC;";
    }
    if($sortValue == "ascWeight"){
        $query = "SELECT * FROM tokimon_table ORDER BY weight ASC;";
    }
    if($sortValue == "dscWeight"){
        $query = "SELECT * FROM tokimon_table ORDER BY weight DESC;";
    }
    if($sortValue == "ascHeight"){
        $query = "SELECT * FROM tokimon_table ORDER BY height ASC;";
    }
    if($sortValue == "dscHeight"){
        $query = "SELECT * FROM tokimon_table ORDER BY height DESC;";
    }
    if($sortValue == "ascFly"){
        $query = "SELECT * FROM tokimon_table ORDER BY fly ASC;";
    }
    if($sortValue == "dscFly"){
        $query = "SELECT * FROM tokimon_table ORDER BY fly DESC;";
    }
    if($sortValue == "ascFight"){
        $query = "SELECT * FROM tokimon_table ORDER BY fight ASC;";
    }
    if($sortValue == "dscFight"){
        $query = "SELECT * FROM tokimon_table ORDER BY fight DESC;";
    }
    if($sortValue == "ascFire"){
        $query = "SELECT * FROM tokimon_table ORDER BY fire ASC;";
    }
    if($sortValue == "dscFire"){
        $query = "SELECT * FROM tokimon_table ORDER BY fire DESC;";
    }
    if($sortValue == "ascWater"){
        $query = "SELECT * FROM tokimon_table ORDER BY water ASC;";
    }
    if($sortValue == "dscWater"){
        $query = "SELECT * FROM tokimon_table ORDER BY water DESC;";
    }
    if($sortValue == "ascElectric"){
        $query = "SELECT * FROM tokimon_table ORDER BY electric ASC;";
    }
    if($sortValue == "dscElectric"){
        $query = "SELECT * FROM tokimon_table ORDER BY electric DESC;";
    }
    if($sortValue == "ascIce"){
        $query = "SELECT * FROM tokimon_table ORDER BY ice ASC;";
    }
    if($sortValue == "dscIce"){
        $query = "SELECT * FROM tokimon_table ORDER BY ice DESC;";
    }
    if($sortValue == "ascTotal"){
        $query = "SELECT * FROM tokimon_table ORDER BY total ASC;";
    }
    if($sortValue == "dscTotal"){
        $query = "SELECT * FROM tokimon_table ORDER BY total DESC;";
    }
    if($sortValue == "ascTrainer"){
        $query = "SELECT * FROM tokimon_table ORDER BY trainer_name ASC;";
    }
    if($sortValue == "dscTrainer"){
        $query = "SELECT * FROM tokimon_table ORDER BY trainer_name DESC;";
    }

    $result = pg_query($conn, $query);
    $sortedResult = pg_query($conn, "SELECT * FROM tokimon_table");
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

        <p> Press the button below to return to the display page. </p>
        <p> Keep in mind these changes will not be preserved in the database. </p>
        <button onclick="goBack()"> Display Page </button>
    </body>
</html>
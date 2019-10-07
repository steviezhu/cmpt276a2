<?php
    $conn = pg_connect("host=localhost user=postgres password=1234 dbname=tokimon_database");

    $tokiName = $_POST['tokiName'];
    $tokiWeight = $_POST['tokiWeight'];
    $tokiHeight = $_POST['tokiHeight'];
    $tokiFly = $_POST['tokiFly'];
    $tokiFight = $_POST['tokiFight'];
    $tokiFire = $_POST['tokiFire'];
    $tokiWater = $_POST['tokiWater'];
    $tokiElectric = $_POST['tokiElectric'];
    $tokiIce = $_POST['tokiIce'];
    $tokiTotal = $_POST['tokiTotal'];
    $tokiTrainer = $_POST['tokiTrainer'];

    $query = "SELECT name FROM tokimon_table WHERE name='$tokiName'";
    $result = pg_query($conn, $query);

    if(pg_num_rows($result) > 0){
        echo "Tokimon exists, updating values <br> <br>";
    }
    else{
        echo "Tokimon does not exist. If you would like to add a new Tokimon, please use the first form on the main page! <br> <br>";
    }

    if($tokiWeight){
        $query = "UPDATE tokimon_table SET weight = $tokiWeight WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Weight has been updated <br>";
    }

    if($tokiHeight){
        $query = "UPDATE tokimon_table SET height = $tokiHeight WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Height has been updated <br>";
    }

    if($tokiFly){
        $query = "UPDATE tokimon_table SET fly = $tokiFly WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Fly power has been updated <br>";
    }

    if($tokiFight){
        $query = "UPDATE tokimon_table SET fight = $tokiFight WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Fight power has been updated <br>";
    }

    if($tokiFire){
        $query = "UPDATE tokimon_table SET fire = $tokiFire WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Fire power has been updated <br>";
    }

    if($tokiWater){
        $query = "UPDATE tokimon_table SET water = $tokiWater WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Water power has been updated <br>";
    }

    if($tokiElectric){
        $query = "UPDATE tokimon_table SET electric = $tokiElectric WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Electric power has been updated <br>";
    }

    if($tokiIce){
        $query = "UPDATE tokimon_table SET ice = $tokiIce WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Ice power has been updated <br>";
    }

    if($tokiTotal){
        $query = "UPDATE tokimon_table SET total = $tokiTotal WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Total power has been updated <br>";
    }

    if($tokiTrainer){
        $query = "UPDATE tokimon_table SET trainer_name = '$tokiTrainer' WHERE name ='$tokiName'";
        $result = pg_query($conn, $query);
        echo "Trainer has been updated <br> <br>";
    }

    echo "Press the button below to return to the main page <br>";
    
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
    </style>

    <body>
        <script>
        function goBack(){
            window.history.back();
        }
        </script>
        <button onclick="goBack()"> Main Page </button>
    </body>
</html>
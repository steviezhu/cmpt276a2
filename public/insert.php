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

    $query = ("INSERT INTO tokimon_table(name, weight, height, fly, fight, fire, water, electric, ice, total, trainer_name)
                VALUES ('$tokiName', '$tokiWeight', '$tokiHeight', '$tokiFly', '$tokiFight', '$tokiFire', '$tokiWater', '$tokiElectric', '$tokiIce', '$tokiTotal', '$tokiTrainer')");

    $result = pg_query($conn, $query);

    if($result){
        echo "Entry inserted successfully";
        echo "<br>";
    }
    else{
        echo "Entry not inserted";
        echo "<br>";
    }

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

        <p> Press the button below to return to the main page. </p>
        <button onclick="goBack()"> Main Page </button>
    </body>
</html>
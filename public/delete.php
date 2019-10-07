<?php
    $conn = pg_connect("host=localhost user=postgres password=1234 dbname=tokimon_database");

    $tokiName = $_POST['tokiName'];

    $query = "SELECT name FROM tokimon_table WHERE name='$tokiName'";
    $result = pg_query($conn, $query);

    if(pg_num_rows($result) > 0){
        echo "Tokimon exists, deleting <br> <br>";
        $query = "DELETE FROM tokimon_table WHERE name = '$tokiName'";
        $result = pg_query($conn, $query);
        echo "Tokimon has been deleted <br>";
    }
    else{
        echo "Tokimon does not exist. If you would like to add a new Tokimon, please use the first form on the main page! <br> <br>";
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
<?php
    $conn = pg_connect("host=localhost user=postgres password=1234 dbname=tokimon_database");

    $result = pg_query($conn, "TRUNCATE tokimon_table");

    echo "Database has been cleared.";
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
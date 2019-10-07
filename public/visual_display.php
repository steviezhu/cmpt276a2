<?php
    $conn = pg_connect("host=localhost user=postgres password=1234 dbname=tokimon_database");

    $result = pg_query($conn, "SELECT * FROM tokimon_table");

    $x1 = 0;
    $y1 = 0;
    $canvas = imagecreatetruecolor(200,200);
    $black = imagecolorallocate($canvas, 0, 0, 0);

    while($row = pg_fetch_array($result)){
        echo $row["name"];
        imagerectangle($canvas, $x1, $y1, $row["weight"], $row["height"], $black);
    }

?>
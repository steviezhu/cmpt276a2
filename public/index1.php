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
            pg_close($conn);
?>
<?php
    session_start();
    require_once "config.php";
    $id = $_SESSION["id"];
    $query = sprintf("SELECT carbon_output, date, CAST(REPLACE(distance, ' km', '') AS decimal(10,1)) as distance FROM journeys WHERE userid = $id AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()) ORDER BY distance ASC");
    $result = $link->query($query);

    $data = array();

    foreach ($result as $row){
        $data[] = $row;
    }
    $result->close();
    $link->close();
    print json_encode($data);
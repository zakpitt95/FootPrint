<?php
    session_start();
    require_once "config.php";
    $id = $_SESSION["id"];
    $query = sprintf("SELECT SUM(carbon_output) AS carbon_output, date FROM journeys WHERE userid = $id AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()) GROUP BY date ORDER BY date ASC");
    $result = $link->query($query);

    $data = array();

    foreach ($result as $row){
        $data[] = $row;
    }
    $result->close();
    $link->close();
    print json_encode($data);

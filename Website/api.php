<?php
session_start();
require_once "config.php";
if(isset($_POST['search'])){
    $search = $_POST['search'];
    $id = $_SESSION["id"];
    $query = "SELECT CONCAT(name, ', ', street, ', ', city) AS name FROM shops WHERE name LIKE '%".$search."%' OR street LIKE '%".$search."%' OR city LIKE '%".$search."%' AND userid = '%".$id."%'";
    $result = mysqli_query($link, $query);
    $response = array();

    while($row = mysqli_fetch_array($result)){
        $response[] = array("label"=>$row['name']);
    }
    echo json_encode($response);

}
?>
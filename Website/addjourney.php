<?php
session_start();
require_once "config.php";
if (isset($_GET['submit'])) {
  $origin = $_GET['origin'];
  $destination = $_GET['destination'];
  $distance = $_GET['distance'];
  $duration = $_GET['duration'];
  $carbonoutput = $_GET['carbonoutput'];
  $vehicle = $_GET['vehicle'];
  $id = $_SESSION["id"];

  $sql = "INSERT INTO journeys (origin, destination, distance, duration, carbon_output, vehicle, userid, date, time) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
  if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssssss", $param_origin, $param_destination, $param_distance, $param_duration, $param_carbon_output, $param_vehicle, $param_userid);

    // Set parameters
    $param_origin = $origin;
    $param_destination = $destination;
    $param_distance = $distance;
    $param_duration = $duration;
    $param_carbon_output = $carbonoutput;
    $param_vehicle = $vehicle;
    $param_userid = $id;

    // Attempt to execute the prepared statement

    if (mysqli_stmt_execute($stmt)) {

      // Redirect to login page


    } else {
    }
    mysqli_stmt_close($stmt);
  }
}
mysqli_close($link);

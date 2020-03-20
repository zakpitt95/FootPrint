<?php

session_start();
$origin2 = null;
$vehicle2 = null;
$origin3 = null;
$vehicle3 = null;
$destination2 = null;
$destination3 = null;
if (isset($_GET['submit'])) {
    error_reporting(0);
    $origin1 = $_GET['origin1'];
    $vehicle1 = $_GET['vehicle1'];
    $origin2 = $_GET['origin2'];
    $vehicle2 = $_GET['vehicle2'];
    $origin3 = $_GET['origin3'];
    $vehicle3 = $_GET['vehicle3'];
    $vehiclename1;
    $vehiclename2;
    $vehiclename3;
    $averageshopoutput = '4274';
    $deliveryvandropoutput = '181';
    $uservehicleimage1;
    $uservehicleimage2;
    $uservehicleimage3;

    //Vehicle Values
    $deliveryvan = 1;
    $smallvan = 2;
    $mediumvan = 3;
    $largevan = 4;
    $minibus = 5;
    $sedan = 6;
    $hatchback = 7;
    $minivan = 8;
    $suv = 9;
    $pickup = 10;
    $coupe = 11;
    $hybrid = 12;
    $electric = 13;
    $bicycle = 14;
    $motorbike = 15;
    $ebike = 16;

    //Vehicle Images
    $bigvanimage = 'img/bigvan.png';
    $smallvanimage = 'img/smallvan.png';
    $minibusimage = 'img/minibus.png';
    $averagecarimage = 'img/averagecar.png';
    $bigcarimage = 'img/bigcar.png';
    $pickupimage = 'img/pickup.png';
    $coupeimage = 'img/coupe.png';
    $electricimage = 'img/electriccar.png';
    $bicycleimage = 'img/bicycle.png';
    $ebikeimage = 'img/ebike1.png';
    $motorbikeimage = 'img/motorbike.png';

    //Carbon output averages
    $deliveryvanoutput = 161;
    $smallvanoutput = 131;
    $medvanoutput = 170;
    $largevanoutput = 190;
    $minibusoutput = 250;
    $sedanoutput = 140;
    $hatchbackoutput = 110;
    $minivanoutput = 170;
    $suvoutput = 125;
    $pickupoutput = 210;
    $coupeoutput = 230;
    $hybridoutput = 78;
    $electricoutput = 70;
    $bicycleoutput = 5;
    $motorbikeoutput = 90;
    $ebikeoutput = 22;

    //Destination retrieval
    $destination1 = $_GET['destination1'];
    $destination2 = $_GET['destination2'];
    $destination3 = $_GET['destination3'];

    //Google Distance Matrix API Calls
    $distance_data1 = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?&origins=' . urlencode($origin1) . '&destinations=' . urlencode($destination1) . '&key=API_KEY');
    $distance_data2 = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?&origins=' . urlencode($origin2) . '&destinations=' . urlencode($destination2) . '&key=API_KEY');
    $distance_data3 = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?&origins=' . urlencode($origin3) . '&destinations=' . urlencode($destination3) . '&key=API_KEY');

    //Store call data in arrays
    $distance_arr1 = json_decode($distance_data1);
    $distance_arr2 = json_decode($distance_data2);
    $distance_arr3 = json_decode($distance_data3);


    //Retrieve addresses from arrray
    if ($distance_arr1->status == 'OK') {
        $destination_addresses = $distance_arr1->destination_addresses[0];
        $origin_addresses = $distance_arr1->origin_addresses[0];
        $origin_address1 = $origin_addresses;
        $destination_address1 = $destination_addresses;
    } else {
        
    }

    if ($distance_arr2->status == 'OK') {
        $destination_addresses = $distance_arr2->destination_addresses[0];
        $origin_addresses = $distance_arr2->origin_addresses[0];
        $origin_address2 = $origin_addresses;
        $destination_address2 = $destination_addresses;
    } else {
        
    }

    if ($distance_arr3->status == 'OK') {
        $destination_addresses = $distance_arr3->destination_addresses[0];
        $origin_addresses = $distance_arr3->origin_addresses[0];
        $origin_address3 = $origin_addresses;
        $destination_address3 = $destination_addresses;
    } else {
       
    }

    //Retrieve distance from array and cast to int
    $elements1 = $distance_arr1->rows[0]->elements;
    $distance1 = $elements1[0]->distance->text;
    $duration1 = $elements1[0]->duration->text;
    $elements2 = $distance_arr2->rows[0]->elements;
    $distance2 = $elements2[0]->distance->text;
    $duration2 = $elements2[0]->duration->text;
    $elements3 = $distance_arr3->rows[0]->elements;
    $distance3 = $elements3[0]->distance->text;
    $duration3 = $elements3[0]->duration->text;

    //Retrieve just the number from distance string
    $distanceNum1 = substr($distance1, 0, strpos($distance1, "km"));
    $distanceNum2 = substr($distance2, 0, strpos($distance2, "km"));
    $distanceNum3 = substr($distance3, 0, strpos($distance3, "km"));
    $distanceNum1 = (int) $distanceNum1;
    $distanceNum2 = (int) $distanceNum2;
    $distanceNum3 = (int) $distanceNum3;

    //Vehicle 1 Checks For Image and Name
    if ($vehicle1 == $deliveryvan) {
        $vehiclename1 = "Delivery Van";
        $carbonOutput1 = $deliveryvanoutput * $distanceNum1;
        $uservehicleimage1 = $bigvanimage;
    }
    if ($vehicle1 == $smallvan) {
        $vehiclename1 = "Small Van";
        $carbonOutput1 = $smallvanoutput * $distanceNum1;
        $uservehicleimage1 = $smallvanimage;
    }

    if ($vehicle1 == $mediumvan) {
        $vehiclename1 = "Medium Van";
        $carbonOutput1 = $medvanoutput * $distanceNum1;
        $uservehicleimage1 = $bigvanimage;
    }
    if ($vehicle1 == $largevan) {
        $vehiclename1 = "Large Van";
        $carbonOutput1 = $largevanoutput * $distanceNum1;
        $uservehicleimage1 = $bigvanimage;
    }
    if ($vehicle1 == $minibus) {
        $vehiclename1 = "Minibus";
        $carbonOutput1 = $minibusoutput * $distanceNum1;
        $uservehicleimage1 = $minibusimage;
    }
    if ($vehicle1 == $sedan) {
        $vehiclename1 = "Sedan";
        $carbonOutput1 = $sedanoutput * $distanceNum1;
        $uservehicleimage1 = $averagecarimage;
    }
    if ($vehicle1 == $hatchback) {
        $vehiclename1 = "Hatchback";
        $carbonOutput1 = $hatchbackoutput * $distanceNum1;
        $uservehicleimage1 = $averagecarimage;
    }
    if ($vehicle1 == $minivan) {
        $vehiclename1 = "Minivan";
        $carbonOutput1 = $minivanoutput * $distanceNum1;
        $uservehicleimage1 = $bigcarimage;
    }
    if ($vehicle1 == $suv) {
        $vehiclename1 = "SUV";
        $carbonOutput1 = $suvoutput * $distanceNum1;
        $uservehicleimage1 = $bigcarimage;
    }
    if ($vehicle1 == $pickup) {
        $vehiclename1 = "Pickup";
        $carbonOutput1 = $pickupoutput * $distanceNum1;
        $uservehicleimage1 = $pickupimage;
    }
    if ($vehicle1 == $coupe) {
        $vehiclename1 = "Coupe";
        $carbonOutput1 = $coupeoutput * $distanceNum1;
        $uservehicleimage1 = $coupeimage;
    }
    if ($vehicle1 == $hybrid) {
        $vehiclename1 = "Hybrid";
        $carbonOutput1 = $hybridoutput * $distanceNum1;
        $uservehicleimage1 = $electricimage;
    }
    if ($vehicle1 == $electric) {
        $vehiclename1 = "Electric";
        $carbonOutput1 = $electricoutput * $distanceNum1;
        $uservehicleimage1 = $electricimage;
    }
    if ($vehicle1 == $bicycle) {
        $vehiclename1 = "Bicycle";
        $carbonOutput1 = $bicycleoutput * $distanceNum1;
        $uservehicleimage1 = $bicycleimage;
    }
    if ($vehicle1 == $motorbike) {
        $vehiclename1 = "Motorbike";
        $carbonOutput1 = $motorbikeoutput * $distanceNum1;
        $uservehicleimage1 = $motorbikeimage;
    }
    if ($vehicle1 == $ebike) {
        $vehiclename1 = "E-bike";
        $carbonOutput1 = $ebikeoutput * $distanceNum1;
        $uservehicleimage1 = $ebikeimage;
    }
    //Vehicle 2 Checks For Image and Name
    if ($vehicle2 == $deliveryvan) {
        $vehiclename2 = "Delivery Van";
        $carbonOutput2 = $deliveryvanoutput * $distanceNum2;
        $uservehicleimage2 = $bigvanimage;
    }
    if ($vehicle2 == $smallvan) {
        $vehiclename2 = "Small Van";
        $carbonOutput2 = $smallvanoutput * $distanceNum2;
        $uservehicleimage2 = $smallvanimage;
    }
    if ($vehicle2 == $mediumvan) {
        $vehiclename2 = "Medium Van";
        $carbonOutput2 = $medvanoutput * $distanceNum2;
        $uservehicleimage2 = $bigvanimage;
    }
    if ($vehicle2 == $largevan) {
        $vehiclename2 = "Large Van";
        $carbonOutput2 = $largevanoutput * $distanceNum2;
        $uservehicleimage2 = $bigvanimage;
    }
    if ($vehicle2 == $minibus) {
        $vehiclename2 = "Minibus";
        $carbonOutput2 = $minibusoutput * $distanceNum2;
        $uservehicleimage2 = $minibusimage;
    }
    if ($vehicle2 == $sedan) {
        $vehiclename2 = "Sedan";
        $carbonOutput2 = $sedanoutput * $distanceNum2;
        $uservehicleimage2 = $averagecarimage;
    }
    if ($vehicle2 == $hatchback) {
        $vehiclename2 = "Hatchback";
        $carbonOutput2 = $hatchbackoutput * $distanceNum2;
        $uservehicleimage2 = $averagecarimage;
    }
    if ($vehicle2 == $minivan) {
        $vehiclename2 = "Minivan";
        $carbonOutput2 = $minivanoutput * $distanceNum2;
        $uservehicleimage2 = $bigcarimage;
    }
    if ($vehicle2 == $suv) {
        $vehiclename2 = "SUV";
        $carbonOutput2 = $suvoutput * $distanceNum2;
        $uservehicleimage2 = $bigcarimage;
    }
    if ($vehicle2 == $pickup) {
        $vehiclename2 = "Pickup";
        $carbonOutput2 = $pickupoutput * $distanceNum2;
        $uservehicleimage2 = $pickupimage;
    }
    if ($vehicle2 == $coupe) {
        $vehiclename2 = "Coupe";
        $carbonOutput2 = $coupeoutput * $distanceNum2;
        $uservehicleimage2 = $coupeimage;
    }
    if ($vehicle2 == $hybrid) {
        $vehiclename2 = "Hybrid";
        $carbonOutput2 = $hybridoutput * $distanceNum2;
        $uservehicleimage2 = $electricimage;
    }
    if ($vehicle2 == $electric) {
        $vehiclename2 = "Electric";
        $carbonOutput2 = $electricoutput * $distanceNum2;
        $uservehicleimage2 = $electricimage;
    }
    if ($vehicle2 == $bicycle) {
        $vehiclename2 = "Bicycle";
        $carbonOutput2 = $bicycleoutput * $distanceNum2;
        $uservehicleimage2 = $bicycleimage;
    }
    if ($vehicle2 == $motorbike) {
        $vehiclename2 = "Motorbike";
        $carbonOutput2 = $motorbikeoutput * $distanceNum2;
        $uservehicleimage2 = $motorbikeimage;
    }
    if ($vehicle2 == $ebike) {
        $vehiclename2 = "E-bike";
        $carbonOutput2 = $ebikeoutput * $distanceNum2;
        $uservehicleimage2 = $ebikeimage;
    }
    //Vehicle 3 Checks For Image and Name
    if ($vehicle3 == $deliveryvan) {
        $vehiclename3 = "Delivery Van";
        $carbonOutput3 = $deliveryvanoutput * $distanceNum3;
        $uservehicleimage3 = $bigvanimage;
    }
    if ($vehicle3 == $smallvan) {
        $vehiclename3 = "Small Van";
        $carbonOutput3 = $smallvanoutput * $distanceNum3;
        $uservehicleimage3 = $smallvanimage;
    }
    if ($vehicle3 == $mediumvan) {
        $vehiclename3 = "Medium Van";
        $carbonOutput3 = $medvanoutput * $distanceNum3;
        $uservehicleimage3 = $bigvanimage;
    }
    if ($vehicle3 == $largevan) {
        $vehiclename3 = "Large Van";
        $carbonOutput3 = $largevanoutput * $distanceNum3;
        $uservehicleimage3 = $bigvanimage;
    }
    if ($vehicle3 == $minibus) {
        $vehiclename3 = "Minibus";
        $carbonOutput3 = $minibusoutput * $distanceNum3;
        $uservehicleimage3 = $minibusimage;
    }
    if ($vehicle3 == $sedan) {
        $vehiclename3 = "Sedan";
        $carbonOutput3 = $sedanoutput * $distanceNum3;
        $uservehicleimage3 = $averagecarimage;
    }
    if ($vehicle3 == $hatchback) {
        $vehiclename3 = "Hatchback";
        $carbonOutput3 = $hatchbackoutput * $distanceNum3;
        $uservehicleimage3 = $averagecarimage;
    }
    if ($vehicle3 == $minivan) {
        $vehiclename3 = "Minivan";
        $carbonOutput3 = $minivanoutput * $distanceNum3;
        $uservehicleimage3 = $bigcarimage;
    }
    if ($vehicle3 == $suv) {
        $vehiclename3 = "SUV";
        $carbonOutput3 = $suvoutput * $distanceNum3;
        $uservehicleimage3 = $bigcarimage;
    }
    if ($vehicle3 == $pickup) {
        $vehiclename3 = "Pickup";
        $carbonOutput3 = $pickupoutput * $distanceNum3;
        $uservehicleimage3 = $pickupimage;
    }
    if ($vehicle3 == $coupe) {
        $vehiclename3 = "Coupe";
        $carbonOutput3 = $coupeoutput * $distanceNum3;
        $uservehicleimage3 = $coupeimage;
    }
    if ($vehicle3 == $hybrid) {
        $vehiclename3 = "Hybrid";
        $carbonOutput3 = $hybridoutput * $distanceNum3;
        $uservehicleimage3 = $electricimage;
    }
    if ($vehicle3 == $electric) {
        $vehiclename3 = "Electric";
        $carbonOutput3 =  $electricoutput * $distanceNum3;
        $uservehicleimage3 = $electricimage;
    }
    if ($vehicle3 == $bicycle) {
        $vehiclename3 = "Bicycle";
        $carbonOutput3 = $bicycleoutput * $distanceNum3;
        $uservehicleimage3 = $bicycleimage;
    }
    if ($vehicle3 == $motorbike) {
        $vehiclename3 = "Motorbike";
        $carbonOutput3 = $motorbikeoutput * $distanceNum3;
        $uservehicleimage3 = $motorbikeimage;
    }
    if ($vehicle3 == $ebike) {
        $vehiclename3 = "E-bike";
        $carbonOutput3 =  $ebikeoutput * $distanceNum3;
        $uservehicleimage3 = $ebikeimage;
    }
    //Average Shop differences
    $averageshopoutputdifference1 = $averageshopoutput - $carbonOutput1;
    $averageshopoutputdifference2 = $averageshopoutput - $carbonOutput2;
    $averageshopoutputdifference3 = $averageshopoutput - $carbonOutput3;

    //Lowest and Highest Output comparisons
    $bikeoutput1 = $bicycleoutput * $distanceNum1;
    $bikedifference1 = $bikeoutput1 - $carbonOutput1;
    $ebikeoutput1 = $ebikeoutput * $distanceNum1;
    $ebikedifference1 = $ebikeoutput1 - $carbonOutput1;
    $coupeoutput1 = $coupeoutput * $distanceNum1;
    $coupedifference1 = $coupeoutput1 - $carbonOutput1;
    $pickupoutput1 = $pickupoutput * $distanceNum1;
    $pickupdifference1 =  $pickupoutput1 - $carbonOutput1;

    $bikeoutput2 = $bicycleoutput * $distanceNum2;
    $bikedifference2 = $bikeoutput2 - $carbonOutput2;
    $ebikeoutput2 = $ebikeoutput * $distanceNum2;
    $ebikedifference2 = $ebikeoutput2 - $carbonOutput2;
    $coupeoutput2 = $coupeoutput * $distanceNum2;
    $coupedifference2 = $coupeoutput2 - $carbonOutput2;
    $pickupoutput2 = $pickupoutput * $distanceNum2;
    $pickupdifference2 = $pickupoutput2 - $carbonOutput2;

    $bikeoutput3 = $bicycleoutput * $distanceNum3;
    $bikedifference3 = $bikeoutput3 - $carbonOutput3;
    $ebikeoutput3 = $ebikeoutput * $distanceNum3;
    $ebikedifference3 = $ebikeoutput3 - $carbonOutput3;
    $coupeoutput3 = $coupeoutput * $distanceNum3;
    $coupedifference3 = $coupeoutput3 - $carbonOutput3;
    $pickupoutput3 = $pickupoutput * $distanceNum3;
    $pickupdifference3 = $pickupoutput3 - $carbonOutput3;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <html lang="en">

    </html>
    <title>FootPrint</title>
    <!--CSS Link-->
    <link rel="stylesheet" href="css/stylejourneydisplayer.css">

</head>

<body>
    <header>

        <div class="container">
            <div id="titlebox"> FootPrint </div>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="journeytracker.php">Journey Tracker</a></li>
                <?php
                if (!isset($_SESSION["loggedin"])) {
                    echo "<li><a href=\"login.php\">Login</a></li>";
                }
                ?>
                <?php
                if (!isset($_SESSION["loggedin"])) {
                    echo "<li><a href=\"register.php\">Register</a></li>";
                }
                ?>
                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    echo "<li><a href=\"logout.php\">Log Out</a></li>";
                }
                ?>
                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    echo "<li><a href=\"addstorepage.php\">Add Store</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="container2">

                <?php
                //Journey 1 Comparison
                if ($origin1 !== "" and  $destination1 !== "") {
                    echo "<div class=\"journey\">";
                    echo "<p> Journey 1 Comparison</p><br>";
                    echo "<div class=\"journeyinfo\">";
                    echo "<h1>Your Journey</h1>";
                    echo "From: <br>" . $origin_address1 . "<br> To: <br>" . $destination_address1 . "<br>";
                    echo "<div class=\"journeytext\">";
                    echo "Distance: " . $distance1 . "<br>";
                    echo "Duration: " . $duration1 . "<br/>";
                    echo "Carbon Output: " . $carbonOutput1 . "g";
                    echo "<br>Vehicle: " . $vehiclename1 . "";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$uservehicleimage1\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"journeyinfo\">";
                    echo "<h1> Average UK Shopping Trip</h1>";
                    echo "Carbon Output: " . $averageshopoutput . "g";
                    echo "<br>Difference to Journey: " . $averageshopoutputdifference1 . "g<br><br>";
                    echo "<h1>Average UK Delivery Van Drop</h1>";
                    echo "Carbon Output: " . $deliveryvandropoutput . "g";
                    echo "</div>";
                    echo "<div class=\"journeyinfogood\">";
                    echo "<h1>Lowest Journey Outputs</h1>";
                    echo "<h2>Bicycle</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $bikeoutput1 . "g<br>";
                    echo "Difference to journey: " . $bikedifference1 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$bicycleimage\">";
                    echo "</div>";
                    echo "<h2>E-Bike</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $ebikeoutput1 . "g<br>";
                    echo "Difference to Journey: " . $ebikedifference1 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$ebikeimage\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class =\"journeyinfobad\">";
                    echo "<h1>Highest Journey Outputs</h1>";
                    echo "<h2>Coupe</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $coupeoutput1 . "g<br>";
                    echo "Difference to Journey: " . $coupedifference1 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$coupeimage\">";
                    echo "</div>";
                    echo "<h2>Pickup</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $pickupoutput1 . "g<br>";
                    echo "Difference to Journey: " . $pickupdifference1 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$pickupimage\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<form id=\"form\" style=\"display:none\" action=\"addjourney.php\" method=\"GET\" target=\"myiframe\">";
                    echo "<input readonly type=\"text\" id=\"origin\" name=\"origin\" value=\"$origin_address1\">";
                    echo "<input readonly type=\"text\" id=\"destination\" name=\"destination\" value=\"$destination_address1\">";
                    echo "<input readonly type=\"text\" id=\"distance\" name=\"distance\" value=\"$distance1\">";
                    echo "<input readonly type=\"text\" id=\"duration\" name=\"duration\" value=\"$duration1\">";
                    echo "<input readonly type=\"text\" id=\"carbonoutput\" name=\"carbonoutput\" value=\"$carbonOutput1\">";
                    echo "<input readonly type=\"text\" id=\"vehicle\" name=\"vehicle\" value=\"$vehiclename1\">";
                    echo "</form>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                        echo "<input type=\"submit\" id=\"submitbutton1\" form=\"form\" name=\"submit\" value=\"Add to Your Journeys\">";
                        echo "<div id=\"successmessage1\" style=\"display:none\">";
                        echo "<h3>";
                        echo "Successfully Added";
                        echo "</h3>";
                        echo "</div>";
                        echo "<script src=\"js/jquery.js\"></script>";
                        echo "<script src=\"js/successmessage.js\"></script>";
                        echo "<iframe id=\"frame\" name=\"myiframe\" style=\"display:none\"></iframe>";
                    }
                    echo "</div>";
                }

                ?>
                <?php
                //Journey 2 Comparison
                if ($origin2 !== "" and $destination2 !== "" and $origin2 !== null and $destination2 !== null) {
                    echo "<div class=\"journey\">";
                    echo "<p> Journey 2 Comparison </p><br>";
                    echo "<div class=\"journeyinfo\">";
                    echo "<h1>Your Journey</h1>";
                    echo "From: <br>" . $origin_address2 . "<br> To: <br>" . $destination_address2 . "<br>";
                    echo "<div class=\"journeytext\">";
                    echo "Distance: " . $distance2 . "<br>";
                    echo "Duration: " . $duration2 . "<br>";
                    echo "Carbon Output: " . $carbonOutput2 . "g";
                    echo "<br>Vehicle: " . $vehiclename2 . "";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$uservehicleimage2\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"journeyinfo\">";
                    echo "<h1> Average UK Shopping Trip</h1>";
                    echo "Carbon Output: " . $averageshopoutput . "g";
                    echo "<br>Difference to Journey: " . $averageshopoutputdifference2 . "g<br><br>";
                    echo "<h1>Average UK Delivery Van Drop</h1>";
                    echo "Carbon Output: " . $deliveryvandropoutput . "g";
                    echo "</div>";
                    echo "<div class=\"journeyinfogood\">";
                    echo "<h1>Lowest Journey Outputs</h1>";
                    echo "<h2>Bicycle</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $bikeoutput2 . "g<br>";
                    echo "Difference to journey: " . $bikedifference2 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$bicycleimage\">";
                    echo "</div>";
                    echo "<h2>E-Bike</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $ebikeoutput2 . "g<br>";
                    echo "Difference to Journey: " . $ebikedifference2 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$ebikeimage\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class =\"journeyinfobad\">";
                    echo "<h1>Highest Journey Outputs</h1>";
                    echo "<h2>Coupe</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $coupeoutput2 . "g<br>";
                    echo "Difference to Journey: " . $coupedifference2 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$coupeimage\">";
                    echo "</div>";
                    echo "<h2>Pickup</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $pickupoutput2 . "g<br>";
                    echo "Difference to Journey: " . $pickupdifference2 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$pickupimage\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<form id=\"form2\" style=\"display:none\" action=\"addjourney.php\" method=\"GET\" target=\"myiframe2\">";
                    echo "<input readonly type=\"text\" id=\"origin\" name=\"origin\" value=\"$origin_address2\">";
                    echo "<input readonly type=\"text\" id=\"destination\" name=\"destination\" value=\"$destination_address2\">";
                    echo "<input readonly type=\"text\" id=\"distance\" name=\"distance\" value=\"$distance2\">";
                    echo "<input readonly type=\"text\" id=\"duration\" name=\"duration\" value=\"$duration2\">";
                    echo "<input readonly type=\"text\" id=\"carbonoutput\" name=\"carbonoutput\" value=\"$carbonOutput2\">";
                    echo "<input readonly type=\"text\" id=\"vehicle\" name=\"vehicle\" value=\"$vehiclename2\">";
                    echo "</form>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                        echo "<input type=\"submit\" id=\"submitbutton2\" form=\"form2\" name=\"submit\" value=\"Add to Your Journeys\">";
                        echo "<div id=\"successmessage2\" style=\"display:none\">";
                    }
                    echo "<h3>";
                    echo "Successfully Added";
                    echo "</h3>";
                    echo "</div>";
                    echo "<script src=\"js/jquery.js\"></script>";
                    echo "<script src=\"js/successmessage.js\"></script>";
                    echo "<iframe id=\"frame\" name=\"myiframe2\" style=\"display:none\"></iframe>";
                    echo "</div>";
                }
                ?>
                <?php
                //Journey 3 Comparison
                if ($origin3 !== "" and $destination3 !== "" and $origin3 !== null and $destination3 !== null) {
                    echo "<div class=\"journey\">";
                    echo "<p> Journey 3 Comparison</p><br>";
                    echo "<div class=\"journeyinfo\">";
                    echo "<h1>Your Journey</h1>";
                    echo "From: <br>" . $origin_address3 . "<br> To: <br>" . $destination_address3 . "<br>";
                    echo "<div class=\"journeytext\">";
                    echo "Distance: " . $distance3 . "<br/>";
                    echo "Duration: " . $duration3 . "<br/>";
                    echo "Carbon Output: " . $carbonOutput3 . "g";
                    echo "<br>Vehicle: " . $vehiclename3 . "";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$uservehicleimage3\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"journeyinfo\">";
                    echo "<h1> Average UK Shopping Trip</h1>";
                    echo "Carbon Output: " . $averageshopoutput . "g";
                    echo "<br>Difference to Journey: " . $averageshopoutputdifference3 . "g<br><br>";
                    echo "<h1>Average UK Delivery Van Drop</h1>";
                    echo "Carbon Output: " . $deliveryvandropoutput . "g";
                    echo "</div>";
                    echo "<div class=\"journeyinfogood\">";
                    echo "<h1>Lowest Journey Outputs</h1>";
                    echo "<h2>Bicycle</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $bikeoutput3 . "g<br>";
                    echo "Difference to journey: " . $bikedifference3 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$bicycleimage\">";
                    echo "</div>";
                    echo "<h2>E-Bike</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $ebikeoutput3 . "g<br>";
                    echo "Difference to Journey: " . $ebikedifference3 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$ebikeimage\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class =\"journeyinfobad\">";
                    echo "<h1>Highest Journey Outputs</h1>";
                    echo "<h2>Coupe</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $coupeoutput3 . "g<br>";
                    echo "Difference to Journey: " . $coupedifference3 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$coupeimage\">";
                    echo "</div>";
                    echo "<h2>Pickup</h2>";
                    echo "<div class=\"journeytext\">";
                    echo "Carbon Output: " . $pickupoutput3 . "g<br>";
                    echo "Difference to Journey: " . $pickupdifference3 . "g";
                    echo "</div>";
                    echo "<div class=\"vehicleimageoutputs\">";
                    echo "<img class=\"vehicleimage\" src=\"$pickupimage\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<form id=\"form3\" style=\"display:none\" action=\"addjourney.php\" method=\"GET\" target=\"myiframe3\">";
                    echo "<input readonly type=\"text\" id=\"origin\" name=\"origin\" value=\"$origin_address3\">";
                    echo "<input readonly type=\"text\" id=\"destination\" name=\"destination\" value=\"$destination_address3\">";
                    echo "<input readonly type=\"text\" id=\"distance\" name=\"distance\" value=\"$distance3\">";
                    echo "<input readonly type=\"text\" id=\"duration\" name=\"duration\" value=\"$duration3\">";
                    echo "<input readonly type=\"text\" id=\"carbonoutput\" name=\"carbonoutput\" value=\"$carbonOutput3\">";
                    echo "<input readonly type=\"text\" id=\"vehicle\" name=\"vehicle\" value=\"$vehiclename3\">  ";
                    echo "</form>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                        echo "<input type=\"submit\" id=\"submitbutton3\" form=\"form3\" name=\"submit\" value=\"Add to Your Journeys\">";
                        echo "<div id=\"successmessage3\" style=\"display:none\">";
                    }
                    echo "<h3>";
                    echo "Successfully added";
                    echo "</h3>";
                    echo "</div>";
                    echo "<script src=\"js/jquery.js\"></script>";
                    echo "<script src=\"js/successmessage.js\"></script>";
                    echo "<iframe id=\"frame\" name=\"myiframe3\" style=\"display:none\"></iframe>";
                    echo "</div>";
                }
                ?>
                <button onclick="window.location.href='journeytracker.php'" id="returnbutton">Return</button>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">

        </div>
    </footer>
</body>

</html>

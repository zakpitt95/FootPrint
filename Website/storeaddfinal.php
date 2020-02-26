<?php
session_start();
require_once "config.php";
if(isset($_GET['submit'])){
            //Retrieve information from form
            $formatted_address = $_GET['storeaddress'];
            $name = $_GET['storename'];
            //Split address
            $address_arr = explode(',', $formatted_address);
            $street_add = $address_arr[0];
            $cityandpostcode = $address_arr[1];
            $country = $address_arr[2];

            //Pattern for postcode retrieval
            $pattern = "/((GIR 0AA)|((([A-PR-UWYZ][0-9][0-9]?)|(([A-PR-UWYZ][A-HK-Y][0-9][0-9]?)|(([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY])))) [0-9][ABD-HJLNP-UW-Z]{2}))/i";
            
            //Retrieve postcode from address string
            preg_match($pattern, $cityandpostcode, $matches);
            
            //Finalise variables for insertion
            $postcode = $matches[0];
            $city = preg_replace("/\b($postcode)\b/i", "", $cityandpostcode);
            $city = trim($city);
            $postcode = trim($postcode);
            $street_add = trim($street_add);
            $name = trim($name);
            $id = $_SESSION["id"];
            
            
                //Prepare statement for insertion
                $sql = "INSERT INTO shops (name, street, city, postcode, country, userid) VALUES (?, ?, ?, ?, ?, ?)";
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_street, $param_city, $param_postcode, $param_country, $param_userid);
                    
                    // Set parameters
                    $param_name = $name;
                    $param_street = $street_add;
                    $param_city = $city;
                    $param_postcode = $postcode;
                    $param_country = $country;
                    $param_userid = $id;
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                      // Redirect to add store page
                      header("location: addstorepage.php");
                  } else{
                      echo "Something went wrong. Please try again later.";
                  }
                  mysqli_stmt_close($stmt);
                }
              
                
                
        }
        mysqli_close($link);
?>
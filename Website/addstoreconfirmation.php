<?php
session_start();
if (isset($_GET['submit'])) {
  //Retrieve information from form
  $location = $_GET['storelocation'];
  
  error_reporting(0);

  //Google Place API call and retrieval of necessary data
  $location_data = file_get_contents('https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=' . 
  urlencode($location) . '&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry&key=API_KEY');
  $location_arr = json_decode($location_data);
  $formatted_address = $location_arr->candidates[0]->formatted_address;
  $name = $location_arr->candidates[0]->name;
  $latitude = $location_arr->candidates[0]->geometry->location->lat;
  $longitude = $location_arr->candidates[0]->geometry->location->lng;
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
  <link rel="stylesheet" href="css/stylestoreconfirm.css">

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
      <div id="storenamebox">

        <form id="form" action="storeaddfinal.php" method="get" target="myiframe">
          <h1>Store name:</h1> <input readonly type="text" id="storename" name="storename" value="<?= $name ?>"><br>
          <h1>Store address:</h1> <input readonly type="text" name="storeaddress" value="<?= $formatted_address ?>"><br>
          <div id="map">
            <script>
              function initMap() {
                var myLatLng = {
                  lat: <?php echo $latitude; ?>,
                  lng: <?php echo $longitude; ?>
                };

                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 15,
                  center: myLatLng
                });

                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: ''
                });
              }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDY3jpuZRxi2Vz4_r1AtQM3hX3JGH4NPqc&callback=initMap">
            </script>

          </div>
          <input id="submitbutton1" type="submit" name="submit" value="Submit">
          <div id="successmessage1" style="display:none">
            <h1>
              Successfully Added
            </h1>
          </div>
          <br>

          <script src="js/jquery.js"></script>
          <script src="js/successmessage.js"></script>

          <iframe id="frame" name="myiframe" style="display:none"></iframe>
        </form>
        <button onclick="window.location.href='addstorepage.php'" id="returnbutton">Return</button>
      </div>
    </div>
  </main>
  <footer>
    <div class="container">

    </div>
  </footer>
</body>

</html>

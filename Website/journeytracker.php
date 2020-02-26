<?php
session_start();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <html lang="en">
  </html>
  <title>FootPrint</title>
  <link rel="stylesheet" href="css/stylejourneytrack.css">
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

  <form id="form" action="journeydisplayer.php">
    <div id="sections">
      <div class="section">
        <div id="bar"></div>
        <label for="vehicle1">Vehicle Type:</label>
        <select id="vehicleselect" name="vehicle1" id="vehicle">
          <optgroup label="Vans">
            <option value="1">Delivery Van</option>
            <option value="2">Small Van</option>
            <option value="3">Medium Van</option>
            <option value="4">Large Van</option>
            <option value="5">Minibus</option>
          </optgroup>
          <optgroup label="Cars">
            <option value="6">Sedan</option>
            <option value="7">Hatchback</option>
            <option value="8">Minivan</option>
            <option value="9">SUV</option>
            <option value="10">Pickup</option>
            <option value="11">Coupe</option>
            <option value="12">Hybrid</option>
            <option value="13">Electric</option>
          </optgroup>
          <optgroup label="Bikes">
            <option value="14">Bicycle</option>
            <option value="15">Motorbike</option>
            <option value="16">E-bike</option>

          </optgroup>
        </select><br>
        <label for="origin1">From:</label>
        <input type="text" name="origin1" id="origin" class="autocomplete1"><br>
        <label for="destination">To:</label>
        <input type="text" name="destination1" id="destination" class="autocomplete2" value="">
        <br>
        <br>
        <a href="#" class='remove'>Remove This Journey</a>
        <br>
        <br>

      </div>
    </div>

    <a href="#" class="addsection">Add Another Journey</a><br><br>
    <input type="submit" id="submitbutton" name="submit" value="Get journey information">


  </form>

  <script src="js/jquery.js"></script>
  <script src="js/app.js"></script>
  <script src="js/autocomp.js"></script>
  <script src="js/jquery-ui.js"></script>

  <footer>
    <div class="container">

    </div>
  </footer>
</body>


</html>